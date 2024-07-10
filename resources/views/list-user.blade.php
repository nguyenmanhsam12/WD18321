<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <h1>Chào cái cc</h1>
    <table border="1"> 
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Listusers as $user)
                <tr>
                    <td> {{ $user->id }}</td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
  
</body>
</html>