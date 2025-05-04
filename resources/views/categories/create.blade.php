@extends('layouts.app')

@section('head')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
    <!-- Bootstrap Iconpicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css">
    <style>
        .form-label {font-weight: bold;}
        .form-control, .form-select {border-radius: 0.6rem;}
        .iconpicker-component i {font-size: 1.3rem;}
        .category-img-preview {
            width: 80px; height: 80px; object-fit: cover;
            border-radius: 0.7rem; border: 2px solid #e4e4e4; margin-top: 0.5rem;
        }
    </style>
@endsection

@section('content')
<div class="container py-5">
    <div class="card shadow border-0 mx-auto" style="max-width: 600px">
        <div class="card-body">
            <h3 class="mb-4 text-primary fw-bold d-flex align-items-center gap-2">
                <i class="fa fa-sitemap"></i>
                تعریف دسته‌بندی جدید
            </h3>
            <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" autocomplete="off">
                @csrf

                <div class="mb-3">
                    <label class="form-label">نام دسته‌بندی <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required maxlength="100"
                           placeholder="مثلاً: لوازم خانگی" autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">کد دسته‌بندی <span class="text-danger">*</span></label>
                    <input type="text" name="code" class="form-control" required maxlength="20"
                           placeholder="مثلاً: 1001">
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
                    <label class="form-label">انتخاب آیکون (Bootstrap/FontAwesome)</label>
                    <div class="input-group iconpicker-container">
                        <span class="input-group-text"><i class="fa fa-star"></i></span>
                        <input type="text" class="form-control iconpicker-input" name="icon" id="category-icon" readonly>
                        <button type="button" class="btn btn-outline-secondary" data-icon="fa fa-star" role="iconpicker" data-iconset="fontawesome5"></button>
                    </div>
                    <small class="text-muted mt-1 d-block">آیکون دلخواه را انتخاب کنید</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">تصویر دسته‌بندی</label>
                    <input type="file" name="image" accept="image/*" class="form-control" onchange="showPreview(event)">
                    <div id="img-preview-area"></div>
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
</div>
@endsection

@section('scripts')
    <!-- JQuery (برای Iconpicker) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Iconpicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>
    <!-- FontAwesome for icon preview -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
    <script>
        $(function () {
            // راه‌اندازی آیکون‌پیکر
            $('.iconpicker-container button[role="iconpicker"]').iconpicker({
                iconset: 'fontawesome5',
                placement: 'bottom',
                selectedClass: 'btn-success',
                unselectedClass: '',
                input: '.iconpicker-input'
            }).on('change', function(e){
                $('.iconpicker-input').val(e.icon);
            });

            // فوکوس خودکار روی نام دسته
            $('input[name="title"]').focus();
        });

        // پیش‌نمایش تصویر
        function showPreview(event) {
            let previewArea = document.getElementById('img-preview-area');
            previewArea.innerHTML = '';
            if(event.target.files.length) {
                let img = document.createElement('img');
                img.className = 'category-img-preview';
                img.src = URL.createObjectURL(event.target.files[0]);
                previewArea.appendChild(img);
            }
        }
    </script>
@endsection
