<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main class="container page">
    <div class="card">
        <form action="/product/edit" method="POST" class="stack">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="<?= htmlspecialchars($product['id'] ?? '') ?>">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($product['user_id'] ?? '') ?>">

            <!-- Name -->
            <div class="field">
                <label for="name">Product Name <span>*</span></label>
                <input id="name" name="name" type="text" value="<?= htmlspecialchars($product['name'] ?? '') ?>">
                <?php if (isset($errors['name'])) : ?>
                    <p class="input-error"><?= htmlspecialchars($errors['name']) ?></p>
                <?php endif ?>
            </div>

            <!-- Price & Quantity -->
            <div class="field-row">
                <div class="field">
                    <label for="price">Product Price <span>*</span></label>
                    <input id="price" name="price" type="number" value="<?= htmlspecialchars($product['price'] ?? '') ?>">
                    <?php if (isset($errors['price'])) : ?>
                        <p class="input-error"><?= htmlspecialchars($errors['price']) ?></p>
                    <?php endif ?>
                </div>

                <div class="field">
                    <label for="quantity">Product Quantity <span>*</span></label>
                    <input id="quantity" name="quantity" type="number" value="<?= htmlspecialchars($product['quantity'] ?? '') ?>">
                    <?php if (isset($errors['quantity'])) : ?>
                        <p class="input-error"><?= htmlspecialchars($errors['quantity']) ?></p>
                    <?php endif ?>
                </div>
            </div>

            <!-- Buttons -->
            <div class="form-actions">
                <a href="/products" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</main>
<?php view('partials/footer.php') ?>