<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Registrasi Admin Bimbel Jadi Cerdas">
    <meta name="author" content="Bimbel Jadi Cerdas">

    <title>Registrasi Admin - Bimbel Jadi Cerdas</title>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- SB Admin 2 CSS -->
    <link rel="stylesheet" href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Animated Background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .bg-animation .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite ease-in-out;
        }
        .circle:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s; }
        .circle:nth-child(2) { width: 120px; height: 120px; top: 70%; left: 80%; animation-delay: 2s; }
        .circle:nth-child(3) { width: 60px; height: 60px; top: 40%; left: 80%; animation-delay: 4s; }
        .circle:nth-child(4) { width: 100px; height: 100px; top: 80%; left: 20%; animation-delay: 6s; }
        .circle:nth-child(5) { width: 50px; height: 50px; top: 20%; left: 70%; animation-delay: 8s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.3; }
            50% { transform: translateY(-30px) rotate(180deg); opacity: 0.6; }
        }

        /* Card */
        .register-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            display: flex;
            max-width: 900px;
            width: 100%;
            min-height: 600px;
        }

        /* Left Side - Image */
        .register-image {
            flex: 1;
            background: linear-gradient(135deg, rgba(107, 90, 202, 0.95) 0%, rgba(123, 106, 218, 0.95) 100%),
                        url('<?= base_url('assets/images/banner-bg.jpg') ?>') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }
        .register-image::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        .register-image .brand-logo {
            font-size: 70px;
            color: #fff;
            margin-bottom: 25px;
            z-index: 1;
            text-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .register-image h2 {
            color: #fff;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
            z-index: 1;
            text-align: center;
            text-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        .register-image p {
            color: rgba(255,255,255,0.95);
            font-size: 14px;
            text-align: center;
            z-index: 1;
            line-height: 1.8;
        }

        /* Right Side - Form */
        .register-form {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .register-form .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .register-form .header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        .register-form .header p {
            color: #666;
            font-size: 14px;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .form-control {
            height: 45px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 10px 15px 10px 45px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }
        .form-control:focus {
            border-color: #7b6ada;
            box-shadow: 0 0 0 4px rgba(123, 106, 218, 0.1);
            background: #fff;
        }
        .form-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 16px;
            transition: color 0.3s ease;
        }
        .form-control:focus + .form-icon { color: #7b6ada; }

        /* Button */
        .btn-register {
            width: 100%;
            height: 50px;
            background: linear-gradient(135deg, #7b6ada 0%, #9b8ae5 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(123, 106, 218, 0.4);
            margin-top: 10px;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(123, 106, 218, 0.5);
        }

        /* Alert */
        .alert {
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 13px;
            margin-bottom: 20px;
            border: none;
        }
        .alert-danger { background: #ffe6e6; color: #dc3545; }

        /* Footer */
        .footer-links {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #666;
        }
        .footer-links a {
            color: #7b6ada;
            text-decoration: none;
            font-weight: 600;
        }
        .footer-links a:hover { text-decoration: underline; }

        @media (max-width: 768px) {
            .register-card { flex-direction: column; max-width: 400px; }
            .register-image { min-height: 150px; padding: 20px; }
            .register-image .brand-logo { font-size: 40px; }
            .register-image h2 { font-size: 22px; }
            .register-form { padding: 30px 20px; }
        }
    </style>
</head>

<body>
    <div class="bg-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <div class="register-card">
        <div class="register-image">
            <div class="brand-logo">
                <i class="fas fa-user-shield"></i>
            </div>
            <h2>Admin Area</h2>
            <p>Daftarkan akun administrator baru<br>untuk mengelola sistem bimbel</p>
        </div>

        <div class="register-form">
            <div class="header">
                <h1>Registrasi Admin</h1>
                <p>Lengkapi data di bawah ini</p>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('register') ?>" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                    <i class="fas fa-user form-icon"></i>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <i class="fas fa-lock form-icon"></i>
                </div>

                <div class="form-group">
                    <input type="password" name="password_confirm" class="form-control" placeholder="Konfirmasi Password" required>
                    <i class="fas fa-check-double form-icon"></i>
                </div>

                <div class="form-group">
                    <input type="text" name="register_secret" class="form-control" placeholder="Kode Admin (Secret Code)" required>
                    <i class="fas fa-key form-icon"></i>
                </div>

                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
                </button>
            </form>

            <div class="footer-links">
                Sudah punya akun? <a href="<?= site_url('login') ?>">Login di sini</a>
            </div>
        </div>
    </div>
</body>
</html>
