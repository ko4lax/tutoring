# Bimbel Jadi Cerdas - Project Features

**CodeIgniter 4 Application | Generated: March 21, 2026**

---

## Core Features (Backend)

| # | Feature | Description | Status |
|---|---------|-------------|--------|
| 1 | Photo Upload System | Upload teacher photos (JPG/PNG, max 5MB) with validation | ✓ |
| 2 | Admin CRUD Pengajar | Create, Read, Update, Delete teachers with photos | ✓ |
| 3 | Admin CRUD Program | Manage 8 programs (Mathematics, English, Mandarin, etc.) | ✓ |
| 4 | View Pendaftar | Display registered students in DataTable | ✓ |
| 5 | Multi-step Registration | 4-step wizard form (Program → Data → Schedule → Confirm) | ✓ |
| 6 | WhatsApp Integration | Float button with direct chat to admin | ✓ |
| 7 | Toast Notifications | Success/error popup messages | ✓ |
| 8 | Form Validation | Real-time validation with error messages | ✓ |
| 9 | Program Catalog Page | Dedicated `/daftar-kelas` page showing all programs with filtering by subject (Matematika, Bahasa Inggris, Mandarin, dll) | ✓ |

---

## Frontend Components

| # | Component | Description | Status |
|---|-----------|-------------|--------|
| 1 | Teacher Display | Dynamic teacher cards from database with photo fallback | ✓ |
| 2 | Program Cards | Visual clickable cards for program selection | ✓ |
| 3 | Testimonial Carousel | Owl carousel for student/parent reviews | ✓ |
| 4 | Counter Animation | Animated statistics display | ✓ |
| 5 | Google Maps | Location embed in About Us section | ✓ |
| 6 | Accordion FAQ | Expandable information sections | ✓ |
| 7 | Modern Footer | 4-column footer with social links | ✓ |
| 8 | Sticky Navigation | Fixed header on scroll | ✓ |
| 9 | Accessible Homepage | `index_accessible.php` - WCAG-friendly version | ✓ |
| 10 | Program Filter Buttons | Filter programs by subject category | ✓ |
| 11 | Daftar Kelas CTA | "Lihat Kelas" buttons linking to `/daftar-kelas` | ✓ |

---

## Database Structure

| Table | Purpose | Key Fields | Records |
|-------|---------|------------|---------|
| **admin** | Admin login | id_admin, username, password | 1+ |
| **pengajar** | Teachers data | id, name, subject, email, phone, photo | 2+ |
| **program** | Programs offered | id, name, sessions, days, time, duration | 8 |
| **pengguna** | Registered students | id, name, address, phone, school, parent info | 2+ |

---

## Testing Results

| Test Type | Tests | Assertions | Status |
|-----------|-------|------------|--------|
| Model Tests | 20 | 58 | ✓ Pass |
| Integration Tests | 11 | - | ✓ Pass |
| Database Tests | 5 | - | ✓ Pass |
| **Total** | **36** | **58+** | **✓ All Pass** |

---

## Technical Stack

| Category | Technology |
|----------|------------|
| Framework | CodeIgniter 4 (PHP 8.1+) |
| Database | MySQL/MariaDB |
| Frontend CSS | Bootstrap 5, TemplateMo Scholar Theme |
| Admin Template | SB Admin 2 |
| JavaScript | jQuery, Owl Carousel, Isotope |
| Testing | PHPUnit 11 |

---

## Project Statistics

- **22** Core Features
- **11** UI Components
- **36** Tests Passed
- **4** Database Tables

---

## Recent Updates (March 21, 2026)

| # | Update | Description |
|---|--------|-------------|
| 1 | Indonesian Localization | Converted all English placeholder content to Indonesian (program names, labels, buttons) |
| 2 | Daftar Kelas Page | Added dedicated program catalog page with subject filtering |
| 3 | Accessible Version | Added `index_accessible.php` with WCAG-friendly design |
| 4 | Program Images | Added class photos (kelas-pert3.jpg, mapel-01.jpg, mapel-02.jpg, mapel-3.jpg) |
| 5 | CSS Styling Updates | Refined card pricing styles and badge positioning in templatemo-scholar.css |

---

**Bimbel Jadi Cerdas**
JL. RA Kartini 107, Pekalongan, Jawa Tengah
WhatsApp: +62 857-4732-3211
