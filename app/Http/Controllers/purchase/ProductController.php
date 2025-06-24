<?php

namespace App\Http\Controllers\purchase;

use Exception;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Warranty;
use Illuminate\Http\Request;
use App\Services\UtilityServices;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $utilityService;

    public function __construct(UtilityServices $utilityService) {
        //parent
        parent::__construct();

        $this->utilityService = $utilityService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch_id = Auth::user()?->branch_id;
        $units = Unit::where('status', 1)->where('branch_id', Auth::user()?->branch_id)->get();
        $brands = Brand::where('status', 1)->where('branch_id', Auth::user()?->branch_id)->get();
        $categories = Category::where('status', 1)->where('branch_id', Auth::user()?->branch_id)->get();
        $codes = $this->utilityService->getBarcode();
        $warranties = Warranty::forDropdown($branch_id);

        return view('admin.pages.purchases.product.index', compact('units', 'brands', 'categories', 'warranties','codes'));
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
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255|unique:products,name',
            'sku' => 'nullable|string|max:500',
            'barcode_id' => 'nullable|string',
            'unit_id' => 'nullable|integer',
            'brand_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'alert_quantity' => 'nullable|numeric',
            're_oreder_level' => 'nullable|numeric',
            'purchase_rate' => 'nullable|numeric',
            'selling_price' => 'nullable|numeric',
            'wholesale_rate' => 'nullable|numeric',
            'vat' => 'nullable|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $input = [
                'product_name' => $request->product_name,
                'branch_id' => Auth::user()->getBranchId(),
                'description' => $request->short_description,
                'status' => 1,
                'created_by' => Auth::user()?->id,
                'sku' => $request->sku,
                'barcode_id' => $request->barcode_id,
                'unit_id' => $request->unit_id,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'alert_quantity' => $request->alert_quantity,
                're_oreder_level' => $request->re_oreder_level,
                'purchase_rate' => $request->purchase_rate,
                'selling_price' => $request->selling_price,
                'wholesale_rate' => $request->wholesale_rate,
                'is_imei_number' => $request->is_imei_number,
                'vat' => $request->vat,
                'tax' => $request->tax,
                'description' => $request->description,
            ];

            if ($request->hasFile('product_image')) {
                $shopImage = $request->file('product_image');
                $upsFileName = pathinfo($shopImage->getClientOriginalName(), PATHINFO_FILENAME);
                $fullFileName = $upsFileName . '-' . time() . '.' . $shopImage->extension();
                $shopImage->move(public_path('images/products'), $fullFileName);
                $input['product_image'] = $fullFileName;
            }

            return response()->json(['error' => false, 'msg' => 'Product created successfully.', 'product' => $input]);

        } catch (Exception $e) {
            Log::error('Product Store Error: ' . $e->getMessage());

            return response()->json(['error' => true, 'msg' => 'An unexpected error occurred. Please try again later.'], 500);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
