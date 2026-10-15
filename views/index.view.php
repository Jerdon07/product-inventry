<?php view('partials/head.php', ['script' => 'js/index.js']) ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main class="container page">
    <p>Hello <span id="name">Guest</span>. Welcome to the Home page.</p>
</main>
<?php view('partials/footer.php') ?>