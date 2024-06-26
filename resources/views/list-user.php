<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <h1>Chào cái cc</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($users as $us): ?>
            <tr>
                <td><?= $us['id'] ?></td>
                <td><?= $us['name'] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

  
</body>
</html>