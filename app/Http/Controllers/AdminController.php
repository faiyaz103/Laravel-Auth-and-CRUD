<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;

class AdminController extends Controller
{
    //
    
    public function admindashboard(){
        $items=Items::all();
        return view('admin.items.index', compact('items'));
    }
}
