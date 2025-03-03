<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List</title>
</head>
<body>

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}
th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}
th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
}
tr:nth-child(even) {
    background-color: #f2f2f2;
}
.header {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
}
    </style>

    <div class="header">News List</div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Starting Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $new)
                <tr>
                    <td>{{ $new->id }}</td>
                    <td>{{ $new->title }}</td>
                    <td>{{ $new->description }}</td>
                    <td>{{ $new->start_date }}</td>
                    <td>{{ $new->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
