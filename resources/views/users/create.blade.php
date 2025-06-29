<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        label { display: block; margin-top: 15px; }
        input, select { width: 300px; padding: 8px; }
        button { margin-top: 20px; background: orange; color: white; padding: 10px 20px; border: none; }
    </style>
</head>
<body>
    <h2>Add New User</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/users') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="text" name="password" required>

        <label>Role:</label>
        <select name="role" required>
            <option value="learner">Learner</option>
            <option value="instructor">Instructor</option>
            <option value="both">Both</option>
        </select>

        <label>Verified:</label>
        <select name="is_verified" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>

        <label>Subscription Status:</label>
        <select name="subscription_status" required>
            <option value="free">Free</option>
            <option value="premium">Premium</option>
        </select>

        <button type="submit">Add User</button>
    </form>
</body>
</html>
