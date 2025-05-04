<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // صفحه لیست دسته‌بندی‌ها
    public function list()
    {
        $categories = Category::with('parent')->latest()->paginate(20);
        return view('categories.list', compact('categories'));
    }

    // صفحه فرم ایجاد دسته‌بندی
    public function create()
    {
        $categories = Category::all();
        $suggestedCode = str_pad(optional(Category::latest('id')->first())->id + 1, 4, '0', STR_PAD_LEFT);
        return view('categories.create', compact('categories', 'suggestedCode'));
    }

    // ذخیره دسته‌بندی جدید
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:16|unique:categories,code',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('category_images', 'public');
        }
        Category::create($data);
        return redirect()->route('categories.list')->with('success', 'دسته‌بندی با موفقیت ثبت شد.');
    }
}
