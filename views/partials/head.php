<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="/css/main.css">
    <?php if (!empty($script)) : ?>
        <script type="module" src="<?= htmlspecialchars($script, ENT_QUOTES, 'UTF-8') ?>"></script>
    <?php endif ?>
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-full">