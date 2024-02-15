<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RentalCarsController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request,$next) {
            $role = Auth::user()->role;
            if($role != 'rental'){
                abort(403);
            }
            return $next($request);
        });
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Rental::where('name','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.rental.cars.list',compact('collection'));
        }
        return view('pages.rental.cars.main');
    }

    
    public function create()
    {
        return view('pages.rental.cars.input',['rental'=>new Rental]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('image')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('image'),
                ]);
            }elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            }elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }elseif ($errors->has('status')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status'),
                ]);
            }
        }

        $file = request()->file('image')->store('product');
        $cars = new Rental;
        $cars->id_user = Auth::user()->id;
        $cars->name = $request->name;
        $cars->image = $file;
        $cars->price = $request->price;
        $cars->description = $request->description;
        $cars->status = $request->status;
        $cars->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menambahkan Rental Mobil',
        ]);
        
    }

    
    public function show(Rental $rental)
    {
        //
    }

    
    public function edit(Rental $rental)
    {
        return view('pages.rental.cars.input', compact('rental'));
    }

    
    public function update(Request $request, Rental $rental)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'image' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('image')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('image'),
                ]);
            }elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            }elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }elseif ($errors->has('status')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('status'),
                ]);
            }
        }
        if($request->hasfile('image')){
            
            Storage::delete($rental->image);
            
            $file = request()->file('image')->store('product');
            $rental->id_user = Auth::user()->id;
            $rental->name = $request->name;
            $rental->image = $file;
            $rental->price = $request->price;
            $rental->description = $request->description;
            $rental->status = $request->status;
            $rental->update();
        }else{        
            $rental->id_user = Auth::user()->id;
            $rental->name = $request->name;
            $rental->price = $request->price;
            $rental->description = $request->description;
            $rental->status = $request->status;
            $rental->update();
        }

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil mengubah Rental Mobil',
        ]);
    }

    
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'rental '. $rental->name . ' terhapus',
        ]);
    }
}