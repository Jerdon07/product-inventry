<?php view('partials/head.php') ?>
<?php view('partials/nav.php') ?>

<main>
    <div class="form-wrapper">

        <!-- Form Header -->
        <div class="form-header">
            <h1>Log In</h1>
            <p>Please fill out the form to continue</p>
        </div>

        <!-- Form -->
        <form action="/sessions" method="POST" class="login-form">

            <!-- Email -->
            <div class="input-group">
                <label for="price">
                    Email <span>*</span>
                </label>
                <input 
                    type="email"
                    name="email"
                    id="email"
                    value="<?= $data['email'] ?? '' ?>"
                >
                <?php if(isset($errors['email'])) : ?>
                    <p class="input-error"><?= $errors['email'] ?></p>
                <?php endif ?>
            </div>

            <!-- Password -->
            <div class="input-group">
                <label for="password">
                    Password <span>*</span>
                </label>
                <input 
                    type="password"
                    name="password" 
                    id="password"
                    value="<?= $_POST['password'] ?? '' ?>"
                >
                <?php if(isset($errors['password'])) : ?>
                    <p class="input-error"><?= $errors['password'] ?></p>
                <?php endif ?>
            </div>
        
            <!-- Submit Button -->
            <button type="submit">Login</button>
        </form>
    </div>
</main>
<?php view('partials/footer.php') ?>