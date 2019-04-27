<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warehouse;

class WarehouseController extends Controller
{
    public function viewWarehouse(Warehouse $warehouse)
    {
        return view('results.viewwarehouse',compact('warehouse'));
    }
}
