<!DOCTYPE html>
<html>
<head>
    <title>Courses Table</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        table { background: white; border-collapse: collapse; width: 90%; margin: auto; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #f0ad4e; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Courses Table</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Subject</th>
            <th>Instructor ID</th>
            <th>Language</th>
            <th>Accredited</th>
        </tr>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->course_id }}</td>
            <td>{{ $course->title }}</td>
            <td>{{ $course->subject }}</td>
            <td>{{ $course->instructor_id }}</td>
            <td>{{ $course->language }}</td>
            <td>{{ $course->accreditation_status ? 'Yes' : 'No' }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
