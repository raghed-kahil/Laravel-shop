<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CostumerOrders extends Controller
{
    public function __invoke()
    {
        return view('customer-orders')
            ->with('orders', Order::query()
                ->select(['id', 'updated_at', 'total', 'status'])
                ->where('user_id', '=', Auth::id())->getModels());
        
    }
}
