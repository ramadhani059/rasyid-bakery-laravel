<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = 'Category | Dashboard';

        $category = Categorie::all();

        return view('admin/category/index', [
            'pageTitle' => $pageTitle,
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = 'Add Category | Dashboard';

        return view('admin/category/add', ['pageTitle' => $pageTitle]);
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
            'categoryname' => 'required',
            'slug' => 'required',
            'totalproduct' => 'required|numeric',
            'categoryphoto' => 'required'
        ], $messages);

        // Get File Image
        $file = $request->file('categoryphoto');
        $ImgCategoryOriginal = $file->getClientOriginalName();
        $ImgCategoryEncrypted = $file->hashName();

        // Store File Image
        $file->store('public/image/category');

        // ELOQUENT
        $category = new Categorie;
        $category->img_category_original = $ImgCategoryOriginal;
        $category->img_category_encrypted = $ImgCategoryEncrypted;
        $category->nama_kategori = $request->categoryname;
        $category->slug = $request->slug;
        $category->jumlah_product = $request->totalproduct;
        $category->save();

        Alert::success('Added Successfully', 'Category Data Added Successfully');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = 'Category Detail | Dashboard';

        // ELOQUENT
        $category = Categorie::find($id);

        return view('admin.category.view', compact('pageTitle', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageTitle = 'Edit Category | Dashboard';

        // ELOQUENT
        $category = Categorie::find($id);

        return view('admin.category.edit', compact('pageTitle', 'category'));
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
            'categoryname' => 'required',
            'slug' => 'required',
            'totalproduct' => 'required|numeric',
        ], $messages);

        $category = Categorie::find($id);

        // Get File Image
        $file = $request->file('categoryphoto');

        if ($file != null) {
            $ImgCategoryOriginal = $file->getClientOriginalName();
            $ImgCategoryEncrypted = $file->hashName();

            // Delete Existing Image
            Storage::disk('public')->delete('image/category/'.$category->img_category_encrypted);

            // Store File Image
            $file->store('public/image/category');
        }

        // ELOQUENT
        $category->nama_kategori = $request->categoryname;
        $category->slug = $request->slug;
        $category->jumlah_product = $request->totalproduct;

        if ($file != null) {
            $category->img_category_original = $ImgCategoryOriginal;
            $category->img_category_encrypted = $ImgCategoryEncrypted;
        }

        $category->save();

        Alert::success('Changed Successfully', 'Category Data Changed Successfully');

        return redirect()->route('category.index');
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
        $category = Categorie::find($id);
        $ImgCategoryEncrypted = $category->img_category_encrypted;

        // Delete Category
        $category->delete();

        // Delete File Image
        Storage::disk('public')->delete('image/category/'.$ImgCategoryEncrypted);

        Alert::success('Deleted Successfully', 'Category Data Deleted Successfully');

        return redirect()->route('category.index');
    }
}
