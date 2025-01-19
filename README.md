# Dokumentasi API PMW

## Daftar Route

1. [Register](#register)
2. [Login](#login)
3. [Get Data Mahasiswa](#mendapatkan-data-mahasiswa)
4. [Mencari Mahasiswa](#mencari-mahasiswa)
5. [Check-in Kehadiran](#check-in)
6. [Check-out Kehadiran](#check-out)
7. [Forgot Password](#forgot-password)
8. [Makfile doploy command](#run-app-with-gnu-make-unix-based-os-macos-linux)

---

## Informasi Umum

- **Base URL:** `http://localhost:8000`
- **Autentikasi:** Menggunakan API Key dengan header `X-API-Key`.
- **Format Data:** Semua request dan response menggunakan format JSON.

---

## Autentikasi

### Register

- **Endpoint:** `POST /api/auth/register`
- **Deskripsi:** Mendaftarkan pengguna baru.

**Headers:**

```json
{
  "Accept": "application/json"
}
```

**Body:**

```json
{
  "nim": "231524044",
  "name": "jelang",
  "email": "jelang@gmail.com",
  "password": "jelang123"
}
```

**Contoh cURL:**

```bash
curl -X POST http://localhost:8000/api/auth/register \
-H "Accept: application/json" \
-d '{
  "nim": "231524044",
  "name": "jelang",
  "major": "Computer Science",
  "study_program": "D4",
  "year": "2023",
  "email": "jelang@gmail.com",
  "status": "active",
  "password": "jelang123"
}'
```

**Respon Sukses:**

```json
{
  "metadata": {
    "code": 200,
    "status": "success",
    "message": "Register success"
  },
  "data": null
}
```

**Respon Gagal:**

**Email Duplikat:**

```json
{
  "metadata": {
    "code": 400,
    "status": "failed",
    "message": "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry 'jelang@gmail.com' for key 'users.users_email_unique'"
  },
  "data": null
}
```

### Login

- **Endpoint:** `POST /api/auth/login`
- **Deskripsi:** Login pengguna.

**Headers:**

```json
{
  "Accept": "application/json"
}
```

**Body:**

```json
{
  "email": "jelang@gmail.com",
  "password": "jelang123"
}
```

**Contoh cURL:**

```bash
curl -X POST http://localhost:8000/api/auth/login \
-H "Accept: application/json" \
-d '{
  "email": "jelang@gmail.com",
  "password": "jelang123"
}'
```

**Respon Sukses:**

```json
{
  "metadata": {
    "code": 200,
    "status": "success",
    "message": "1|x4ITYDodVq2mPPvOOA38ZBuhKL0kTCDKKaU2f9Fl1ac7e8fd"
  },
  "data": null
}
```

**Respon Gagal:**

**Email Tidak Ditemukan:**

```json
{
  "metadata": {
    "code": 401,
    "status": "failed",
    "message": "Email not found"
  },
  "data": null
}
```

---

## Mahasiswa

### Mendapatkan Data Mahasiswa

- **Endpoint:** `GET /api/students`

**Headers:**

```json
{
  "Accept": "application/json",
  "Authorization": "Bearer {token}"
}
```

**Contoh cURL:**

```bash
curl -X GET http://localhost:8000/api/students \
-H "Accept: application/json" \
-H "Authorization: Bearer {token}"
```

**Respon Sukses:**

```json
{
  "data": [
    {
      "nim": "231524045",
      "name": "bangkong",
      "major": "Computer Science",
      "study_program": "D4",
      "year": "2023",
      "email": "kong@gmail.com",
      "status": "active",
      "created_at": "2024-12-23T07:05:24.000000Z",
      "updated_at": "2024-12-23T07:05:24.000000Z"
    }
  ]
}
```

### Mencari Mahasiswa

- **Endpoint:** `GET /api/students/search`
- **Query Parameter:**
  - `nim`: NIM mahasiswa

**Contoh cURL:**

```bash
curl -X GET "http://localhost:8000/api/students/search?nim=23152" \
-H "Accept: application/json"
```

**Respon Sukses:**

```json
{
  "data": [
    {
      "nim": "231524001",
      "name": "ALNEZ RAINANSANTANA",
      "major": "Teknik Komputer dan Informatika",
      "study_program": "D4-Teknik Informatika",
      "year": "2023",
      "email": "alnez.rainansantana.tif423@polban.ac.id",
      "status": "Mahasiswa Aktif"
    }
  ]
}
```

**Respon Gagal:**

**Tidak Ditemukan:**

```json
{
  "message": "No students found for the provided query."
}
```

---

## Kehadiran

### Check-in

- **Endpoint:** `POST /api/attendance/{workshop_id}/check-in`
- **Query Parameter:**
  - `workshop_id`: id workshop

**Headers:**

```json
{
  "Accept": "application/json",
  "Authorization": "Bearer {token}"
}
```

**Body:**

```json
{
  "student": "231524046"
}
```

**Contoh cURL:**

```bash
curl -X POST "http://localhost:8000/api/attendance/2/check-in" \
-H "Accept: application/json" \
-H "Authorization: Bearer {token}" \
-d '{
  "student": "231524046",
}'
```

**Respon Sukses:**

```json
{
  "data": {
    "attendance_id": null,
    "student": "231524046",
    "workshop_id": "2",
    "check_in_time": "2025-01-14T02:54:39.921304Z",
    "check_out_time": null,
    "status": null
  }
}
```

**Respon Gagal:**

**Di Luar Jadwal:**

```json
{
  "message": "Check-in is not allowed outside workshop schedule"
}
```

### Check-out

- **Endpoint:** `POST /api/attendance/{workshop_id}/check-out`
- **Query Parameter:**
  - `workshop_id`: id workshop

**Headers:**

```json
{
  "Accept": "application/json",
  "Authorization": "Bearer {token}"
}
```

**Body:**

```json
{
  "student": "231524046"
}
```

**Contoh cURL:**

```bash
curl -X POST "http://localhost:8000/api/attendance/2/check-out" \
-H "Accept: application/json" \
-H "Authorization: Bearer {token}" \
-d '{
  "student": "231524046",
  "workshop_id": "2"
}'
```

**Respon Sukses:**

```json
{
  "attendance_id": 1,
  "student": "231524046",
  "workshop_id": 2,
  "check_in_time": "2025-01-14 02:54:39",
  "check_out_time": "2025-01-14T03:17:17.907938Z",
  "created_at": "2025-01-14T02:54:39.000000Z",
  "updated_at": "2025-01-14T03:17:17.000000Z"
}
```

# Forgot Password

## Mengirim OTP

### Endpoint

`POST /api/forgot-password/send-otp`

### Headers

```json
{
  "Accept": "application/json"
}
```

### Body

```json
{
  "email": "user@example.com"
}
```

### Contoh cURL

```bash
curl -X POST "http://localhost:8000/api/forgot-password/send-otp" \
-H "Accept: application/json" \
-d '{
  "email": "user@example.com"
}'
```

### Respon Sukses

```json
{
  "metadata": {
    "code": 200,
    "status": "success",
    "message": "OTP sent to your email."
  },
  "data": null
}
```

### Respon Gagal

```json
{
  "message": "The selected email is invalid.",
  "errors": {
    "email": [
      "The selected email is invalid."
    ]
  }
}
```

---

## Mengubah Password dengan OTP

### Endpoint

`POST /api/forgot-password/change-password`

### Headers

```json
{
  "Accept": "application/json"
}
```

### Body

```json
{
  "email": "user@example.com",
  "otp": "123456",
  "new_password": "newpassword123",
  "new_password_confirmation": "newpassword123"
}
```

### Contoh cURL

```bash
curl -X POST "http://localhost:8000/api/forgot-password/change-password" \
-H "Accept: application/json" \
-d '{
  "email": "user@example.com",
  "otp": "123456",
  "new_password": "newpassword123",
  "new_password_confirmation": "newpassword123"
}'
```

### Respon Sukses

```json
{
  "metadata": {
    "code": 200,
    "status": "success",
    "message": "Password updated successfully."
  },
  "data": null
}
```

### Respon Gagal

#### OTP Tidak Valid atau Kedaluwarsa

```json
{
  "message": "OTP is invalid or expired."
}
```

#### Konfirmasi Password Tidak Cocok

```json
{
  "message": "The new password confirmation does not match."
}
```

#### Email Tidak Ditemukan

```json
{
  "message": "The selected email is invalid."
}
```




<!-- USAGE EXAMPLES -->

## Run App With GNU Make (UNIX Based OS: MacOS, Linux)

- `make run-app-with-setup` : build docker and start all docker containers with Laravel setup
- `make run-app-with-setup-db` : build docker and start all docker containers with Laravel setup + database migration and seeder
- `make run-app` : start all docker container
- `make kill-app` : kill all docker container
- `make enter-nginx-container` : enter docker nginx container
- `make enter-php-container` : enter docker php container
- `make enter-mysql-container` : enter docker mysql container
- `make flush-db` : run php migrate fresh command
- `make flush-db-with-seeding` : run php migrate fresh command with seeding
- `make code-format-check` : run npm command to run prettier to check your code
- `make code-format`: run npm command to run prettier to format your code
- `make code-test`: run php artisan test command

<!-- USAGE EXAMPLES -->

## Run App Manually

![preview-docker-laravel](https://user-images.githubusercontent.com/49280352/131224609-401fcd2b-a815-49f2-8164-b6d9b77df87c.gif)

- Create .env file for the Laravel environment from .env.example on src folder
- Run command `docker-compose build` on your terminal
- Run command `docker-compose up -d` on your terminal
- Run command `composer install` on your terminal after going into the php container on docker
- Run command `docker exec -it php /bin/sh` on your terminal
- Run command `chmod -R 777 storage` on your terminal after going into the php container on docker
- If app:key still empty on .env run `php artisan key:generate` on your terminal after going into the php container on docker
- To run artisan commands like migrate, etc. go to php container using `docker exec -it php /bin/sh`
- Go to http://localhost:8001 or any port you set to open Laravel

## Notes

- If you encounter a permission error when running Docker, try running it as an administrator or using `sudo` in Linux.
- Check the summary of new features in Laravel 11 [here](https://laraveldaily.com/post/laravel-11-main-new-features-changes) or on the official page [here](https://laravel.com/docs/11.x/releases).
- Right now, I will postpone upgrading to PHP 8.3 because the PHP Plugin in Prettier is not supported yet. [Check the issues here](https://github.com/prettier/plugin-php/issues/2299).
- Don't forget to run `npm run format` inside your php container or run `make code-format` before you push your code.
- Don't forget to run `php artisan test` inside your php container or run `make code-test` before you push your code.

<!-- USAGE EXAMPLES -->

## Template Docker by ishaqadhel [Source](https://github.com/ishaqadhel/docker-laravel-mysql-nginx-starter)
