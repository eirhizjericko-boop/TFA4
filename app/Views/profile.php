<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f6f8;
        }

        nav {
            margin-bottom: 25px;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #1976d2;
        }

        .profile {
            background-color: white;
            padding: 25px;
            max-width: 500px;
            border-radius: 8px;
        }

        .profile p {
            font-size: 18px;
        }
    </style>
</head>
<body>

<nav>
    <a href="<?= site_url('/') ?>">Today</a>
    <a href="<?= site_url('tasks') ?>">All Tasks</a>
    <a href="<?= site_url('profile') ?>">Profile</a>
    <a href="<?= site_url('about') ?>">About</a>
</nav>

<div class="profile">
    <h1>Profile</h1>

    <?php if ($user): ?>
        <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
        <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
        <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
        <p><strong>Created At:</strong> <?= esc($user['created_at']) ?></p>
    <?php else: ?>
        <p>No user profile was found.</p>
    <?php endif; ?>
</div>

</body>
</html>