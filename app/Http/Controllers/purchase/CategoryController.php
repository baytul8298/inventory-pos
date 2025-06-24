<?php

namespace App\Http\Controllers\purchase;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.purchases.category.index');
    }

    public function datatable(Request $request) {
        $query = Category::orderBy('created_at', 'desc')->where('branch_id', Auth::user()?->branch_id);

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('short_code', 'like', '%' . $searchTerm . '%');
            });
        }

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('name', function(Category $category) {
                return $category->name;
            })
            ->addColumn('short_code', function(Category $category) {
                return $category->short_code;
            })
            ->addColumn('description', function(Category $category) {
                return $category->description;
            })
            ->addColumn('action', function (Category $category) {
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-light px-4 py-2" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="fw-semibold"><i class="ti ti-chevron-down fa-lg"></i></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item edit-category" data-id="' . $category->id . '"><i class="fa fa-edit"></i> Edit</a></li>
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
            'name' => $request->name,
            'branch_id' => Auth::user()?->branch_id,
            'short_code' => $request->short_code,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'status' => 1,
            'created_by' => Auth::user()?->id
        ];

        $insert = Category::create($data);

        if ($insert) {
            $message = 'Category created successfully';
            $error = false;
        } else {
            $message = 'Error to create category';
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
        $category = Category::findOrFail($id);

        return response()->json([
            'id' => $category->id,
            'name' => $category->name,
            'branch_id' => $category->branch_id,
            'short_code' => $category->short_code,
            'parent_id' => $category->parent_id,
            'description' => $category->description,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $data = [
            'name' => $request->name,
            'short_code' => $request->short_code,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
        ];

        // Save User
        $update = $category->update($data);

        if ($update) {
            $message = 'Category updated successfully';
            $error = false;
        } else {
            $message = 'Error to update category';
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
