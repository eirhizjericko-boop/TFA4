<h1>User Accounts</h1>

<a href="/">Home</a> |
<a href="/about">About</a> |
<a href="/customers">Customers</a> |
<a href="/users">Users</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Username</th>
        <th>Full Name</th>
        <th>Created At</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>
            <td><?= esc($user['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<style>
    body {
        text-align: center;
        font-family: Arial, sans-serif;
    }

    h1 {
        font-size: 32px;
    }

    table {
        margin: 20px auto;
        border-collapse: collapse;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    th,
    td {
        padding: 10px;
    }
</style>