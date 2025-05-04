<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // لیست
    public function index()
    {
        $categories = Category::orderByDesc('created_at')->paginate(20);
        return view('categories.index', compact('categories'));
    }

    // نمایش فرم ایجاد دسته‌بندی جدید
    public function create()
    {
        return view('categories.create');
    }

    // ثبت دسته‌بندی جدید
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
        ]);
        Category::create([
            'title' => $request->title,
        ]);
        return redirect()->route('categories.index')->with('success', 'دسته‌بندی با موفقیت ایجاد شد.');
    }

    // سایر متدهای قبلی (ajaxSearch, ajaxCreate و ...)
    public function ajaxSearch(Request $request)
    {
        $q = $request->input('q');

        if (!$q) {
            $popular = Category::withCount('persons')
                ->orderByDesc('persons_count')
                ->limit(5)
                ->get(['id', 'title']);

            if ($popular->count() < 5) {
                $recent = Category::orderByDesc('created_at')
                    ->limit(5 - $popular->count())
                    ->get(['id', 'title']);
                $cats = $popular->concat($recent)->unique('id')->values();
            } else {
                $cats = $popular;
            }
        } else {
            $cats = Category::where('title', 'like', "%{$q}%")
                ->orderByDesc('created_at')
                ->limit(8)
                ->get(['id','title']);
        }
        return response()->json($cats);
    }

    public function ajaxCreate(Request $request)
    {
        $request->validate(['title'=>'required|string|max:100']);
        $cat = Category::create(['title' => $request->title]);
        return response()->json(['id' => $cat->id, 'title' => $cat->title]);
    }
}
