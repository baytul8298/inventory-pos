<?php

namespace App\Http\Controllers\purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.purchases.brand.index');
    }

    public function datatable(Request $request) {
        $query = Brand::orderBy('created_at', 'desc')->where('branch_id', Auth::user()?->branch_id);

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            });
        }

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('name', function(Brand $brand) {
                return $brand->name;
            })
            ->addColumn('description', function(Brand $brand) {
                return $brand->description;
            })
            ->addColumn('action', function (Brand $brand) {
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light px-4 py-2" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fw-semibold"><i class="ti ti-chevron-down fa-lg"></i></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item edit-data" data-id="' . $brand->id . '"><i class="fa fa-edit"></i> Edit</a></li>
                    </ul>
                </div>';
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'branch_id' => Auth::user()?->branch_id,
            'name' => $request->name,
            'description' => $request->short_description,
            'status' => 1,
            'created_by' => Auth::user()?->id
        ];

        $insert = Brand::create($data);

        if ($insert) {
            $message = 'Brand created successfully';
            $error = false;
        } else {
            $message = 'Error to create brand';
            $error = true;
        }

        return response()->json(['error' => $error, 'msg' => $message]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);

        return response()->json([
            'id' => $brand->id,
            'name' => $brand->name,
            'description' => $brand->description,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::findOrFail($id);

        $data = [
            'name' => $request->name,
            'description' => $request->short_description,
        ];

        // Save User
        $update = $brand->update($data);

        if ($update) {
            $message = 'Brand updated successfully';
            $error = false;
        } else {
            $message = 'Error to update brand';
            $error = true;
        }

        return response()->json(['error' => $error, 'msg' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
