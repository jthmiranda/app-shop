<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(10);
        return view('admin.categories.index')->with(compact('categories'));
    }

    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $this->validate($request, Category::$rules, Category::$messages);
        Category::create($request->all()); // asignacion masiva
        return redirect('/admin/categories');
    }

    public function edit(Category $category) {
        //return "Mostrar aqui el form de edicion para el producto con el id $id";
        //$category = Category::find($id);
        //return "el producto viene asi : $product";
        return view('admin.categories.edit')->with(compact('category'));
    }

    public function update(Request $request, Category $category) {
        $this->validate($request, Category::$rules, Category::$messages);
        $category->update($request->all());
        return redirect('/admin/categories');
    }

    public function destroy(Category $category) {
        $category->delete();
        return back();
    }
}
