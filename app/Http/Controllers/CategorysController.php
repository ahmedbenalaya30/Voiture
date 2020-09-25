<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategorysController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('notConnected');
    }
    //
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categorys=Category::all();
        return view('categorys.index', compact('categorys'));
}
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $category = new Category([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        $category->save();
        return redirect('/category')->with('success', 'Category saved!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        return view('categorys.create');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::find($id);
        
        return view('categorys.edit', compact('category'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $category = Category::find($id);

        $category->name= $request->get('name');
        $category->description= $request->get('description');
        
        $category->save();
          return redirect('/category')->with('success', 'Category updated!');
}
/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Category deleted!');
    }
}
