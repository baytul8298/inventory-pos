<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.layout.dashboard');
    }
    
    public function branchAccess(Request $request)
    {
        $branchId = $request->input('branch_id');

        // Fetch branch details
        $branch = Branch::where('id', $branchId)->first();
        
        if (!$branch) {
            return response()->json(['error' => 'Invalid Branch'], 404);
        }

        // Store branch session data
        Session::put('BRANCH_ID', $branch->id);
        Session::put('BRANCH_NAME', $branch->branch_name);
        //Session::put('BRANCH_IMAGE', $branch->image);

        return response()->json(['success' => true, 'redirect' => route('dashboard')]);
    }
}