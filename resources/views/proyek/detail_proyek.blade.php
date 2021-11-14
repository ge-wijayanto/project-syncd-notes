<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Proyek</title>
    <style>
        td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Detail Proyek : {{$projects->name}}</h1>
    <table>
        <thead>
            <tr>
                <th>Nama proyek</th>
                <th>Kode proyek</th>
                <th>Pembuat proyek</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$projects->name}}</td>
                <td>{{$projects->code}}</td>
                <td>{{$projects->user->name}}</td>
            </tr>
        </tbody>
    </table>

    <form action="/project/delete/{{$projects->id}}">
        <input type="submit" value="Hapus Proyek">
    </form>
</body>
</html>