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
    <span><a href="<?= base_url('users/new') ?>">Add User</a> <a href="<?= base_url('customers/new') ?>">Add Customer</a></span>
</nav>
<main class="container">
    <h1>User Accounts</h1>
    <?php if ($success = session()->getFlashdata('success')): ?><div class="alert success"><?= esc($success) ?></div><?php endif; ?>
    <?php if ($error = session()->getFlashdata('error')): ?><div class="alert error"><?= esc($error) ?></div><?php endif; ?>
    <div class="card table-wrap">
        <table>
            <thead><tr><th>Avatar</th><th>Username</th><th>Full Name</th><th>Email</th><th>Action</th></tr></thead>
            <tbody>
            <?php if ($users): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?php $avatar = ! empty($user['avatar']) ? base_url('uploads/' . rawurlencode($user['avatar'])) : base_url('uploads/avatar-placeholder.svg'); ?>
                            <img class="avatar" src="<?= esc($avatar) ?>" alt="Avatar for <?= esc($user['username']) ?>">
                        </td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td><?= esc($user['email'] ?: '—') ?></td>
                        <td><a class="button secondary" href="<?= base_url('users/edit/' . $user['id']) ?>">Edit</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No users found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
