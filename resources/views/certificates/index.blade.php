<!DOCTYPE html>
<html>
<head>
    <title>Certificates Table</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        table { background: white; border-collapse: collapse; width: 90%; margin: auto; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #f0ad4e; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Certificates Table</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Course ID</th>
            <th>Issue Date</th>
        </tr>
        @foreach ($certificates as $certificate)
        <tr>
            <td>{{ $certificate->certificate_id }}</td>
            <td>{{ $certificate->user_id }}</td>
            <td>{{ $certificate->course_id }}</td>
            <td>{{ $certificate->issue_date }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
