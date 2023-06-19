<?php

namespace App\Http\Controllers\Mobile\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class AdminController extends Controller
{
    public function index()
    {
        // Get Data
        $admins = Admin::latest()->get();

        // OR with filter

        // $admins = QueryBuilder::for(Admin::class)
        //     ->allowedFilters([
        //         "test_id",
        //         AllowedFilter::exact('test_id'),
        //     ])->get();


        // Return Response
        return response()->success(
            'this is all Admins',
            [
                "admins" => AdminResource::collection($admins),
            ]
        );
    }


    public function store(StoreAdminRequest $request)
    {
        // Store Admin
        $admin = Admin::create($request->validated());


        // Add Image to Admin
        $admin
            ->addMediaFromRequest('image')
            ->toMediaCollection('Admin');

        // Return Response
        return response()->success(
            'admin is added success',
            [
                "admin" => new AdminResource($admin),
            ]
        );
    }


    public function show(Admin $admin)
    {
        // Return Response
        return response()->success(
            'this is your admin',
            [
                "admin" => new AdminResource($admin),
            ]
        );
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        // Update Admin
         $admin->update($request->validated());


        // Edit Image for  Admin if exist
        $request->hasFile('image') &&
            $admin
                ->addMediaFromRequest('image')
                ->toMediaCollection('Admin');



        // Return Response
        return response()->success(
            'admin is updated success',
            [
                "admin" => new AdminResource($admin),
            ]
        );
    }

    public function destroy(Admin $admin)
    {
        // Delete Admin
        $admin->delete();

        // Return Response
        return response()->success('admin is deleted success');
    }
}
