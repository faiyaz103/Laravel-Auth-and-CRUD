<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    //
    public function editordashboard(){
        $items= Items::all();
        return view('editor.items.index', compact('items'));
    }
}
