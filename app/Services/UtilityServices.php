<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Models\Distributor;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UtilityServices
{
    public function getBarcode()
    {
        $barcodes = collect([
            ['type' => 'C128', 'name' => 'Code 128 (C128)'],
            ['type' => 'C39', 'name' => 'Code 39 (C39)'],
            ['type' => 'EAN13', 'name' => 'EAN-13'],
            ['type' => 'EAN8', 'name' => 'EAN-8'],
            ['type' => 'UPCA', 'name' => 'UPC-A'],
            ['type' => 'UPCE', 'name' => 'UPC-E'],
        ])->map(function ($item) {
            return (object) $item;
        });

        return $barcodes;
    }

}