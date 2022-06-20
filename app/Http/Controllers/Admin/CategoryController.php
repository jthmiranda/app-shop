<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use File;

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
        $category = Category::create($request->only('name', 'description')); // asignacion selectiva

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            // update category
            if ($moved) {
                $category->image = $fileName;
                $category->save(); // UPDATE;
            }
        }
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
        $category->update($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            // update category
            if ($moved) {
                $previousPath = $path . '/' . $category->image;

                $category->image = $fileName;
                $saved = $category->save(); // UPDATE;

                if ($saved)
                    File::delete($previousPath);
            }
        }
        return redirect('/admin/categories');
    }

    public function destroy(Category $category) {
        $category->delete();
        return back();
    }
}
