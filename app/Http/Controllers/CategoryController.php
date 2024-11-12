<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new category
        return view('category.create');
    }
    
    public function store(StoreCategoryRequest $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Create the new category
        Category::create($data);
    
        // Redirect to the categories list with a success message
        return redirect('/')->with('success', 'Category created successfully.');
    }
    



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }
    
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $category = Category::findOrFail($id);
        $category->update($data);
    
        return redirect('/')->with('success', 'Category updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/')->with('success', 'Category deleted successfully.');
    }
}
