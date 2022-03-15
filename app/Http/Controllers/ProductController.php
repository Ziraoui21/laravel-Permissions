<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("Product.index")->with("products",Product::latest()->get());
    }

    public function new()
    {
        return view("Product.create");
    }

    public function create(ProductRequest $request)
    {

        Product::create(
        [
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description
        ]);

        return redirect()->route("products.index");
    }

    public function show($id)
    {
        return view("Product.show")->with("product",Product::find(Crypt::decrypt($id)));
    }

    public function edit($id)
    {
        return view("Product.edit")->with("product",Product::find(Crypt::decrypt($id)));
    }

    public function update($id,ProductRequest $request)
    {
        Product::find(Crypt::decrypt($id))->update(
            [
                "name" => $request->name,
                "price" => $request->price,
                "description" => $request->description
            ]
        );

        return redirect()->route("products.show",$id);
    }

    public function delete($id)
    {
        Product::find(Crypt::decrypt($id))->delete();

        return redirect()->route("products.index");
    }
}
