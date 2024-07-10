<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>  
    {{-- <h1>Chào cái cc</h1> --}}
    <a href="{{route('users.addUser')}}"class="btn btn-primary mb-3">Thêm mới</a>

    <table class="table table-hover"> 
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>email</th>
                <th>Phòng ban</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Listusers as $user)
                <tr>
                    <td> {{ $user->id }}</td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td> {{ $user->ten_donvi }}</td>
                    <td>
                        <a href="{{ route('users.editUser',$user->id) }}"class="btn btn-warning">Sửa</a>
                        <a href="{{ route('users.deleteUser',$user->id) }}"class="btn btn-danger" onclick="return(confirm('Bạn có chắn chắn muốn xóa không'))">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html> 