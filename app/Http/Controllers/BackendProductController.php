<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BackendProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $products = Product::all();
        // return view('backend.product.index', ['products' => $products]);
        $order = ['id', 'iduser', 'idcategory', 'name', 'use', 'price', 'date', 'state'];
        $products = new Product();
        $rows = 3;
        if($request->input('rows') != null && is_numeric($request->input('rows'))) {
            $rows = $request->input('rows');
        }
        $search = $request->input('search');
        if($search != null) {
            $products = $products->where('name', 'like', '%' . $search . '%')
                                        ->orWhere('iduser', 'like', '%' . $search . '%')
                                        ->orWhere('idcategory', 'like', '%' . $search . '%')
                                        ->orWhere('name', 'like', '%' . $search . '%')
                                        ->orWhere('price', 'like', '%' . $search . '%')
                                        ->orWhere('date', 'like', '%' . $search . '%')
                                        ->orWhere('state', 'like', '%' . $search . '%');
        }
        $orderby = $request->input('orderby');
        $sort = 'asc';
        if($orderby != null) {
            if(!isset($order[$orderby])) {
                $orderby = 0;
            }
            $orderbyField = $order[$orderby];
            if($request->input('sort') != null) {
                $sort = $request->input('sort');
                if(!($sort == 'asc' || $sort == 'desc')) {
                    $sort = 'asc';
                }
            }
            $products = $products->orderby($orderbyField, $sort);
        }
        $paginationParameters = ['search' => $search, 'orderby' => $orderby, 'sort' => $sort, 'rows' => $rows];
        $products = $products->orderBy('id', 'asc')->paginate($rows)->appends($paginationParameters);
        return view('backend.product.index', array_merge(['products' => $products], $paginationParameters));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $users = User::all();
        $categories = Category::all();
        return view('backend.product.create', ['products' => $products, 'users' => $users, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $product = new Product($request->all());
        if($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $path = $file->getRealPath();
            $photo = file_get_contents($path);
            $base64 = base64_encode($photo);
            $product->photo = $base64;
        }
        // dd($object);
        try {
            $result = $product->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($product->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $product->id];
            return redirect('backend/product')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products = Product::all();
        $users = User::all();
        $categories = Category::all();
        return view('backend.product.edit', ['product' => $product, 'users' => $users, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $result = $product->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $product->id];
            return redirect('backend/product')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $id = $product->id;
        try {
            $result = $product->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/product')->with($response);
    }
}
