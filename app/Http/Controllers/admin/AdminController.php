<?php


namespace App\Http\Controllers\admin;
use Entrust;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{

public function index(){
    return view('admin.pages.home');
}

 
 
    public function create()
    {
         
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
         
    }
 
    public function destroy($id)
    {
        //
    }
}
