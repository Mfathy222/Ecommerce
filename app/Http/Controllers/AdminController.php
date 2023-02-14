<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function product()
    {

        return view('admin.product');
    }

    public function store(Request $request)
    {
        // $data = new product;
        //validation
        $data = $request
            ->validate(
                [
                    "title" => 'required|string|max:100',
                    "description" => 'required|string',
                    "price" => 'required',
                    "quantity" => 'required',
                    "image" => 'image|mimes:png,jpg,jpeg,Gif',
                ]
            );
        // uplode image and store image in dd
        $data['image'] = Storage::putFile("productimage", $data["image"]);

        //store
        product::create(
            $data
        );

         session()->flash("success", "date insertd successfuly");

        //route

        return redirect(url('product'));
    }

    public function showproduct()
    {
        $products = product::all();
        return view('Admin.showproduct', compact('products'));

    }
public function deleteproduct($id){
    $data = product::findorfail($id);
    if($data){

        Storage::delete($data->image);
    }

    $data->delete();
    session()->flash("success", "data deleted successfuly");
    return redirect(url('showproduct'));

}
public function editproduct($id){
$products=product::findorfail($id);
return view('/admin/editproduct',compact('products'));

}


public function updateproduct(Request $request,$id){
 //validtion on new data
 $data = $request->validate(
    [
                    "title" => 'required|string|max:100',
                    "description" => 'required|string',
                    "price" => 'required',
                    "quantity" => 'required',
                    "image" => 'image|mimes:png,jpg,jpeg,Gif',
    ]
);

//check
$products = product::findorfail($id);

if ($request->has('image')) {
    Storage::delete($products->image);
    $data['image'] = Storage::putFile("productimage", $data["image"]);
}
//update
$products->update($data);
//session
session()->flash("success", "data insertd successfuly");
// //return show
//if need to go to editproduct use return view
// return view("admin.editproduct")->with("products",$products);
//if need to go to showproduct use return redirect
return redirect(url('showproduct'));
}

}
