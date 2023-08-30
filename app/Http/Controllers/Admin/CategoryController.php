<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {   
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        return view('admin.category.show');

    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));

    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        try {
            // Eliminar la categoría
            $category->delete();
            
            return redirect()->route('admin.categories.index')
                ->with('success', 'Categoría eliminada exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Error al eliminar la categoría');
        }
    }
}
