<?php view('partials/head.php', ['script' => '/js/products/index.js']) ?>
<?php view('partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main class="container page">
    <div class="toolbar">
        <button id="openDialogBtn" class="btn btn-primary">Add Product</button>
    </div>

    <!-- Display List -->
    <table class="products-table">
        <caption>Product Records</caption>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>

        <!-- Products List fetched by JavaScript -->
        <tbody id="productList"></tbody>
    </table>
</main>

<!-- Product Create Dialog -->
<dialog id="productDialog">
    <h2>Add Product</h2>
    <p class="dialog-description">Fill out the form to create a new product</p>

    <form id="productForm" action="/products/create" method="POST" class="stack">

        <!-- Name -->
        <div class="field">
            <label for="name">Product Name <span>*</span></label>
            <input id="name" name="name" type="text">
            <p id="error-name" class="input-error"></p>
        </div>

        <!-- Price & Quantity -->
        <div class="field-row">
            <div class="field">
                <label for="price">Product Price <span>*</span></label>
                <input id="price" name="price" type="number" step="0.01">
                <p id="error-price" class="input-error"></p>
            </div>

            <div class="field">
                <label for="quantity">Product Quantity <span>*</span></label>
                <input id="quantity" name="quantity" type="number">
                <p id="error-quantity" class="input-error"></p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="form-actions">
            <button type="button" id="closeDialogBtn" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
    </form>
</dialog>

<?php view('partials/footer.php') ?>