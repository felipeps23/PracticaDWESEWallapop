<?php

namespace App\Http\Controllers;

// use App\Http\Requests\CategoryCreateRequest;
// use App\Http\Requests\CategoryRequest;

use App\Models\Category;
use Illuminate\Http\Request;

class BackendCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('backend.category.create');
        $categories = Category::all();
         return view('backend.category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     
     
    public function store(Request $request) {
        
    $category = new Category($request->all());
        // dd($object);
        try {

            $result = $category->save();

        } catch(\Exception $e) {
            dd($e);
            $result = 0;
        }
        if($category->id > 0) {
            $response = ['op' => 'Create', 'r' => $result, 'id' => $category->id];
            return redirect('backend/category')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }
    
    // public function store(CategoryCreateRequest $request)
    // {
    //     $category = new Category($request->validated());
    
    //     try {
    //         $result = $category->save();
    //     } catch(\Exception $e) {
    //         $result = 0;
    //     }
    //     if($category->id > 0) {
    //         $response = ['op' => 'create', 'r' => $result, 'id' => $category->id];
    //         return redirect('backend/category')->with($response);
    //     } else {
    //         return back()->withInput()->withErrors(['name' => 'El nombre de la categoría ya existe.']);
    //     }
        
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('backend.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try {
            $result = $category->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        if($result) {
            $response = ['op' => 'Update', 'r' => $result, 'id' => $category->id];
            return redirect('backend/category')->with($response);
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
    public function destroy(Category $category)
    {
        $id = $category->id;
        try {
            $result = $category->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        $response = ['op' => 'Destroy', 'r' => $result, 'id' => $id];
        return redirect('backend/category')->with($response);
    }
}
