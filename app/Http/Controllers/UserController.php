<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(function ($request,$next) {
            $role = Auth::user()->role;
            if($role != 'user'){
                abort(403);
            }
            return $next($request);
        })->except('index','pdfDownload');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $keywords = $request->keywords;
            $collection = Cars::where('name','like','%'.$keywords.'%')
            ->paginate(10);
            return view('pages.user.dashboard.list',compact('collection'));
        }
        return view('pages.user.dashboard.main');
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
        $cars = Cars::find($id);
        return view('pages.user.dashboard.detail',compact('cars'));
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
        //
    }
}