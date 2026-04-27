# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a **CodeIgniter 4** PHP application for a tutoring center (bimbel). It manages pendaftar (students/registrants), pengajar (teachers), and programs with a public registration wizard on the homepage and an admin dashboard.

## Commands

```bash
# Development server (requires PHP 8.1+)
php spark serve

# Run tests
php vendor/bin/phpunit

# Database migration (if using)
php spark migrate
```

## Architecture

### Directory Structure
- `app/Controllers/` - Application controllers (Admin, Auth, Home, Sb2)
- `app/Models/` - Database models (AdminModel, PendaftarModel, PengajarModel, ProgramModel, PenggunaModel)
- `app/Views/` - PHP view templates (index.php = homepage with wizard, admin_pendaftar.php, etc.)
- `app/Filters/` - Request filters (AuthFilter for admin authentication)
- `public/` - Web root (entry point, assets, uploads)
- `system/` - CodeIgniter 4 framework core

### Key Routes
- `GET /` - Homepage with registration wizard (Home::utama)
- `POST /pendaftaran/umum` - Process homepage registration wizard (Home::simpanP registrantUmum)
- `GET /admin` - Admin dashboard
- `GET /admin/pendaftar` - Registrant management (queries `pengguna` table)
- `GET /admin/pengajar` - Teacher management
- `GET /admin/program` - Program management
- `GET /daftar` - Standalone registration form (Home::daftar)
- `POST /daftar/simpan` - Process standalone registration (Admin::simpanPendaftaran)
- `GET /login`, `POST /login`, `GET /logout` - Authentication

### Data Models
- **PenggunaModel** - Base user model (table: `pengguna`). Stores both admin users and public registrants.
- **PendaftarModel** - Alias for PenggunaModel — same table, same model.
- **PengajarModel** - Teacher records (table: `pengajar`)
- **ProgramModel** - Tutoring programs (table: `program`)

### Database
- MySQL with MySQLi driver
- Connection via `.env` file (`database.default.*`)
- Tables: `admin`, `pengguna`, `pengajar`, `program`

### Registration Flow (Homepage Wizard)
1. User fills Step 1 (program) → JS sets `name="program"` hidden field with slug (e.g., `"matematika-grup"`)
2. Step 2 (data diri), Step 3 (jadwal), Step 4 (confirmation)
3. Form posts to `POST /pendaftaran/umum` → `Home::simpanP registrantUmum()`
4. Controller maps program slug → `id_program` via hardcoded lookup
5. Inserts into `pengguna` table with `username = 'WA-' + no_wa`
6. Redirects to `/` with success flash toast

**Important:** The `pengguna` table has `username` and `password` as `NOT NULL`. Registrants get placeholder credentials (not used for login). Admin login uses the separate `admin` table.

### Authentication
- Admin login via `Auth::prosesLogin` → `admin` table
- Registrant login is NOT required — they just fill the form, admin manages them
- Admin routes protected by `AuthFilter` (all `/admin/*`)
- CSRF globally disabled

## Configuration

Environment variables in `.env`:
- `database.default.*` - MySQL connection
- `ADMIN_REGISTER_SECRET` - Secret for admin self-registration

---

## Core Principles

- Simplicity First: Make every change as simple as possible. Minimize code impact.
- No Laziness: Identify root causes. Avoid temporary fixes. Apply senior developer standards.
- Minimal Impact: Touch only what is necessary. Avoid introducing new bugs.
- Never create a component longer than 200 lines. If it exceeds this, split it into smaller components.
- Verification Before Done: Run tests, check logs, and demonstrate correctness.
- Autonomous Bug Fixing: When given a bug report, fix it without asking for unnecessary guidance.
