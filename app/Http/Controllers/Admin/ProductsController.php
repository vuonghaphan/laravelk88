<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductsRequest;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('products')->whereSku('akm01')->update([
            'category_id'=> '22',
            ]);
        $product = DB::table('products')->get();
        return view('admin.products.index',[
            'prd' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
            'category_id' => 'required',
            'sku' => 'required',
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required|numeric|min:0',
            'img' => 'sometimes|image',
        ],[
            'sku.required' => 'lực ăn lồn trâu'
        ]);
        $input = $r->only([
            'category_id',
            'sku',
            'name',
            'price',
            'quantity',
            'img',
            'detail',
            'description',
            'featured',
        ]);
        //input = $r->only chỉ được phép gửi dữ liệu những ô mình chọn trong hàm only (a tùng ăn lol)

        print_r($input);
        $product = Product::create($input);
        return redirect("admin/products/{$product->id}/edit");
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
    public function edit($product)
    {
        $product = Product::findOrFail($product); //finOrFail tìm $product trong DB, nếu thấy thì lưu vào $product, k thì trả về 404
        return view('admin.products.edit', compact('product'));
        // return view('admin.products.edit', ['product' => $product ])); : compact giống như này
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductsRequest $r, $product)
    {
        $input = $r->only([
            'category_id',
            'sku',
            'name',
            'price',
            'quantity',
            'img',
            'detail',
            'description',
            'featured',
        ]);
        //input = $r->only chỉ được phép gửi dữ liệu những ô mình chọn trong hàm only (a tùng ăn lol)

        // print_r($input);
        $product = Product::findOrFail($product);
        $product->fill($input);
        $product->save();
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
