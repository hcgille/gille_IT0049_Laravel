<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        // TFA6 replaces TFA5's sample arrays with real Eloquent data.
        return view('pages.home', [
            'customerCount' => Customer::query()->count(),
            'userCount' => User::query()->count(),
            'recentCustomers' => Customer::query()->latest()->take(4)->get(),
            'recentUsers' => User::query()->latest()->take(4)->get(),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }
}
