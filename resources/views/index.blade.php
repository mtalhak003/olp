<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        table { background: white; border-collapse: collapse; width: 80%; margin: auto; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #f0ad4e; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">All Registered Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->user_id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
