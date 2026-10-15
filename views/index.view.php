<?php view('partials/head.php', ['script' => 'js/index.js']) ?>
<?php view('partials/nav.php') ?>

<!-- Hero -->
<section class="hero">
    <div class="container">
        <p class="eyebrow">Inventory for sari-sari stores</p>
        <h1>Know what's on your shelves, without the notebook.</h1>
        <p class="hero-lead">
            Hello <span id="name">Guest</span>. Product Inventry keeps your products,
            prices, and stock counts in one place, so you always know what to restock
            before customers ask for it.
        </p>
        <div class="hero-actions">
            <a href="/register" class="btn btn-primary btn-lg">Get started</a>
            <a href="/login" class="btn btn-secondary btn-lg">Log in</a>
        </div>
    </div>
</section>

<main class="container page home">

    <!-- Features -->
    <section class="feature-grid" aria-label="Features">
        <article class="feature">
            <h3>Track every product</h3>
            <p>Record names, prices, and quantities. Add, edit, or remove items in a few clicks.</p>
        </article>

        <article class="feature">
            <h3>Stay on top of stock</h3>
            <p>See how many of each item you have left, so restocking isn't guesswork.</p>
        </article>

        <article class="feature">
            <h3>Private to your account</h3>
            <p>Every product belongs to you. Nobody else can view or change your inventory.</p>
        </article>
    </section>

    <!-- How it works -->
    <section class="steps" aria-label="How it works">
        <h2>How it works</h2>
        <ol>
            <li><strong>Create an account.</strong> It takes under a minute.</li>
            <li><strong>Add your products.</strong> Name, price, and how many you have.</li>
            <li><strong>Keep it updated.</strong> Adjust quantities as you sell and restock.</li>
        </ol>
    </section>

    <!-- Call to action -->
    <section class="cta">
        <h2>Ready to ditch the notebook?</h2>
        <a href="/register" class="btn btn-primary btn-lg">Create your account</a>
    </section>
</main>

<?php view('partials/footer.php') ?>
