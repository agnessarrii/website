<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrdersController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request,$next) {
            $role = Auth::user()->role;
            if($role != 'admin'){
                abort(403);
            }
            return $next($request);
        });
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Order::
            where('name','like','%'.$keywords.'%')->
            paginate(10);
            return view('pages.admin.orders.list',compact('collection'));
        }
        return view('pages.admin.orders.main');
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $admin = Order::find($id);
        $admin->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>' '.$admin->name.' berhasil dihapus'
        ]);
    }
}