@extends('layouts.app')

@section('content')
<div class="container py-8">
    <h1 class="text-2xl font-bold mb-6">افزودن دسته‌بندی جدید</h1>
    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" class="bg-white shadow rounded p-6 max-w-xl mx-auto">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-bold">نام دسته‌بندی <span class="text-red-500">*</span></label>
            <input type="text" name="title" class="form-input w-full" value="{{ old('title') }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-bold">کد دسته‌بندی <span class="text-red-500">*</span></label>
            <input type="text" name="code" class="form-input w-full" value="{{ old('code', $suggestedCode ?? '') }}" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-bold">دسته والد (اختیاری)</label>
            <select name="parent_id" class="form-input w-full">
                <option value="">بدون والد (دسته اصلی)</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-bold">تصویر دسته‌بندی</label>
            <input type="file" name="image" accept="image/*" class="form-input w-full">
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-bold">توضیحات</label>
            <textarea name="description" class="form-input w-full h-24">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-bold">تاریخ ایجاد</label>
            <input type="text" class="form-input w-full bg-gray-100 text-gray-500" value="{{ \Illuminate\Support\Carbon::now()->format('Y-m-d H:i') }}" readonly>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-primary text-white px-8 py-3 rounded shadow hover:bg-accent">ثبت دسته‌بندی</button>
        </div>
    </form>
</div>
@endsection
