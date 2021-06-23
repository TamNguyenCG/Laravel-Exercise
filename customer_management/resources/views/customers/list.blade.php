@extends('home')
@section('title', 'Danh sách khách hàng')
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
            <h1>Danh Sách Khách Hàng</h1>
        </div>
        <div class="row">
            <div class="col-6">
                <a class="btn btn-primary" href="{{ route('customers.create') }}">Thêm mới</a>
            </div>
            <div class="col-6">
                <a class="btn btn-outline-primary" href="{{route('cities.index')}}" style="float: right"
                   data-toggle="modal" data-target="#cityModal">
                    Lọc
                </a>
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

            @if(isset($totalCustomerFilter))
                <span class="text-muted">
                    {{'Tìm thấy' . ' ' . $totalCustomerFilter . ' '. 'khách hàng:'}}
                </span>
            @endif

            @if(isset($cityFilter))
                <div class="pl-5">
                   <span class="text-muted"><i class="fa fa-check" aria-hidden="true"></i>
                       {{ 'Thuộc tỉnh' . ' ' . $cityFilter->name }}</span>
                </div>
            @endif
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Ngày Sinh</th>
                <th scope="col">Email</th>
                <th scope="col">Tỉnh thành</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(count($customers) == 0)
                <tr>
                    <td colspan="7" class="text-center">Không có dữ liệu</td>
                </tr>
            @else
                @foreach($customers as $key => $customer)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->dob }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->city->name }}</td>
                        <td><a href="{{ route('customers.edit', $customer->id) }}">sửa</a></td>
                        <td><a href="{{ route('customers.destroy', $customer->id) }}" class="text-danger"
                               onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination" style="float: right">
                {{$customers->appends(request()->query())}}
            </ul>
        </nav>
    </div>
</div>
@endsection
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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


{{--        <!-- Modal -->--}}
{{--        <div class="modal fade" id="cityModal" role="dialog">--}}
{{--            <div class="modal-dialog modal-lg">--}}
{{--                <!-- Modal content-->--}}
{{--                <form action="{{ route('customers.filterByCity') }}" method="get">--}}
{{--                    @csrf--}}
{{--                    <div class="modal-content">--}}
{{--                        <div class="modal-header">--}}
{{--                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <!--Lọc theo khóa học -->--}}
{{--                            <div class="select-by-program">--}}
{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-sm-5 col-form-label border-right">Lọc khách hàng theo tỉnh--}}
{{--                                        thành</label>--}}
{{--                                    <div class="col-sm-7">--}}
{{--                                        <select class="custom-select w-100" name="city_id">--}}
{{--                                            <option value="">Chọn tỉnh thành</option>--}}
{{--                                            @foreach($cities as $city)--}}
{{--                                                @if(isset($cityFilter))--}}
{{--                                                    @if($city->id == $cityFilter->id)--}}
{{--                                                        <option value="{{$city->id}}"--}}
{{--                                                                selected>{{ $city->name }}</option>--}}
{{--                                                    @else--}}
{{--                                                        <option value="{{$city->id}}">{{ $city->name }}</option>--}}
{{--                                                    @endif--}}
{{--                                                @else--}}
{{--                                                    <option value="{{$city->id}}">{{ $city->name }}--}}
{{--                                                    </option>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- </form> -->--}}
{{--                            </div>--}}
{{--                            <!--End-->--}}

{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="submit" id="submitAjax" class="btn btn-primary">Chọn</button>--}}
{{--                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

