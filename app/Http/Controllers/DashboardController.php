<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardController extends Controller
{
    public function index(){
        if (Auth::check()) {
            // if user is logged in.
            return view ('admin.main', [
                'title' => 'Dashboard Main'
            ]);
        }else{
            return redirect('/login');
        }
    }
    public function addProduct(){
        if (Auth::check()) {
            return view ('admin.addProduct', [
                'title' => 'Add Product'
            ]);
            // if user is logged in.
        }else{
            return redirect('/login');
        }
    }
    public function showProduct(){
        if (Auth::check()) {
            // if user is logged in.
            $data = Product::all();
            return view ('admin.product', [
                'title' => 'Products',
                'data'=>$data
            ]);
        }else{
            return redirect('/login');
        }
    }

    public function feedbackPage(){
        $data = Feedback::orderByDesc('id')->get();
        return view ('admin.feedback', [
            'title' => 'feedback',
            'data' => $data
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editProduct(Product $products){
        if (Auth::check()) {
            // if user is logged in.
            return view ('admin.editProduct', [
                'title' => 'editProduct',
                'data'=> $products
            ]);
        }else{
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function updateData(Request $request, Product $products)
    {
        
        if($request->file('image')){
            $image = explode('.', $request->file('image')->getClientOriginalName())[0];
            $image = $image . '-' . time() . '.' . $request->file('image')->extension();
            $request->file('image')->storeAs('public/images/products/', $image);
            Product::where('id', $products->id)->update(
                [   
                    'name'=> $request->name,
                    'slug'=> $request->slug,
                    'bahan_tas'=> $request->bahan_tas,
                    'description'=> $request->description,
                    'qty'=> $request->qty,
                    'image'=> $image,
                    'price'=> $request->price
                ]
                );
                $request->session()->flash('updateData', 'Product berhasil diubah');
    
                return redirect('/dashboardadminganteng/products');
        }else {
            Product::where('id', $products->id)->update(
                [   
                    'name'=> $request->name,
                    'slug'=> $request->slug,
                    'bahan_tas'=> $request->bahan_tas,
                    'description'=> $request->description,
                    'qty'=> $request->qty,
                    'price'=> $request->price
                ]
                );
                $request->session()->flash('updateData', 'Product berhasil diubah');
    
                return redirect('/dashboardadminganteng/products');
        }

    }

    public function createSlug(Request $request){
        $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // image
        $image = explode('.', $request->file('image')->getClientOriginalName())[0];
        $image = $image . '-' . time() . '.' . $request->file('image')->extension();
        $request->file('image')->storeAs('public/images/products/', $image);

        Product::create(
            [   
                'name'=> $request->name,
                'slug'=> $request->slug,
                'bahan_tas'=> $request->bahan_tas,
                'description'=> $request->description,
                'qty'=> $request->qty,
                'image'=> $image,
                'price'=> $request->price
            ]
            );
            $request->session()->flash('successData', 'Product berhasil ditambahkan');

            return redirect('/dashboardadminganteng/products');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::where('id', $product->id)->delete();

        return redirect('/dashboardadminganteng/products')->with('status', 'Data berhasi dihapus');
    }
}