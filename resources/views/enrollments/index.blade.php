<!DOCTYPE html>
<html>
<head>
    <title>Enrollments Table</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        table { background: white; border-collapse: collapse; width: 90%; margin: auto; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #f0ad4e; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Enrollments Table</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Course ID</th>
            <th>Progress (%)</th>
            <th>Enrollment Date</th>
        </tr>
        @foreach ($enrollments as $enrollment)
        <tr>
            <td>{{ $enrollment->enrollment_id }}</td>
            <td>{{ $enrollment->user_id }}</td>
            <td>{{ $enrollment->course_id }}</td>
            <td>{{ $enrollment->progress }}</td>
            <td>{{ $enrollment->enrollment_date }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
