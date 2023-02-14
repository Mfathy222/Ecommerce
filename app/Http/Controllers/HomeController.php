<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
public function redirect() {

$usertype=Auth::user()->usertype;


if($usertype == '1'){

return view('admin.home');

}else{
    $products=product::paginate(3);

return view('user.home',compact('products'));
}
}

public function index(){
    if(Auth::id()){

        return redirect('redirect');

    }else{

        $products=product::paginate(3);

        return view('user.home',compact('products'));
    }
}

public function search(Request $request){

$search=$request->search;
$products=product::where('title','like','%'.$search.'%')->get();
return view('user.home',compact('products'));

}


}
