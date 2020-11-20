<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('menuscript.category.list', compact('categories'));
    }

    public function create()
    {
        return view('menuscript.category.create');
    }

    public function store(Request $r)
    {
        $this->validate($r, [
            'name' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->name = $r->name;
        $category->status = 1;
        $category->save();
        Alert::toast('category created successfully', 'success');
        return back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('menuscript.category.edit', compact('category'));
    }

    public function update(Request $r, $id)
    {
        $this->validate($r, [
            'name' => "required|unique:categories,name,$r->id",
            'status' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $r->name;
        $category->status = $r->status;
        $category->save();
        Alert::toast('category updated successfully', 'success');
        return back();
    }

   
     public function delete(Request $request, $id){
        $category = Category::find($id);
        $category->delete();
        Alert::toast('category deleted successfully', 'success');
        return back();
    }
}