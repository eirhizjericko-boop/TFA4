<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <a href="<?= base_url('logout') ?>">Logout</a>
</head>
<body>
<nav class="navbar">
    <a href="<?= base_url('users') ?>">POS Management System</a>
    <span><a href="<?= base_url('users') ?>">Users</a> <a href="<?= base_url('users/new') ?>">Add User</a> <a href="<?= base_url('customers/new') ?>">Add Customer</a></span>
</nav>
<main class="container narrow">
    <h1>Edit User</h1>
    <?php $errors = $errors ?? session()->getFlashdata('errors') ?? []; ?>
    <?php if ($success = session()->getFlashdata('success')): ?><div class="alert success"><?= esc($success) ?></div><?php endif; ?>
    <?php if ($errors): ?><div class="alert error"><ul><?php foreach ($errors as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
    <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data" class="card form-card">
        <?= csrf_field() ?>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="<?= esc(old('username', $user['username'])) ?>">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="<?= esc(old('full_name', $user['full_name'])) ?>">
        <label for="email">Email (optional)</label>
        <input type="email" id="email" name="email" value="<?= esc(old('email', $user['email'])) ?>">
        <label for="avatar">Profile Picture (JPG or PNG, maximum 2MB)</label>
        <input type="file" id="avatar" name="avatar" accept=".jpg,.jpeg,.png,image/jpeg,image/png">
        <?php if (! empty($user['avatar'])): ?>
            <p>Current picture:</p>
            <img class="avatar preview" src="<?= base_url('uploads/' . rawurlencode($user['avatar'])) ?>" alt="Current avatar">
        <?php endif; ?>
        <button type="submit">Update User</button>
    </form>
</main>
</body>
</html>
