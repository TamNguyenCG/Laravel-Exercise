<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    public function index(): Factory|View|Application
    {
        $cities = City::all();
        return view('cities.list', compact('cities'));
    }

    public function create(): Factory|View|Application
    {
        return view('cities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $city = new City();
        $city->name = $request->input('name');
        $city->save();
        Session::flash('success', 'Thêm mới tỉnh thành thành công');
        return redirect()->route('cities.index');
    }

    public function edit($id): Factory|View|Application
    {
        $city = City::findOrFail($id);
        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $city = City::findOrFail($id);
        $city->name = $request->input('name');
        $city->save();
        Session::flash('success', 'Cập nhật tỉnh thành thành công');
        return redirect()->route('cities.index');
    }

    public function destroy($id): RedirectResponse
    {
        $city = City::findOrFail($id);
        $city->customers()->delete();
        $city->delete();
        Session::flash('warning', 'Xóa tỉnh thành thành công');
        return redirect()->route('cities.index');
    }
}
