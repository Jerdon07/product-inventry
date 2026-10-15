<nav>
    <!-- Left (Logo Area) -->
    <div class="left">
        <img src="/favicon.svg" alt="logo">
        <h3>Product Inventry</h3>
    </div>

    <!-- Right -->
    <div class="right">
        <!-- Navigation -->
        <div class="pages">
            <a href="/" class="<?= urlIs('/') ? 'active' : '' ?>">
                Home
            </a>

            <?php if(isset($_SESSION['user'])) : ?>
                <a 
                    href="/products" 
                    class="
                        <?= urlIs('/products') ? 'active' : '' ?>"
                >
                    Products
                </a>
            <?php endif ?>
        </div>

        <!-- Auth -->
        <?php if (isset($_SESSION['user'])) : ?>
            <form action="/sessions" method="POST" class="auth">
                <input type="hidden" name="_method" value="DELETE">

                <button type="submit" >
                    Log Out
                </button>
            </form>
        <?php else : ?>
            <div class="auth">
                <a 
                    href="/login"
                    class="<?= urlIs('/login') ? 'active' : '' ?>"
                >
                    Login
                </a>

                <a 
                    href="/register"
                    class="<?= urlIs('/register') ? 'active' : '' ?>"
                >
                    Register
                </a>
            </div>
        <?php endif ?>
    </div>
</nav>