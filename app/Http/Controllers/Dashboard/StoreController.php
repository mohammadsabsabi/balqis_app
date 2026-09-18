<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {

        $request = request();
        $query = Store::query();
        $name = $request->query('name');
        $status = $request->query('status');
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }
        if ($status) {
            $query->where('status', $status);
        }
        $stores = $query->get();

        return view('dashboard.pages.stores.index', compact('stores'));
    }
    public function create()
    {
        $store = new Store();
        return view('dashboard.pages.stores.create', compact('store'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:stores,name,except,id'],
            'status' => ['required', 'in:active,inactive'],
            'description' => ['nullable'],
        ]);

        Store::create($request->all());
        return redirect()->route('dashboard.stores.index')->with('success', 'تمت الإضافة بنجاح.');
    }
    public function edit(Store $store)
    {
        return view(
            'dashboard.pages.stores.edit',
            ['store' => $store]
        );
    }
    public function update(Request $request, Store $store) // Route model binding
    {
        $request->validate([
            'name' => ['required', 'unique:stores,name,except,id'],
            'status' => ['required', 'in:active,inactive'],
            'description' => ['nullable'],
        ]);

        $store->update($request->all());
        return redirect()->route('dashboard.stores.index')->with('success', 'تم التعديل بنجاح.');
    }
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('dashboard.stores.index')->with('success', 'تم الحذف بنجاح.');
    }
    public function show(Store $store)
    {
        return view('dashboard.pages.stores.show', [
            'store' => $store
        ]);
    }
}
