<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\CarTypes;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CarController extends Controller
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

    public function add_vehicles()
    {
        $brands = Brands::orderBy('brands', 'asc')->get();
        $car_types = CarTypes::orderBy('car_types', 'asc')->get();

        $cars = array();
        return view('admin.add_vehicles',compact('brands','car_types','cars'));
    }

    public function add_vehicles_save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brands_id' => 'required',
            'car_types_id' => 'required',
            'seat_type' => 'required',
            'title' => 'required',
            'model' => 'required',
            'number' => 'required',
            'price_per_day' => 'required',
            'mileage_per_litter' => 'required',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails())
        {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        else
        {
            if($request->cars_id!='' || $request->cars_id!=null)
            {
                $Cars    =   Cars::where('cars_id',$request->cars_id)->first();
            }
            else
            {
                $Cars    =   new Cars();
            }

            $Cars->cars_status = '0';
            $Cars->brands_id = $request->brands_id;
            $Cars->car_types_id = $request->car_types_id;
            $Cars->seat_type = $request->seat_type;
            $Cars->title = $request->title;
            $Cars->model = $request->model;
            $Cars->number = $request->number;
            $Cars->price_per_day = $request->price_per_day;
            $Cars->mileage_per_litter = $request->mileage_per_litter;
            $Cars->fuel_type = $request->fuel_type;
            $Cars->transmission = $request->transmission;
            $Cars->description = $request->description;


            if($files = $request->file('image'))
            {
                $path = $files->store('cars', 'public_uploads');
                $filename = str_replace('cars/', '', $path);

                /*$img500 = Image::make($files);
                $img500->resize(500, 500);
                $img500->save('uploads/cars/'.$filename);*/

                $Cars->image = $filename;
            }

            if($files = $request->file('image_2'))
            {
                $path = $files->store('cars', 'public_uploads');
                $filename = str_replace('cars/', '', $path);

                /*$img500 = Image::make($files);
                $img500->resize(500, 500);
                $img500->save('uploads/cars/'.$filename);*/

                $Cars->image_2 = $filename;
            }
            
            $Cars->save();

            if($request->cars_id!='' || $request->cars_id!=null)
            {
                return redirect()->route('view-vehicles')->with('success','Vehicle detais updated successfully.');
            }
            else
            {
                return redirect()->route('view-vehicles')->with('success','New vehicle added successfully.');
            }
        }
    }

    public function view_vehicles()
    {
        $brands = Brands::orderBy('brands', 'asc')->get();
        $car_types = CarTypes::orderBy('car_types', 'asc')->get();


        $cars = Cars::select('cars.*','brands.brands','car_types.car_types')->where('cars_status','0')->join('brands', 'brands.brands_id', '=', 'cars.brands_id')->join('car_types', 'car_types.car_types_id', '=', 'cars.car_types_id')->get();

        return view('admin.view_vehicles',compact('brands','car_types','cars'));
    }

    public function edit_vehicles($cars_id)
    {
        $brands = Brands::orderBy('brands', 'asc')->get();
        $car_types = CarTypes::orderBy('car_types', 'asc')->get();

        $cars = Cars::where('cars_id', $cars_id)->first();
        return view('admin.add_vehicles',compact('brands','car_types','cars'));
    }

    public function vehicles_delete(Request $request)
    {
        $validator = Validator::make($request->all(),['delete_id' => 'required']);

        if ($validator->fails())
        {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }
        else
        {
            Cars::where('cars_id',$request->delete_id)->update(['cars_status' => '1']);
        }
        return redirect()->route('view-vehicles')->with('success','Vehicle details deleted successfully.');
    }

}