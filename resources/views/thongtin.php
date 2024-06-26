

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <h1>Thông tin sinh viên</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Mã sv</th>
                <th>Trường</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $ten ?></td>
                <td><?= $tuoi ?></td>
                <td><?= $masv ?></td>
                <td><?= $truong ?></td>
            </tr>   
        </tbody>
    </table>
</body>
</html>