<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main class="container page">
    <p>Hello <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Guest') ?>. Welcome to the Home page.</p>
</main>
<?php view('partials/footer.php') ?>