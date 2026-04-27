<?php

namespace App\Controllers;

use App\Models\ProgramModel;
use App\Models\PendaftarModel;
use App\Models\PengajarModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Home extends BaseController
{
    /**
     * Halaman utama / landing page
     */
    public function index(): string
    {
        $pengajarModel = new PengajarModel();
        $data['pengajar'] = $pengajarModel->orderBy('nama_pengajar', 'ASC')->findAll();
        return view('index', $data);
    }

    /**
     * Alias untuk halaman utama
     */
    public function utama(): string
    {
        return $this->index();
    }

    /**
     * Halaman daftar kelas dengan semua program
     */
    public function daftarKelas(): string
    {
        return view('daftar_kelas');
    }

    /**
     * Form pendaftaran lama (untuk backward compatibility)
     * Redirect ke halaman utama dengan anchor ke form pendaftaran
     */
    public function daftar()
    {
        $programs = (new ProgramModel())->orderBy('nama_program', 'ASC')->findAll();
        return view('daftar', ['programs' => $programs]);
    }

    /**
     * Proses penyimpanan pendaftaran dari form umum (homepage wizard)
     * Form di index.php — route: POST /pendaftaran/umum
     */
    public function simpanPendaftarUmum()
    {
        $model = new PendaftarModel();
        $programModel = new ProgramModel();
        $noWa = $this->request->getPost('no_wa');

        if (empty($noWa)) {
            return redirect()->back()->withInput()->with('error', 'No. WhatsApp wajib diisi.');
        }

        // Map program slug (dari wizard) ke id_program
        // Wizard step 1 menyimpan: matematika-grup, matematika-privat, inggris-grup, dll.
        $programSlug = $this->request->getPost('program');
        $idProgram = null;
        if (!empty($programSlug)) {
            $slugToNama = [
                'matematika-grup'    => 'Matematika - Grup',
                'matematika-privat'  => 'Matematika - Privat',
                'inggris-grup'      => 'Bahasa Inggris - Grup',
                'inggris-privat'    => 'Bahasa Inggris - Privat',
                'mandarin-grup'     => 'Bahasa Mandarin - Grup',
                'mandarin-privat'  => 'Bahasa Mandarin - Privat',
                'mapel-grup'        => 'Mapel - Grup',
                'mapel-privat'      => 'Mapel - Privat',
            ];
            $namaProgram = $slugToNama[$programSlug] ?? null;
            if ($namaProgram) {
                $program = $programModel->where('nama_program', $namaProgram)->first();
                if ($program) {
                    $idProgram = $program['id_program'];
                }
            }
        }

        $data = [
            'username'       => 'WA-' . $noWa,
            'password'       => password_hash('pendaftar-' . $noWa, PASSWORD_DEFAULT),
            'nama_lengkap'   => $this->request->getPost('nama_lengkap'),
            'alamat_rumah'  => $this->request->getPost('alamat_rumah'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'no_wa'         => $noWa,
            'asal_sekolah'  => $this->request->getPost('asal_sekolah'),
            'kelas'         => $this->request->getPost('kelas'),
            'nama_orangtua' => $this->request->getPost('nama_orangtua'),
            'wa_orangtua'   => $this->request->getPost('wa_orangtua'),
            'id_program'    => $idProgram,
        ];

        try {
            $model->insert($data);
        } catch (DatabaseException $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan: ' . $e->getMessage());
        }

        return redirect()->to('/')->with('success', 'Pendaftaran berhasil! Kami akan segera menghubungi Anda.');
    }
}
