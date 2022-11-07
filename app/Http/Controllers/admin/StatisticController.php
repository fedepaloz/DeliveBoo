<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $user_restaurant = Restaurant::where('user_id', Auth::id())->first();

        $raw_month_sells = Order::where('restaurant_id', $user_restaurant->id)->select(
            DB::raw('month(created_at) as month'),
            DB::raw('sum(total) as total'),
        )
            ->where(DB::raw('date(created_at)'), '>=', "2022-01-01")
            ->groupBy('month')
            ->get()
            ->toArray();

        $month_sells = [];

        foreach ($raw_month_sells as $month) {
            $month_sells[] = $month['total'];
        }

        $year_sells = [];

        $monthly_sells = 0;

        foreach ($raw_month_sells as $month) {
            $monthly_sells += $month['total'];
            $year_sells[] = $monthly_sells;
        }

        return view('admin.statistics', compact('month_sells', 'year_sells'));
    }
}
