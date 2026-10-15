<?php view('partials/head.php', ['script' => 'js/registration/index.js']) ?>
<?php view('partials/nav.php') ?>

<main>
    <div class="auth-form-wrapper">
        <div class="auth-form-header">
            <h1>Register</h1>
            <p>Please fill out the form to continue</p>
        </div>

        <form 
            action="/register" 
            method="POST" 
            id="registrationForm" 
            class="auth-form">

            <!-- Name -->
            <div class="input-group">
                <label for="name" class="text-sm font-semibold">
                    Full Name <span class="text-red-500">*</span>
                </label>

                <input 
                    id="name" 
                    name="name" 
                    type="text"
                    class="border rounded-sm pl-2"
                    value="<?= $data['name'] ?? '' ?>"
                >

                <p id="error-name" class="input-error"></p>
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="price" class="text-sm font-semibold">
                    Email <span class="text-red-500">*</span>
                </label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    class="border rounded-sm"
                    value="<?= $data['email'] ?? '' ?>"
                >
                <p id="error-email" class="input-error"></p>
            </div>

            <!-- Quantity -->
            <div class="input-group">
                <label for="quantity" class="text-sm font-semibold">
                    Password <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password"
                    name="password" 
                    id="password"
                    class="border rounded-sm"
                >
                <p id="error-password" class="input-error"></p>
            </div>
            
            <!-- Submit Button -->
            <button type="submit">Submit</button>
        </form>
    </div>
</main>
<?php view('partials/footer.php') ?>