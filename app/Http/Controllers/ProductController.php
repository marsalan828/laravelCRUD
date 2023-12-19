<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request){
        $items=new Products;
        $items->name=$request->name;
        $items->price=$request->price;
        $items->quantity=$request->quantity;
        $items->save();

        return response()->json(['message'=>'Product created successfully'],200);

    }
    public function update(Request $request){
        $items=Products::findOrFail($request->id);

        $items->name=$request->name;
        $items->price=$request->price;
        $items->quantity=$request->quantity;
        $items->update(); 
        
        return response()->json(['message'=>'Product updated successfully']);       
    }
    public function delete(Request $request){
        $items=Products::findOrFail($request->id);
        $items->delete();
        return response()->json(['message'=>'product deleted successfully'],200);        
    }
    public function show(){
        $items=Products::all();
        return response()->json($items);
    }
}
