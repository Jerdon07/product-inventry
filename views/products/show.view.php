<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main class="container page">
    <div class="toolbar">
        <form action="/product/edit" method="GET">
            <input type="hidden" name="id" value="<?= (int) $product['id'] ?>">
            <button class="btn btn-secondary" type="submit">Edit</button>
        </form>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= (int) $product['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
    </div>

    <p><?= htmlspecialchars($product['name']) ?> is <?= htmlspecialchars($product['price']) ?> pesos.</p>
</main>
<?php view('partials/footer.php') ?>