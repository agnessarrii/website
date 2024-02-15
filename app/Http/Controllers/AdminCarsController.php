<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCarsController extends Controller
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
            $collection = Cars::where('name','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.admin.cars.list',compact('collection'));
        }
        return view('pages.admin.cars.main');
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
        $admin = Cars::find($id);
        $admin->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>' '.$admin->name.' berhasil dihapus'
        ]);
    }
}