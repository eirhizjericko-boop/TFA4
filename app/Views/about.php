<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>

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

        .container {
            background-color: white;
            padding: 25px;
            max-width: 600px;
            border-radius: 8px;
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

<div class="container">
    <h1>About the System</h1>

    <p>This application is called Tasks for Today Management System.</p>
    <p>It displays tasks based on their scheduled dates.</p>
    <p><strong>Developer:</strong> Eirhiz Jericko Maniego</p>
</div>

</body>
</html>