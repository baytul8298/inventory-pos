<?php

namespace App\Http\Controllers\purchase;

use App\Models\Unit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('admin.pages.purchases.unit.index');
    }

    public function datatable(Request $request) {
        $query = Unit::orderBy('created_at', 'desc')->where('branch_id', Auth::user()?->branch_id);

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('short_name', 'like', '%' . $searchTerm . '%');
            });
        }

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('name', function(Unit $unit) {
                return $unit->name;
            })
            ->addColumn('short_name', function(Unit $unit) {
                return $unit->short_name;
            })
            ->addColumn('allow_decimal', function(Unit $unit) {
                return $unit->allow_decimal == 1
                    ? '<span class="badge bg-success-transparent rounded-pill text-success p-2 px-3 fw-semibold">Yes</span>'
                    : '<span class="badge bg-danger-transparent rounded-pill text-danger p-2 px-3 fw-semibold">No</span>';
            })
            ->addColumn('action', function (Unit $unit) {
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light px-4 py-2" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fw-semibold"><i class="ti ti-chevron-down fa-lg"></i></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item edit-unit" data-id="' . $unit->id . '"><i class="fa fa-edit"></i> Edit</a></li>
                    </ul>
                </div>';
            })
            ->rawColumns(['action', 'allow_decimal'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd("Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'branch_id' => Auth::user()?->branch_id,
            'name' => $request->name,
            'short_name' => $request->short_name,
            'allow_decimal' => $request->allow_decimal,
            'base_unit_id' => $request->base_unit,
            'base_unit_multiplier' => $request->base_unit_multiplier,
            'status' => 1,
            'user_id' => Auth::user()?->id
        ];

        $insert = Unit::create($data);

        if ($insert) {
            $message = 'Unit created successfully';
            $error = false;
        } else {
            $message = 'Error to create unit';
            $error = true;
        }

        return response()->json(['error' => $error, 'msg' => $message]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd($id, "Show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit = Unit::findOrFail($id);

        return response()->json([
            'id' => $unit->id,
            'name' => $unit->name,
            'short_name' => $unit->short_name,
            'allow_decimal' => $unit->allow_decimal,
            'base_unit' => $unit->base_unit_id,
            'base_unit_multiplier' => $unit->base_unit_multiplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit = Unit::findOrFail($id);

        $data = [
            'name' => $request->name,
            'short_name' => $request->short_name,
            'allow_decimal' => $request->allow_decimal,
            'base_unit_id' => $request->base_unit,
            'base_unit_multiplier' => $request->base_unit_multiplier,
        ];

        // Save User
        $update = $unit->update($data);

        if ($update) {
            $message = 'Unit updated successfully';
            $error = false;
        } else {
            $message = 'Error to update unit';
            $error = true;
        }

        return response()->json(['error' => $error, 'msg' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id, "Delete");
    }
}
