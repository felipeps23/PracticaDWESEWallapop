<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wanted;
use App\Models\Contact;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('frontend.index', ['products' => $products]);
    }
    
    public function indexlogged()
    {
        $products = Product::all();
        return view('frontend.indexlogged', ['products' => $products]);
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
        return view('frontend.createproduct', ['products' => $products, 'users' => $users, 'categories' => $categories]);
    }
    
    public function createContact(Request $request, $id)
    {
        $contact = new Contact($request->all());
        // dd($object);
        try {

            $result = $contact->save();

        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($contact->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $contact->id];
            return back();
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
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
            return redirect('/home')->with($response);
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
    public function showitem(User $user, $id)
    {
        $product = Product::find($id);
        $contacts = DB::select("select * from product, contacts, users where product.id = contacts.idproduct and contacts.idproduct = $id and contacts.iduser2 = users.id");
        // dd($contact);
        return view('frontend.showitem', ['product' => $product, 'contacts' => $contacts]);
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
    
    public function cart(Request $request)
    {

         $object = new Wanted($request->all());

        // dd($object);
        try {

            $result = $object->save();

        } catch(\Exception $e) {
            dd($object);
            $result = 0;
        }
        if($object->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $object->id];
            return redirect('/home')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }
    
    public function cartview(Product $product,$id)
    {
        $product = Product::all();
        $wanteds = DB::select("select wanteds.id, users.name, product.id as idproduct, product.name as pname, product.photo as photo, product.price as price, product.state as state, wanteds.id as wantid from product, wanteds, users 
                                where wanteds.iduser = $id 
                                AND wanteds.idproduct = product.id and wanteds.iduser = users.id");
        return view('frontend.cart', ['wanteds' => $wanteds, 'product' => $product]);
    }
    
    
    public function buyproduct(Request $request, $id, $idwanted)
    {
        $product = Product::find($id);


        try {
            $result = $product->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $product->id];
             //return redirect('/')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'Algo ha fallado']);
        }


        $wanted = Wanted::find($idwanted);

        $idwanted = $idwanted;
        try {
            $result = $wanted->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $idwanted];
        //return redirect('/home')->with($response);
        return back();

    }
}
