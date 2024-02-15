<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Order;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PesanController extends Controller
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
            return view('pages.user.pesan.list',compact('collection'));
        }
        return view('pages.user.pesan.main');
    }

    
    public function create()
    {
        $cars = Cars::get();
        return view('pages.user.pesan.input',['cars'=>$cars,'pesan'=>new Order]);
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

    
    public function show(Order $pesan)
    {
        //
    }

    
    public function edit(Order $pesan)
    {
        $cars = Cars::get();
        return view('pages.user.pesan.input', compact('cars','pesan'));
    }

    
    public function update(Request $request, Order $rental)
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
              
        $rental->id_user = Auth::user()->id;
        $rental->id_car = $request->id_car;
        $rental->status = 'Sedang dipesan';
        $rental->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil mengubah pesanan mobil',
        ]);
    }

    
    public function destroy(Order $pesan)
    {
        $pesan->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Pesanan anda dibatalkan',
        ]);
    }
}