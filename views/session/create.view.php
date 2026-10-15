<?php view('partials/head.php', ['script' => '/js/session/create.js']) ?>
<?php view('partials/nav.php') ?>

<main>
    <div class="form-wrapper">

        <!-- Form Header -->
        <div class="form-header">
            <h1>Log In</h1>
            <p>Please fill out the form to continue</p>
        </div>

        <!-- Form -->
        <form 
            action="/api/sessions/store"
            method="POST" 
            id="loginForm" 
            class="login-form"
        >
            <!-- Email -->
            <div class="input-group">
                <label for="email">
                    Email <span>*</span>
                </label>
                <input 
                    type="email"
                    name="email"
                    id="email"
                    value="<?= $data['email'] ?? '' ?>"
                >
                <p id="error-email" class="input-error"></p>
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
                <p id="error-password" class="input-error"></p>
                <?php if(isset($errors['password'])) : ?>
                    <p class="input-error"><?= $errors['password'] ?></p>
                <?php endif ?>
            </div>
        
            <!-- Submit Button -->
            <button type="submit" id="submit">Login</button>
        </form>
    </div>
</main>
<?php view('partials/footer.php') ?>