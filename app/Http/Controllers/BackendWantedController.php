<?php

namespace App\Http\Controllers;

use App\Models\Wanted;
use App\Models\User;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class BackendWantedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        // $wanteds = Wanted::all();
        $wanteds = DB::select("select wanteds.id, users.name, product.id as idproduct, product.name as pname, product.photo as photo, product.price as price, product.state as state, wanteds.id as wantid from product, wanteds, users 
                                where wanteds.iduser = users.id 
                                AND wanteds.idproduct = product.id");
        return view('backend.wanted.index', ['wanteds' => $wanteds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wanteds = Wanted::all();
        $products = Product::all();
        $users = User::all();
        return view('backend.wanted.create', ['wanteds' => $wanteds, 'products' => $products, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object = new Wanted($request->all());
        try {
            $result = $object->save();
        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $object->id];
            return redirect('backend/wanted')->with($response);
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
    public function show(Wanted $wanted)
    {
        return view('backend.wanted.show', ['wanted' => $wanted]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Wanted $wanted)
    {
        $wanteds = Wanted::all();
        $products = Product::all();
        $users = User::all();
        return view('backend.wanted.edit', ['wanted' => $wanted, 'products' => $products, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wanted $wanted)
    {
        try {
            $result = $wanted->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $wanted->id];
            return redirect('backend/wanted')->with($response);
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
    public function destroy(Wanted $wanted)
    {
        $id = $wanted->id;
        try {
            $result = $wanted->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/wanted')->with($response);
    }
}
