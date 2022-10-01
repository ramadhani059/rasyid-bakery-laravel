<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use App\Models\Product;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $pagesize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
    }

    public function render()
    {
        $pageTitle = 'Product | Rasyid Bakery';

        $category = Categorie::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->nama_kategori;

        $product = Product::where('categorie_id',$category_id)->paginate($this->pagesize);

        $categories = Categorie::all();

        return view('livewire.category-component', [
            'pageTitle' => $pageTitle,
            'product' => $product,
            'categories' => $categories,
            'category_name' => $category_name,
        ]);
    }
}
