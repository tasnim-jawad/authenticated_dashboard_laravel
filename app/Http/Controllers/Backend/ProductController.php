<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('backend.products',compact('products'));
    }

    public function addProductForm(){
        return view('backend.addProduct');
    }

    public function addProduct(Request $request){
        $validated = $request->validate([
            'pro_name' => 'required',
            'pro_description' => 'required',
            'pro_price' => 'required',
            'pro_image' => 'required',
            'pro_status' => 'required',
        ]);

        $imageName= "";
        $image = $request->file('pro_image');
        if(isset($image)){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products',$imageName);
        };

        $products =new Product();
        $products->product_name = $request->pro_name;
        $products->product_description = $request->pro_description;
        $products->product_price = $request->pro_price;
        $products->product_image = $imageName;
        $products->product_status = $request->pro_status;
        $products->save();
        return redirect()->route('products.index');
    }

    public function deleteProduct($id){
        $product_individual =Product::find($id);
        $product_individual->delete();
        return redirect()->Route('products.index');
    }

    public function editProduct($id){
        $product_individual =Product::find($id);
        return view('backend.editProduct',compact('product_individual'));
    }
    public function updateProduct(Request $request, $id){
        $product_individual = Product::find($id);
        $request->validate([
            'pro_name' => 'required',
            'pro_description' => 'required',
            'pro_price' => 'required',
            'pro_image' => 'mimes:jpg,jpeg,png',
            'pro_status' => 'required',
        ]);

        $image = $request->file('pro_image');
        if(isset($image)){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $oldImage = 'images/products/'.$product_individual->product_image;
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $image->move('images/products',$imageName);
        }else{
            $imageName =$product_individual->product_image;
        }

        $product_individual->product_name = $request->pro_name;
        $product_individual->product_description = $request->pro_description;
        $product_individual->product_price = $request->pro_price;
        $product_individual->product_image = $imageName;
        $product_individual->product_status = $request->pro_status;
        $product_individual->save();
        return redirect()->route('products.index');


    }
}
