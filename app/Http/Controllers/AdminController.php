<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
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
    
    public function index()
    {
        return view('pages.admin.dashboard.main');
    }

    public function see(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = User::where('role', '!=', 'admin')
            // ->orWhere('name','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.admin.user.list',compact('collection'));
        }
        return view('pages.admin.user.main');
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

    
    public function edit(User $admin)
    {
        return view('pages.admin.user.input', compact('admin'));
    }

    
    public function update(Request $request,User $admin)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('role')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('role'),
                ]);
            }
        }
        $admin->role = $request->role;
        
        $admin->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Data '. $admin->name . ' diperbaharui',
        ]);
    }

    
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();
        return response()->json([
            'alert'=>'success',
            'message'=>' '.$admin->name.' berhasil dihapus'
        ]);
    }
}