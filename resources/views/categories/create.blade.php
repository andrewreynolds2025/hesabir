@extends('layouts.app')

@section('head')
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Custom Form Styles -->
    <link rel="stylesheet" href="{{ asset('css/category-form.css') }}">
@endsection

@section('content')
<div class="container py-6">
    <div class="mx-auto bg-white shadow rounded-3xl p-6" style="max-width: 480px;">
        <h3 class="mb-7 text-blue-700 fw-bold d-flex align-items-center gap-2" style="font-size:1.7rem">
            <i class="fa fa-sitemap text-blue-400"></i>
            تعریف دسته‌بندی جدید
        </h3>
        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" autocomplete="off" id="categoryForm">
            @csrf

            <!-- تصویر دسته‌بندی با رگ‌دراپ و پیش‌نمایش -->
            <div class="mb-4 text-center">
                <label class="category-img-dropzone" id="category-dropzone">
                    <img id="category-img-preview" src="{{ asset('images/category-default.png') }}" alt="تصویر دسته" />
                    <span class="category-img-edit-overlay">ویرایش تصویر</span>
                    <input type="file" name="image" id="category-img-input" accept="image/*" style="display:none">
                </label>
                <div class="text-muted" style="font-size:0.95rem;">تصویر دسته‌بندی</div>
            </div>

            <div class="mb-3">
                <label class="form-label">نام دسته‌بندی <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control" required maxlength="100" placeholder="مثلاً: لوازم خانگی" autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">کد دسته‌بندی <span class="text-danger">*</span></label>
                <input type="text" name="code" class="form-control" required maxlength="20" placeholder="مثلاً: 1001">
            </div>
            <div class="mb-3">
                <label class="form-label">دسته والد</label>
                <select name="parent_id" class="form-select">
                    <option value="">بدون والد (دسته اصلی)</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">توضیحات</label>
                <textarea name="description" class="form-control" rows="3" maxlength="500" placeholder="توضیحات تکمیلی، ویژگی‌ها و ..."></textarea>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-lg fw-bold">
                    <i class="fa fa-save ms-2"></i> ثبت دسته‌بندی
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <!-- Bootstrap 5 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/category-form.js') }}"></script>
@endsection
