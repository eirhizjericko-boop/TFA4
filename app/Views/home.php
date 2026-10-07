<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks for Today</title>

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
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #cccccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #1976d2;
            color: white;
        }

        .pending {
            color: #d97706;
        }

        .completed {
            color: green;
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
    <h1>Tasks for Today</h1>

    <p>Showing tasks scheduled for: <?= esc($today) ?></p>

    <?php if (empty($tasks)): ?>
        <p>No tasks are scheduled for today.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Task Title</th>
                <th>Status</th>
                <th>Task Date</th>
                <th>Created At</th>
            </tr>

            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= esc($task['title']) ?></td>
                    <td class="<?= esc($task['status']) ?>">
                        <?= esc(ucfirst($task['status'])) ?>
                    </td>
                    <td><?= esc($task['task_date']) ?></td>
                    <td><?= esc($task['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

</body>
</html>