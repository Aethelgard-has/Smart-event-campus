<?php
$current = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">

    <div class="container">

        <!-- Logo / Brand -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">

            <i class="fa-solid fa-calendar-days fa-2x text-warning me-3"></i>

            <div>
                <div class="fw-bold fs-5">
                    Smart Event Campus
                </div>

                <small class="text-light">
                    Universitas Potensi Utama
                </small>
            </div>

        </a>

        <!-- Tombol Menu Mobile -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link <?= ($current == "index.php") ? "active" : ""; ?>" href="index.php">
                        <i class="fa-solid fa-house me-1"></i>
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($current == "event.php") ? "active" : ""; ?>" href="event.php">
                        <i class="fa-solid fa-calendar-days me-1"></i>
                        Event
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($current == "tentang.php") ? "active" : ""; ?>" href="tentang.php">
                        <i class="fa-solid fa-circle-info me-1"></i>
                        Tentang
                    </a>
                </li>

                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a href="login.php" class="btn btn-warning fw-bold px-4">
                        <i class="fa-solid fa-user-lock me-2"></i>
                        Login Admin
                    </a>
                </li>

            </ul>

        </div>

    </div>

</nav>