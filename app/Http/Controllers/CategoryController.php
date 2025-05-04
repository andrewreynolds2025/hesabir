<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ajaxSearch(Request $request)
    {
        $q = $request->input('q');
        // اگر هیچ کوئری نبود، ۵ دسته آخر یا پرکاربرد را برگردان
        if (!$q) {
            // پرکاربردترین‌ها بر اساس تعداد افراد ثبت شده
            $popular = \App\Models\Category::withCount('persons')
                ->orderByDesc('persons_count')
                ->limit(5)
                ->get(['id', 'title']);
            if ($popular->count() < 5) {
                // اگر کمتر از ۵ تا بود، آخرین دسته‌ها را هم اضافه کن
                $recent = \App\Models\Category::orderByDesc('created_at')->limit(5 - $popular->count())->get(['id','title']);
                $cats = $popular->concat($recent)->unique('id')->values();
            } else {
                $cats = $popular;
            }
        } else {
            $cats = \App\Models\Category::where('title', 'like', "%{$q}%")
                ->orderByDesc('created_at')
                ->limit(8)
                ->get(['id','title']);
        }
        return response()->json($cats);
    }

    public function ajaxCreate(Request $request)
    {
        $request->validate(['title'=>'required|string|max:100']);
        $cat = \App\Models\Category::create(['title'=>$request->title]);
        return response()->json(['id'=>$cat->id, 'title'=>$cat->title]);
    }
}
