<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <form action="{{route('product.timkiem')}}"method="post">
                    @csrf
                    <input type="text"name="nameProduct">
                    <input type="submit"value="tìm kiếm">
                </form>
            </div>
            <div class="col-md-12 mt-3">
                <a href="{{ route('product.addProduct') }}"class="btn btn-primary mb-3">Thêm mới</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>View</th>
                            <th>Danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->view }}</td>
                                <td>{{ $item->nameCategory}}</td>
                                <td>
                                    <a href="{{ route('product.edit', $item->id) }}"class="btn btn-warning">Sửa</a>
                                    <a href="{{ route('product.delete', $item->id) }}"class="btn btn-danger"
                                        onclick="return(confirm('Bạn có chắc chắn muốn xóa không'))">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
