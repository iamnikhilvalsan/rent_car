<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use App\Models\CustomerModel;
use App\Models\BookingModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Hash;

class WebController extends Controller
{
    public function index()
    {
        $cars = Cars::select('cars.*','brands.brands','car_types.car_types')->where('cars_status','0')->join('brands', 'brands.brands_id', '=', 'cars.brands_id')->join('car_types', 'car_types.car_types_id', '=', 'cars.car_types_id')->limit('12')->orderByRaw("RAND()")->get();

        return view('website.home',compact('cars'));
    }

    public function view_cars()
    {
        $cars = Cars::select('cars.*','brands.brands','car_types.car_types')->where('cars_status','0')->join('brands', 'brands.brands_id', '=', 'cars.brands_id')->join('car_types', 'car_types.car_types_id', '=', 'cars.car_types_id')->limit('1000')->orderByRaw("RAND()")->get();

        return view('website.listing',compact('cars'));
    }

    public function view_car_details(Request $request,$cars_id)
    {
        $request->session()->put('DetailURL', $cars_id);

        $cars = Cars::select('cars.*','brands.brands','car_types.car_types')->where('cars_status','0')->where('cars_id', $cars_id)->join('brands', 'brands.brands_id', '=', 'cars.brands_id')->join('car_types', 'car_types.car_types_id', '=', 'cars.car_types_id')->first();

        $relatedcars = Cars::select('cars.*','brands.brands','car_types.car_types')->where('cars_status','0')->where('cars_id', '!=', $cars_id)->join('brands', 'brands.brands_id', '=', 'cars.brands_id')->join('car_types', 'car_types.car_types_id', '=', 'cars.car_types_id')->limit('3')->orderByRaw("RAND()")->get();

        return view('website.details',compact('cars','relatedcars'));
    }

    public function customer_login()
    {
        return view('website.customer_login');
    }

    public function customer_register()
    {
        return view('website.customer_register');
    }

    public function my_profile(Request $request)
    {
        $customers_id = $request->session()->get('customers_id');
        $DT = CustomerModel::select('*')->where('customers_id', $customers_id)->first();
        return view('website.my_profile',compact('DT'));
    }

    public function update_profile(Request $request)
    {
        $customers_id = $request->session()->get('customers_id');
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        else
        {
            
            CustomerModel::where('customers_id',$customers_id)->update([
                'name' => $request->name,
                // 'email' => $request->email,
                'mobile' => $request->mobile,
                'gender' => $request->gender

            ]);
        }

        return redirect()->route('my-profile')->with('success','Profile updated successfully.');
    }

    public function my_bookings(Request $request)
    {
        $customers_id = $request->session()->get('customers_id');
        
        $bookings = BookingModel::select('bookings.*','cars.title','cars.number','cars.price_per_day')->where('bookings.bookings_status', '0')->where('bookings.customers_id', $customers_id)->join('cars', 'cars.cars_id', '=', 'bookings.cars_id')->orderBy('bookings_id', 'desc') ->get();

        return view('website.my_bookings',compact('bookings'));
    }

    public function book_car(Request $request)
    {
        $customers_id = $request->session()->get('customers_id');
        
        $validator = Validator::make($request->all(), [
            'pickup_date' => 'required|date|after:now',
            'return_date' => 'required|date|after:pickup_date',
            'message' => 'required',
            'cars_id' => 'required',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        else
        {
            $Booking    =   new BookingModel();

            $Booking->bookings_status = '0';
            $Booking->status = '0';
            $Booking->booking_date = date('Y-m-d');
            $Booking->pickup_date = $request->pickup_date;
            $Booking->return_date = $request->return_date;
            $Booking->message = $request->message;
            $Booking->cars_id = $request->cars_id;
            $Booking->customers_id = $customers_id;

            $Booking->save();
        }

        return redirect()->route('my-bookings')->with('success','Car booking completed successfully.');
    }

    public function customer_register_submit(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        else
        {
            $Customer    =   new CustomerModel();

            $Customer->customers_status = '0';
            $Customer->gender = '';
            $Customer->date = date('Y-m-d');
            $Customer->name = $request->name;
            $Customer->mobile = $request->phone;
            $Customer->email = $request->email;
            $Customer->password = Hash::make($request->password);

            $Customer->save();

            $customers_id = $Customer->customers_id;

            $request->session()->put('customers_id',$customers_id);

            if($request->session()->get('DetailURL') && $request->session()->get('DetailURL')!='') 
            {
                $cars_id = $request->session()->get('DetailURL');
                $request->session()->put('DetailURL', '');
                return redirect()->route('view-car-details',$cars_id)->with('success','User registration completed successfully. Please complete your booking.');
            }
            else
            {
                return redirect()->route('my-bookings')->with('success','User registration completed successfully.');
            }
        }
    }

    public function customer_login_submit(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        else
        {
            $Customer = CustomerModel::where('customers_status',0)->where('email',$request->email)->first();
            if($Customer)
            {
                if(HAsh::check($request->password,$Customer->password))
                {
                    $customers_id = $Customer->customers_id;
                    $request->session()->put('customers_id',$customers_id);

                    if($request->session()->get('DetailURL') && $request->session()->get('DetailURL')!='') 
                    {
                        $cars_id = $request->session()->get('DetailURL');
                        $request->session()->put('DetailURL', '');
                        return redirect()->route('view-car-details',$cars_id)->with('success','Loggedin successfully. Please complete your booking.');
                    }
                    else
                    {
                        return redirect()->route('my-bookings');
                    }
                }
                else
                {
                    return back()->with('error','Invalid username or password.');
                }
            }
            else
            {
                return back()->with('error','Invalid username or password.');
            }
        }
    }

    public function customer_logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect()->route('customer-login');
    }




}





















