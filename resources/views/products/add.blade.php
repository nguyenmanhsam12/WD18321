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
              <form action="{{route('product.postProduct')}}"method="post">
                @csrf
                <label for="">Tên sản phẩm</label>
                <input type="text"class="form-control"name="name">
                <label for="">Giá sản phẩm</label>
                <input type="text"class="form-control"name="price">
                <label for="">Danh mục sản phẩm</label>
                <select name="category_id" id=""class="form-control">
                    @foreach ($list_category as $item)
                        <option value="{{$item->id}}">{{$item->nameCategory}}</option>
                    @endforeach
                </select>
                <label for="">View</label>
                <input type="text"class="form-control"name="view">
                <input type="submit"class="btn btn-primary mt-3"value="Thêm mới">
              </form>
            </div>
        </div>
    </div>

</body>

</html>
