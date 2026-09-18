<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Store;

class ProductsController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Product::query()->with('store', 'category');
        $name = $request->query('name');
        $status = $request->query('status');
        $categoryId = $request->query('category_id');
        $storeId = $request->query('store_id');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($storeId) {
            $query->where('store_id', $storeId);
        }
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }

        if ($status) {
            $query->where('status', $status);
        }

        return view(
            'dashboard.pages.products.index',
            [
                'products' => $query->get(),
                'categories' => Category::pluck('name', 'id'),
                'stores' => Store::pluck('name', 'id')
            ]
        );
    }
    public function create()
    {
        return view('dashboard.pages.products.create', [
            'product' => new Product(),
            'categories' => Category::pluck('name', 'id'),
            'stores' => Store::pluck('name', 'id')
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable|string'],
            'price' => ['required|numeric|min:0'],
            // 'compare_price' => ['nullable|numeric|min:0'],
            // 'image' => ['nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'status' => ['required|in:active,inactive'],
            'category_id' => ['required|exists:categories,id'],
            'store_id' => ['required|exists:stores,id'],
        ]);
        Product::create($request->all());
        return redirect()->route('dashboard.products.index')->with('success', 'تم إضافة المنتج بنجاح');
    }
    public function edit(Product $product)
    {
        return view('dashboard.pages.products.edit', [
            'product' => $product,
            'categories' => Category::pluck('name', 'id'),
            'stores' => Store::pluck('name', 'id')
        ]);
    }
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['nullable|string'],       
            'price' => ['required|numeric|min:0'],
            // 'compare_price' => ['nullable|numeric|min:0'],
            // 'image' => ['nullable|image|mimes:jpeg,png,jpg        gif,svg|max:2048'],
            'status' => ['required|in:active,inactive'],
            'category_id' => ['required|exists:categories,id'],
            'store_id' => ['required|exists:stores,id'],
        ]);
        $product->update($request->all());
        return redirect()->route('dashboard.products.index')->with('success', 'تم تعديل المنتج بنجاح');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success', 'تم حذف المنتج بنجاح');
    }
  
}
