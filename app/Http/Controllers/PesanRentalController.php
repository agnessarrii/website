<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Order;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PesanRentalController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request,$next) {
            $role = Auth::user()->role;
            if($role != 'user'){
                abort(403);
            }
            return $next($request);
        });
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Order::paginate(10);
            return view('pages.rental.pesan.list',compact('collection'));
        }
        return view('pages.rental.pesan.main');
    }

    
    public function create()
    {
        $cars = Cars::get();
        return view('pages.rental.pesan.input',['cars'=>$cars,'pesanrental'=>new Order]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_car' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('id_car')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_car'),
                ]);
            }
        }

        $cars = new Order;
        $cars->id_user = Auth::user()->id;
        $cars->id_car = $request->id_car;
        $cars->status = 'Sedang dipesan';
        $cars->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menambahkan pesan',
        ]);
        
    }

    
    public function show(Order $pesanrental)
    {
        //
    }

    
    public function edit(Order $pesanrental)
    {
        $cars = Cars::get();
        return view('pages.rental.pesan.input', compact('cars','pesanrental'));
    }

    
    public function update(Request $request, Order $pesanrental)
    {
        $validator = Validator::make($request->all(), [
            'id_car' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('id_car')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_car'),
                ]);
            }
        }
              
        $pesanrental->id_user = Auth::user()->id;
        $pesanrental->id_car = $request->id_car;
        $pesanrental->status = 'Sedang dipesan';
        $pesanrental->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil mengubah pesanan mobil',
        ]);
    }

    
    public function destroy(Order $pesanrental)
    {
        $pesanrental->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan anda dibatalkan',
        ]);
    }
}