<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = $this->getSubCategories(0);
        return view('admin.categories.index',[
            'categories' => $categories
        ]);
    }

    private function getSubCategories($parentId, $ignoreId = null){
        $categories = Category::whereParentId($parentId)
        ->where('id','<>',$ignoreId)
        ->get();
        $categories->map(function ($category) use($ignoreId) {
            $category->sub = $this->getSubCategories($category->id, $ignoreId);
            return $category;
        });
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getSubCategories(0);
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $r->validate([
            'parent_id'=>'required',
            'name'=>'required|min:3',
        ]);
        $category = new Category();
        $category->name = $r->name;
        $category->parent_id = $r->parent_id;
        $category->save();
        return redirect('/admin/category');
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
        $category = Category::findOrFail($id);
        $category->products()->get();
        $categories = $this->getSubCategories(0, $id);
        return view('admin.categories.edit',compact('category', 'categories')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $category)
    {
        $r->validate([
            'parent_id'=>'required',
            'name'=>'required|min:3',
        ]);
        // print_r($category);die;
        $input = $r->only(['parent_id','name']);
        $category = Category::findOrFail($category);
        $category->fill($input);
        $category->save();
        return back();
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
