<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'category_id','=', 'categories.id')
        ->select('products.*', 'categories.category_name')
        ->get();
        return view('products.index',compact('products'));


    }
    public function productsJson(){
        $products = DB::table('products')
        ->join('categories', 'category_id','=', 'categories.id')
        ->select('products.*', 'categories.category_name')
        ->get();

        return $products;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();

        return view('products.create',compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //validate product_name and category_id and store product
    public function store(Request $request)
    {
        $this->validate(request(),[
            'product_name'=>'required',
            'category_id'=>'required'
        ]);
            Product::create(request(['product_name','category_id']));
            return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
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
        Product::where('id', $id)
            ->update(request('product_name'));
            return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Product::where('id', $id)
           ->delete();
        return back();
    }
    public function groupByCategory(){
        $products = DB::table('products')
        ->select(DB::raw("COUNT(*) as category, category_id"))  
	    ->groupBy(DB::raw("(category_id)"))
        ->get();

        foreach ($products as $product) {
            $cats = Category::select("category_name")->where('id', $product->category_id)->get();
            foreach ($cats as $cat) {
                $product->category_name = $cat->category_name;
            }
        }
        return view('products.reports', compact('products'));
    }
}
