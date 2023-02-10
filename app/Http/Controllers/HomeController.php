<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\Cars;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $CarsCount = Cars::where('cars_status', '0')->get()->count();
        $CustomersCount = CustomerModel::where('customers_status', '0')->get()->count();
        $PBookingsCount = BookingModel::where('bookings_status', '0')->where('status', '0')->get()->count();
        $CBookingsCount = BookingModel::where('bookings_status', '0')->where('status', '1')->get()->count();

        return view('admin.dashboard',compact('CarsCount','CustomersCount','PBookingsCount','CBookingsCount'));
    }
}
