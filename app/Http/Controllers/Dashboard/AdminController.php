<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\StoreAdminRequest;
use App\Http\Requests\Dashboard\Admin\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function index(): View
    {
        $admins = Admin::latest()->get();

        return view(
            'dashboard.pages.admin.index',
            compact('admins')
        );
    }


    public function store(StoreAdminRequest $request): RedirectResponse
    {
        // Store Admin
        $admin = Admin::create($request->validated());


        return back();
    }




    public function update(UpdateAdminRequest $request, Admin $admin): RedirectResponse
    {


        // Update Admin
        $admin->update($request->validated());

        return back();
    }


    public function destroy(Admin $admin): RedirectResponse
    {
        // Delete Admin
        $admin->delete();

        return back();
    }
}
