<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Complexity\Complexity;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $items=Items::all();
        return view('pages.items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(Auth::user()->role !== 'admin'){
            return redirect('/items')->with('error', 'Unauthorized access!');
        }

        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized action!');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
        ]);

        Items::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect('/admin/dashboard')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Items $item)
    {
        //
        if (Auth::user()->role == 'admin') {
            
            return view('admin.items.edit', compact('item'));
        }
        else if(Auth::user()->role == 'editor'){
            return view('editor.items.edit', compact('item'));
        }

        
        return redirect('/')->with('error', 'Unauthorized access!');
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Items $item)
    {
        //
        if (Auth::user()->role !== 'admin' && Auth::user()->role !== 'editor') {
            return redirect('/')->with('error', 'Unauthorized action!');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
        ]);

        $item->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        if(Auth::user()->role == 'admin'){
            return redirect('/admin/dashboard')->with('success', 'Item updated successfully.');
        }
        else if(Auth::user()->role == 'editor'){
            return redirect('/editor/dashboard')->with('success', 'Item updated successfully.');
        }

        return redirect('/items')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Items $item)
    {
        //
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'Unauthorized action!');
        }

        $item->delete();
        return redirect('/admin/dashboard')->with('success', 'Item deleted successfully.');
    }
}
