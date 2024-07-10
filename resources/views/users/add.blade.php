<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('users.addPostUser') }}" method="post">
                    @csrf
                    <label for="nameUser">Tên</label>
                    <input type="text"name="nameUser" class="form-control">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="emailUser">Email</label>
                    <input type="text"name="emailUser" class="form-control">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="phongbanUser">Phòng ban</label>
                    <select name="phongbanUser" id=""class="form-control">
                        @foreach ($phongban as $value)
                            <option value="{{ $value->id }}">{{ $value->ten_donvi }}</option>
                        @endforeach
                    </select>
                    <label for="tuoiUser">Tuổi</label>
                    <input type="text"name="tuoiUser" class="form-control">
                    @error('tuoi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button class="btn btn-primary">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
