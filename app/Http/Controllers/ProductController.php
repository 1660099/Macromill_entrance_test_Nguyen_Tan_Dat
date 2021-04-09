<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ' 1';
        if ($request->category_filter){
            $query = ' categories.id = '.$request->category_filter .' or categories.sub_id = '.$request->category_filter;
        }
        $producct = Product::with('category')
            ->join('categories', function ($join){
                $join->on('categories.id', '=', 'products.category_id')
                    ->orOn('categories.sub_id', '=', 'products.category_id');
            })
            ->whereRaw($query)
            ->orderByDesc('products.id')
            ->select('products.*')
            ->groupBy('products.id')
            ->paginate(20);
        $category = Category::all();
        return view('page.product.index', compact('producct', 'category', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all()->sortByDesc('id');
        return view('page.product.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|max:255',
            'short_description'     => 'nullable',
            'category_id'           => 'required|numeric',
            'subcategories_id'      => 'nullable|numeric',
        ]);

        $product                       = new Product();
        $product->name                 = $request->name;
        $product->short_description    = $request->short_description;
        $product->category_id          = $request->category_id;
        $product->subcategories_id     = $request->subcategories_id;
        $product->save();

        return redirect()->route('product');
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
