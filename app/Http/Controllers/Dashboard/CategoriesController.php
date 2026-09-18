<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $request = request();
        $query = Category::query();

        $name = $request->query('name');
        $status = $request->query('status');
        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        if ($status) {
            $query->where('status', $status);
        }
        // $categories = Category::all();
        return view('dashboard.pages.categories.index', [
            'categories' => $query->withCount('products')->get(),
            
        ]);
    }

    public function create()
    {
        $category = new Category();
        return view('dashboard.pages.categories.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'

        ]);

        Category::create($request->all());
        return redirect()->route('dashboard.categories.index')
            ->with('success', 'تمت الإضافة بنجاح');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive'
        ]);

        $category = Category::findOrFail($id);

        $category->update($request->all());
        return redirect()->route('dashboard.categories.index')
            ->with('success', 'تم التعديل بنجاح');
    }
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.pages.categories.show', compact('category'));
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('dashboard.categories.index')
            ->with('success', 'تم الحذف بنجاح');
    }
      public function products(Category $category)
    {
        return view('dashboard.pages.categories.products', [
            'category' => $category,
            'products' => $category->products()->with('store')->paginate(10),
        ]);
    }
}
