<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::orderBy('name')->cursorPaginate(10);

        return view('category.showCategory', compact('categories'));
    }

    public function create(Request $request)
    {
        // Validate input
        $request->validate([
            'category' => 'required|string|max:255|unique:categories,name',
        ]);

        // Create new category
        Category::create([
            'name' => $request->input('category'),
            'user_id' => Auth::id(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    // Show the edit form
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        // Protect against unauthorized access
        if ($category->user_id !== Auth::id()) {
            abort(403);
        }

        return view('category.editCategory', compact('category'));
    }

    // Update the category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->input('category'),
        ]);

        return redirect()->route('category.show')->with('success', 'Category updated successfully!');
    }

    // Delete the category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
