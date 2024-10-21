<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $pending_order=Order::where('status','pending')->latest()->get();
        return view('admin.pendingorder',compact('pending_order'));
    }

    public function completedorder()
    {
        return view('admin.completedorder');
    }

    public function cancelorder()
    {
        return view('admin.cancelorder');
    }
}
