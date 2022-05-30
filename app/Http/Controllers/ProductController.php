<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        //validar
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'description.required' => 'La descripcion corta es un campo obligatorio',
            'description.min' => 'La descripcion corta solo admite hasta 200 caracteres',
            'price.required' => 'Es obligatorio definir un precio para el producto',
            'price.min' => 'No se admiten valores negativos'
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);

        // funcion para persistir datos en mysql
        //dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
    }

    public function edit($id) {
        //return "Mostrar aqui el form de edicion para el producto con el id $id";
        $product = Product::find($id);
        //return "el producto viene asi : $product";
        return view('admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id) {
        //validar
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'description.required' => 'La descripcion corta es un campo obligatorio',
            'description.min' => 'La descripcion corta solo admite hasta 200 caracteres',
            'price.required' => 'Es obligatorio definir un precio para el producto',
            'price.min' => 'No se admiten valores negativos'
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $this->validate($request, $rules, $messages);

        // funcion para persistir datos en mysql
        //dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();

        return redirect('/admin/products');
    }

    public function destroy($id) {
        ProductImage::where('product_id', $id)->delete();
        $product = Product::find($id);
        $product->delete();

        return back();
    }
}
