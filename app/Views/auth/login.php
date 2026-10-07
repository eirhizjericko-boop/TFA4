<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<main class="container narrow">
    <h1>Staff Login</h1>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if ($success = session()->getFlashdata('success')): ?>
        <div class="alert success"><?= esc($success) ?></div>
    <?php endif; ?>

    <?php if ($error = session()->getFlashdata('error')): ?>
        <div class="alert error"><?= esc($error) ?></div>
    <?php endif; ?>

    <?php if ($errors): ?>
        <div class="alert error">
            <ul>
                <?php foreach ($errors as $message): ?>
                    <li><?= esc($message) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('login') ?>" method="post" class="card form-card">
        <?= csrf_field() ?>

        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            value="<?= esc(old('username')) ?>"
        >

        <label for="password">Password</label>
        <input type="password" id="password" name="password">

        <button type="submit">Login</button>
    </form>
</main>
</body>
</html>