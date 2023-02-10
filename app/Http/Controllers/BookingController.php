<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\CustomerModel;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
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

    public function booking_requests()
    {

        $bookings = BookingModel::select('bookings.*','cars.title','cars.number','cars.price_per_day','customers.name','customers.mobile')->where('bookings.bookings_status', '0')->where('bookings.status', '0')->join('cars', 'cars.cars_id', '=', 'bookings.cars_id')->join('customers', 'customers.customers_id', '=', 'bookings.customers_id')->get();

        $MainStatus = '0';
        return view('admin.view_bookings',compact('bookings','MainStatus'));
    }

    public function booking_request_status(Request $request)
    {
        $validator = Validator::make($request->all(),['bookings_id' => 'required']);

        if ($validator->fails())
        {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        else
        {
            if($request && $request->confirm)
            {
                BookingModel::where('bookings_id',$request->bookings_id)->update(['status' => '1']);
                return redirect()->route('booking-requests')->with('success','Booking confirmed successfully.');
            }
            else if($request && $request->complete)
            {
                BookingModel::where('bookings_id',$request->bookings_id)->update(['status' => '3']);
                return redirect()->route('confirmed-bookings')->with('success','Booking process completed successfully.');
            }
            else
            {
                BookingModel::where('bookings_id',$request->bookings_id)->update(['status' => '2']);
                return redirect()->route('booking-requests')->with('success','Booking Rejected successfully.');
            }
        }
    }

    public function confirmed_bookings()
    {
        $bookings = BookingModel::select('bookings.*','cars.title','cars.number','cars.price_per_day','customers.name','customers.mobile')->where('bookings.bookings_status', '0')->where('bookings.status', '1')->join('cars', 'cars.cars_id', '=', 'bookings.cars_id')->join('customers', 'customers.customers_id', '=', 'bookings.customers_id')->get();

        $MainStatus = '1';
        return view('admin.view_bookings',compact('bookings','MainStatus'));
    }

    public function completed_bookings()
    {
        $bookings = BookingModel::select('bookings.*','cars.title','cars.number','cars.price_per_day','customers.name','customers.mobile')->where('bookings.bookings_status', '0')->where('bookings.status', '3')->join('cars', 'cars.cars_id', '=', 'bookings.cars_id')->join('customers', 'customers.customers_id', '=', 'bookings.customers_id')->get();

        $MainStatus = '3';
        return view('admin.view_bookings',compact('bookings','MainStatus'));
    }

    public function rejected_bookings()
    {
        $bookings = BookingModel::select('bookings.*','cars.title','cars.number','cars.price_per_day','customers.name','customers.mobile')->where('bookings.bookings_status', '0')->where('bookings.status', '2')->join('cars', 'cars.cars_id', '=', 'bookings.cars_id')->join('customers', 'customers.customers_id', '=', 'bookings.customers_id')->get();

        $MainStatus = '2';
        return view('admin.view_bookings',compact('bookings','MainStatus'));
    }
}
