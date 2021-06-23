<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\City;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index(): Factory|View|Application
    {
        $customers = Customer::paginate(5);
        $cities = City::all();
        return view('customers.list', compact('customers', 'cities'));
    }


    public function create(): Factory|View|Application
    {
        $cities = City::all();
        return view('customers.create', compact('cities'));
    }

    public function store(CustomerRequest $request): RedirectResponse
    {
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->city_id = $request->input('city_id');
        $customer->save();
        Session::flash('success', 'Tạo mới khách hàng thành công');
        return redirect()->route('customers.index');
    }

    public function edit($id): Factory|View|Application
    {
        $customer = Customer::findOrFail($id);
        $cities = City::all();

        return view('customers.edit', compact('customer', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->city_id = $request->input('city_id');
        $customer->save();

        Session::flash('success', 'Cập nhật khách hàng thành công');

        return redirect()->route('customers.index');
    }

    public function destroy($id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        //dung session de dua ra thong bao
        Session::flash('warning', 'Xóa khách hàng thành công');

        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.index');
    }

    public function filterByCity(Request $request): Factory|View|Application
    {
        $idCity = $request->input('city_id');

        $cityFilter = City::findOrFail($idCity);

        $customers = Customer::where('city_id', $cityFilter->id)->get();
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customers.list', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (empty($keyword)) {
            Session::flash('notfound', "Please insert search keyword");
            return redirect()->route('customers.index');
        }
        $customers = Customer::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);

        $countCustomers = $customers->count();
        $cities = City::all();
        Session::flash('info', "Tìm kiếm được $countCustomers khách hàng với từ khóa là: $keyword");
        return view('customers.list', compact('customers', 'cities', 'keyword'));
    }
}
