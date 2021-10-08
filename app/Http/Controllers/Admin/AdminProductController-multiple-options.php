<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric|gt:0"
        ]);
        $creationData = $request->only(["name","description","price"]);
        $creationData["image"] = "game.png";
        Product::create($creationData);

        return back();
    }

    /*public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric|gt:0"
        ]);

        $creationData = $request->only(["name","description","price"]);
        $creationData["image"] = "game.png";

        $newProduct = new Product();
        $newProduct->setAttributes($creationData);
        $newProduct->save();

        return back();
    }*/

    /*public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric|gt:0"
        ]);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage("game.png");
        $newProduct->save();

        return back();
    }*/

   /* public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric|gt:0"
        ]);
        $creationData = $request->only(["name","description","price"]);
        $creationData["image"] = "game.png";
        Product::create($creationData);

        return back();
    }*/
}

/*public function delete($id)
    {
    }*/
