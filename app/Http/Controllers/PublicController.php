<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Product_Review;
use Auth;

class PublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productInstance = new Product();
        $orderby=$request->get('order_by');
        $products=$productInstance->orderProducts($orderby);
        // $products=$productInstance->orderProducts($request->get('order_by'));

        //apabila request ajax maka return json
        if($request->ajax()){
            return response()->json($products, 200);
        }

        // apabila request HTML maka akan return HTML
        return view('public', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'rating' => 'required',
            'description' => 'required|max:255',
        ]);

        $review = new Product_Review();
        $review->user_id = $request->post('user_id');
        $review->product_id = $request->post('product_id');
        $review->description = $request->post('description');
        $review->rating = $request->post('rating');

        $review->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $products = Product::find($id);
        $reviews = Product_Review::where('product_id',$products->id)->get();

        return view('show',compact('products','reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
