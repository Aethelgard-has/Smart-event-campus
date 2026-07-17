<?php
session_start();

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login Administrator | Smart Event Campus</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

<link rel="stylesheet" href="assets/css/login.css">

</head>

<body class="login-page">

<div class="overlay"></div>

<div class="login-container">

    <!-- PANEL KIRI -->

    <div class="left-panel">

        <img
            src="assets/img/Logopotensiutama.png"
            alt="Logo Universitas Potensi Utama"
            width="120"
            class="mb-4">

        <h2>SMART EVENT CAMPUS</h2>

        <p>
            Sistem Informasi Event Kampus Universitas Potensi Utama
            untuk mengelola Seminar, Workshop,
            Pelatihan, dan Lomba Mahasiswa.
        </p>

        <a href="index.php" class="btn btn-light mt-4">

            <i class="fa-solid fa-house"></i>

            Kembali ke Website

        </a>

        <small>

            © 2026 Universitas Potensi Utama

        </small>

    </div>

    <!-- PANEL KANAN -->

    <div class="right-panel">

        <img
            src="assets/img/Logopotensiutama.png"
            alt="Logo Smart Event Campus"
            width="80"
            class="d-block mx-auto mb-3">

        <h3 class="text-center">

            Login Administrator

        </h3>

        <p class="text-center text-muted mb-4">

            Silakan login menggunakan akun administrator.

        </p>

        <?php if(isset($_SESSION['error'])) : ?>

        <div class="alert alert-danger">

            <i class="fa-solid fa-circle-exclamation"></i>

            <?= htmlspecialchars($_SESSION['error']); ?>

        </div>

        <?php unset($_SESSION['error']); endif; ?>

        <form action="proses_login.php" method="POST">

            <!-- Username -->

            <div class="mb-3">

                <label class="form-label">

                    Username

                </label>

                <div class="input-group">

                    <span class="input-group-text">

                        <i class="fa-solid fa-user"></i>

                    </span>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan Username"
                        autocomplete="username"
                        tabindex="1"
                        required>

                </div>

            </div>

            <!-- Password -->

            <div class="mb-4">

                <label class="form-label">

                    Password

                </label>

                <div class="input-group">

                    <span class="input-group-text">

                        <i class="fa-solid fa-lock"></i>

                    </span>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan Password"
                        autocomplete="current-password"
                        tabindex="2"
                        required>

                    <button
                        type="button"
                        class="btn btn-outline-secondary"
                        onclick="showPassword()">

                        <i class="fa-solid fa-eye" id="icon"></i>

                    </button>

                </div>

            </div>

            <button
                type="submit"
                name="login"
                class="btn btn-primary w-100"
                tabindex="3">

                <i class="fa-solid fa-right-to-bracket"></i>

                Login

            </button>

        </form>

        <div class="text-center mt-4">

            <a href="#"
               data-bs-toggle="modal"
               data-bs-target="#forgotModal">

                Lupa Password?

            </a>

            <span class="mx-2">|</span>

            <a href="#"
               data-bs-toggle="modal"
               data-bs-target="#registerModal">

                Daftar Admin

            </a>

        </div>

    </div>

</div>

<!-- MODAL LUPA PASSWORD -->

<div class="modal fade" id="forgotModal" tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header bg-primary text-white">

<h5 class="modal-title">

<i class="fa-solid fa-key"></i>

Lupa Password

</h5>

<button
    class="btn-close btn-close-white"
    data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">

Jika Anda lupa password, silakan menghubungi
<b>Administrator Sistem / Bagian IT Universitas Potensi Utama</b>
untuk melakukan reset password.

</div>

<div class="modal-footer">

<button
    class="btn btn-secondary"
    data-bs-dismiss="modal">

    Tutup

</button>

</div>

</div>

</div>

</div>

<!-- MODAL REGISTER -->

<div class="modal fade" id="registerModal" tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header bg-success text-white">

<h5 class="modal-title">

<i class="fa-solid fa-user-plus"></i>

Daftar Administrator

</h5>

<button
    class="btn-close btn-close-white"
    data-bs-dismiss="modal">
</button>

</div>

<div class="modal-body">

Pendaftaran Administrator hanya dapat dilakukan oleh
<b>Super Administrator</b> atau
<b>Bagian Teknologi Informasi (IT)</b>
Universitas Potensi Utama.

</div>

<div class="modal-footer">

<button
    class="btn btn-success"
    data-bs-dismiss="modal">

    Mengerti

</button>

</div>

</div>

</div>

</div>

<script>

function showPassword(){

    const pass = document.getElementById("password");
    const icon = document.getElementById("icon");

    if(pass.type === "password"){

        pass.type = "text";

        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");

    }else{

        pass.type = "password";

        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");

    }

}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>