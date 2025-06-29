<!DOCTYPE html>
<html>
<head>
    <title>Content Table</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 20px; }
        table { background: white; border-collapse: collapse; width: 90%; margin: auto; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background: #f0ad4e; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Content Table</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Course ID</th>
            <th>Type</th>
            <th>Description</th>
            <th>URL</th>
        </tr>
        @foreach ($contents as $content)
        <tr>
            <td>{{ $content->content_id }}</td>
            <td>{{ $content->course_id }}</td>
            <td>{{ $content->type }}</td>
            <td>{{ $content->description }}</td>
            <td><a href="{{ $content->url }}" target="_blank">View</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
