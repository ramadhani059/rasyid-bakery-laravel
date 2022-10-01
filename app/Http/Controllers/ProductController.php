<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Product | Dashboard';

        $product = Product::all();

        return view('admin/product/index', [
            'pageTitle' => $pageTitle,
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add Product | Dashboard';

        // ELOQUENT
        $categorie = Categorie::all();

        return view('admin.product.add', compact('pageTitle', 'categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute is require',
            'numeric' => 'Fill :Attribute with number',
        ];

        $request->validate([
            'productname' => 'required',
            'productprice' => 'required|numeric',
            'categoryproduct' => 'required',
            'productphoto' => 'required'
        ], $messages);

        // Get File Image
        $file = $request->file('productphoto');
        $ImgProductOriginal = $file->getClientOriginalName();
        $ImgProductEncrypted = $file->hashName();

        // Store File Image
        $file->store('public/image/product');

        // INSERT QUERY
        // DB::table('products')->insert([
        //         'img_product' => $request->productphoto,
        //         'nama_product' => $request->productname,
        //         'harga_product' => $request->productprice,
        //         'id_kategori' => $request->categoryproduct,
        //     ]);

        // ELOQUENT
        $product = new Product;
        $product->img_product_original = $ImgProductOriginal;
        $product->img_product_encrypted = $ImgProductEncrypted;
        $product->nama_product = $request->productname;
        $product->harga_product = $request->productprice;
        $product->categorie_id = $request->categoryproduct;
        $product->save();

        Alert::success('Added Successfully', 'Product Data Added Successfully');

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Product Detail | Dashboard';

        // $product = DB::table('products')
        //     ->select('*', 'products.id as product_id', 'categorys.id as kategori_id', 'categorys.nama_kategori as ketegori_product')
        //     ->leftJoin('categorys', 'products.product_id', 'categorys.id')
        //     ->where('products.id', $id)
        //     ->first();

        // ELOQUENT
        $product = Product::find($id);

        return view('admin.product.view', compact('pageTitle', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Product | Dashboard';

        // $category = DB::table('categorys')->get();
        // $product = DB::table('products')
        //     ->select('*', 'products.id as product_id', 'categorys.id as kategori_id', 'categorys.nama_kategori as ketegori_product')
        //     ->leftJoin('categorys', 'products.product_id', 'categorys.id')
        //     ->where('products.id', $id)
        //     ->first();

        // ELOQUENT
        $categorie = Categorie::all();
        $product = Product::find($id);

        return view('admin.product.edit', compact('pageTitle', 'categorie', 'product'));
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
        $messages = [
            'required' => ':Attribute is require',
            'numeric' => 'Fill :Attribute with number',
        ];

        $request->validate([
            'productname' => 'required',
            'productprice' => 'required|numeric',
            'categoryproduct' => 'required',
        ], $messages);

        $product = Product::find($id);

        // Get File Image
        $file = $request->file('productphoto');

        if ($file != null) {
            $ImgProductOriginal = $file->getClientOriginalName();
            $ImgProductEncrypted = $file->hashName();

            // Delete Existing Image
            Storage::disk('public')->delete('image/product/'.$product->img_product_encrypted);

            // Store File Image
            $file->store('public/image/product');
        }

        // UPDATE QUERY
        // DB::table('products')
        //     ->where('id', $id)
        //     ->update([
        //         'img_product' => $request->productphoto,
        //         'nama_product' => $request->productname,
        //         'harga_product' => $request->productprice,
        //         'id_kategori' => $request->categoryproduct,
        //     ]);

        // ELOQUENT
        $product->nama_product = $request->productname;
        $product->harga_product = $request->productprice;
        $product->categorie_id = $request->categoryproduct;

        if ($file != null) {
            $product->img_product_original = $ImgProductOriginal;
            $product->img_product_encrypted = $ImgProductEncrypted;
        }

        $product->save();

        Alert::success('Changed Successfully', 'Product Data Changed Successfully');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ELOQUENT
        $product = Product::find($id);
        $ImgProductEncrypted = $product->img_product_encrypted;

        // Delete Category
        $product->delete();

        // Delete File Image
        Storage::disk('public')->delete('image/product/'.$ImgProductEncrypted);

        Alert::success('Deleted Successfully', 'Product Data Deleted Successfully');

        return redirect()->route('product.index');
    }

    public function exportPdf()
    {
        $product = Product::all();

        $pdf = PDF::loadView('admin.product.export_pdf', compact('product'));

        return $pdf->stream();

    }
}
