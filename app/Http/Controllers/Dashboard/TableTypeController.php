<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TableType\StoreTableTypeRequest;
use App\Http\Requests\Dashboard\TableType\UpdateTableTypeRequest;
use App\Models\TableType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TableTypeController extends Controller
{

    public function index(): View
    {
        $tableTypes = TableType::latest('name')->get();

        return view(
            'dashboard.pages.tableType.index',
            compact('tableTypes')
        );
    }


    public function store(StoreTableTypeRequest $request): RedirectResponse
    {
        // Store TableType
        $tableType = TableType::create($request->validated());


        return back();

    }


    public function update(UpdateTableTypeRequest $request, TableType $tableType): RedirectResponse
    {
        // Update TableType
        $tableType->update($request->validated());


        return back();
    }


    public function destroy(TableType $tableType): RedirectResponse
    {
        // Delete TableType
        $tableType->delete();

        return back();
    }
}
