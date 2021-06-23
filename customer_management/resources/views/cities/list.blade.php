@extends('home')
@section('title', 'Danh sách tỉnh thành')
@section('content')
    <!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="col-12">
    <div class="row">
        <div class="col-12">
            <h1>Danh sách tỉnh thành</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="btn btn-primary" href="{{route('cities.create')}}">Thêm mới</a>
            </div>
            <div class="col-6">

            </div>
        </div>
        <div class="col-12">
            @if(Session::has('success'))
                <script>
                    toastr.success("{!! Session::get('success') !!}")
                </script>
            @elseif(Session::has('warning'))
                <script>
                    toastr.warning("{!! Session::get('warning') !!}")
                </script>
            @elseif(Session::has('info'))
                <script>
                    toastr.info("{!! Session::get('info') !!}")
                </script>
            @endif
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên tỉnh thành</th>
                <th scope="col">Số khách hàng</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($cities) == 0)
                <tr>
                    <td colspan="4">Không có dữ liệu</td>
                </tr>
            @else
                @foreach($cities as $key => $citie)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $citie->name }}</td>
                        <td>{{ count($citie->customers) }}</td>
                        <td><a href="{{route('cities.edit', $citie->id)}}">sửa</a></td>
                        <td><a href="{{route('cities.destroy', $citie->id)}}" class="text-danger"
                               onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
