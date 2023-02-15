<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function homePage(){
        return view ('page.home', [
            'title' => 'home'
        ]);
    }
    public function photosPage(){
        return view ('page.photos', [
            'title' => 'photos'
        ]);
    }
    public function productsPage(){
        $data = Product::all();
        return view ('page.products', [
            'title' => 'products',
            'data' => $data
        ]);
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function detailsPage(Product $products){
        return view ('page.details', [
            'title' => 'product-details',
            'data'=> $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFeedback(Request $request){

        Feedback::create(
            [   
                'email'=> $request->email,
                'message'=> $request->message,
            ]
            );
            return redirect('/')->with('status', 'Terima Kasih atas feedbacknya');
    }



}