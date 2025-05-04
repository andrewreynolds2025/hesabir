@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/category-form.css') }}">
<link rel="stylesheet" href="{{ asset('css/category-advanced.css') }}">
<style>
.switch-cat-type {
    display: flex; gap: 1rem; justify-content: center; margin-bottom: 2rem;
}
.switch-cat-type label {
    font-weight: bold; font-size: 1.05rem;
    padding: .5rem 1.3rem; border-radius: 30px;
    background: #f3f7fa; cursor: pointer; transition: background .16s;
    border: 2px solid #cbd5e1;
    display: flex; align-items: center; gap: .5rem;
}
.switch-cat-type input[type="radio"]:checked + span {
    color: #1565c0;
    font-weight: bold;
    background: #e3f2fd;
    border-color: #1565c0;
}
.switch-cat-type input[type="radio"] { display: none; }
.cat-section { display: none; }
.cat-section.active { display: block; }
.form-switch { display: flex; align-items: center; gap: .5rem; }
.form-switch input[type="checkbox"] { width: 1.4em; height: 1.4em; }
.code-switch {display:flex;align-items:center;gap:6px;margin-bottom:10px;}
.code-switch label {font-size:.98rem;}
.manage-btn {margin-right: 8px; font-size: 14px;}
.manage-btn i {margin-left: 4px;}
/* --- Popup Modal --- */
.modal-popup-bg {
    background: rgba(0,0,0,0.33); position: fixed; inset: 0; z-index: 9999;
    display: flex; align-items: center; justify-content: center;
}
.modal-popup {
    background: #fff; border-radius: 16px; padding: 1.5rem; min-width: 340px; box-shadow: 0 8px 24px rgba(30,41,59,.13);
    position: relative; max-width: 95vw;
}
.modal-popup .close-btn {
    position: absolute; top: 10px; left: 20px; background: none; border: none; font-size: 1.6rem; color: #999;
}
.table-responsive {max-height: 260px;overflow:auto;}
.modal-popup-table th, .modal-popup-table td {padding: 7px 10px; text-align: right;}
.modal-popup-table th {background: #f8fafc;}
.modal-popup-table tr td:last-child {text-align:center;}
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="mx-auto bg-white shadow rounded-3xl p-5" style="max-width: 640px;">
        <h2 class="mb-2 text-blue-700 fw-bold d-flex align-items-center gap-2" style="font-size:1.7rem">
            <i class="fa fa-layer-group text-blue-400"></i>
            مدیریت دسته‌بندی‌ها
        </h2>
        <div class="switch-cat-type mb-4">
            <label>
                <input type="radio" name="catType" value="person" checked>
                <span><i class="fa fa-user-group"></i> دسته‌بندی اشخاص</span>
            </label>
            <label>
                <input type="radio" name="catType" value="product">
                <span><i class="fa fa-cube"></i> دسته‌بندی کالا</span>
            </label>
            <label>
                <input type="radio" name="catType" value="service">
                <span><i class="fa fa-hand-holding-heart"></i> دسته‌بندی خدمات</span>
            </label>
        </div>

        {{-- دسته‌بندی اشخاص --}}
        <div class="cat-section active" id="cat-person">
            <form method="POST" action="{{ route('categories.store', ['type' => 'person']) }}" enctype="multipart/form-data" id="personCatForm" autocomplete="off">
                @csrf
                <div class="mb-4 text-center">
                    <label class="category-img-dropzone" id="person-cat-dropzone">
                        <img id="person-cat-img-preview" src="{{ asset('images/category-default.png') }}" alt="تصویر دسته" />
                        <span class="category-img-edit-overlay">ویرایش تصویر</span>
                        <input type="file" name="image" id="person-cat-img-input" accept="image/*" style="display:none">
                    </label>
                    <div class="text-muted" style="font-size:0.95rem;">تصویر دسته‌بندی</div>
                </div>
                <div class="mb-3 code-switch">
                    <input type="checkbox" id="person-autocode" checked>
                    <label for="person-autocode">کد خودکار</label>
                    <input type="text" name="code" id="person-code" value="per-001" class="form-control" readonly style="width:170px;">
                </div>
                <div class="mb-3">
                    <label class="form-label">نام دسته‌بندی <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required maxlength="100">
                </div>
                <div class="mb-3">
                    <label class="form-label">دسته والد</label>
                    <select name="parent_id" class="form-select">
                        <option value="">بدون والد (دسته اصلی)</option>
                        @foreach($personCategories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-flex gap-2 align-items-center">
                    <label class="form-label mb-0">نوع شخص</label>
                    <button type="button" class="btn btn-outline-secondary btn-sm manage-btn" onclick="openModal('personType')"><i class="fa fa-cog"></i>مدیریت</button>
                    <select name="person_type" id="person-type-select" class="form-select" style="width:200px;">
                        @foreach($personTypes as $pt)
                            <option value="{{ $pt }}">{{ $pt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">توضیحات</label>
                    <textarea name="description" class="form-control" rows="3" maxlength="500"></textarea>
                </div>
                <div class="mb-3 form-switch">
                    <input class="form-check-input" type="checkbox" value="1" name="active" id="person-active" checked>
                    <label class="form-check-label" for="person-active">فعال</label>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold">
                        <i class="fa fa-save ms-2"></i> ثبت دسته‌بندی اشخاص
                    </button>
                </div>
            </form>
        </div>

        {{-- دسته‌بندی کالا --}}
        <div class="cat-section" id="cat-product">
            <form method="POST" action="{{ route('categories.store', ['type' => 'product']) }}" enctype="multipart/form-data" id="productCatForm" autocomplete="off">
                @csrf
                <div class="mb-4 text-center">
                    <label class="category-img-dropzone" id="product-cat-dropzone">
                        <img id="product-cat-img-preview" src="{{ asset('images/category-default.png') }}" alt="تصویر دسته" />
                        <span class="category-img-edit-overlay">ویرایش تصویر</span>
                        <input type="file" name="image" id="product-cat-img-input" accept="image/*" style="display:none">
                    </label>
                    <div class="text-muted" style="font-size:0.95rem;">تصویر دسته‌بندی</div>
                </div>
                <div class="mb-3 code-switch">
                    <input type="checkbox" id="product-autocode" checked>
                    <label for="product-autocode">کد خودکار</label>
                    <input type="text" name="code" id="product-code" value="cat-pr1001" class="form-control" readonly style="width:170px;">
                </div>
                <div class="mb-3">
                    <label class="form-label">نام دسته‌بندی <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required maxlength="100">
                </div>
                <div class="mb-3">
                    <label class="form-label">دسته والد</label>
                    <select name="parent_id" class="form-select">
                        <option value="">بدون والد (دسته اصلی)</option>
                        @foreach($productCategories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-flex gap-2 align-items-center">
                    <label class="form-label mb-0">واحد اصلی</label>
                    <button type="button" class="btn btn-outline-secondary btn-sm manage-btn" onclick="openModal('unit')"><i class="fa fa-cog"></i>مدیریت</button>
                    <select name="unit" id="unit-select" class="form-select" style="width:200px;">
                        @foreach($units as $u)
                            <option value="{{ $u }}">{{ $u }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">مالیات پیش‌فرض (%)</label>
                    <input type="number" name="tax" class="form-control" min="0" max="100" step="0.1">
                </div>
                <div class="mb-3">
                    <label class="form-label">توضیحات</label>
                    <textarea name="description" class="form-control" rows="3" maxlength="500"></textarea>
                </div>
                <div class="mb-3 form-switch">
                    <input class="form-check-input" type="checkbox" value="1" name="active" id="product-active" checked>
                    <label class="form-check-label" for="product-active">فعال</label>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold">
                        <i class="fa fa-save ms-2"></i> ثبت دسته‌بندی کالا
                    </button>
                </div>
            </form>
        </div>

        {{-- دسته‌بندی خدمات --}}
        <div class="cat-section" id="cat-service">
            <form method="POST" action="{{ route('categories.store', ['type' => 'service']) }}" enctype="multipart/form-data" id="serviceCatForm" autocomplete="off">
                @csrf
                <div class="mb-4 text-center">
                    <label class="category-img-dropzone" id="service-cat-dropzone">
                        <img id="service-cat-img-preview" src="{{ asset('images/category-default.png') }}" alt="تصویر دسته" />
                        <span class="category-img-edit-overlay">ویرایش تصویر</span>
                        <input type="file" name="image" id="service-cat-img-input" accept="image/*" style="display:none">
                    </label>
                    <div class="text-muted" style="font-size:0.95rem;">تصویر دسته‌بندی</div>
                </div>
                <div class="mb-3 code-switch">
                    <input type="checkbox" id="service-autocode" checked>
                    <label for="service-autocode">کد خودکار</label>
                    <input type="text" name="code" id="service-code" value="cat-ser1001" class="form-control" readonly style="width:170px;">
                </div>
                <div class="mb-3">
                    <label class="form-label">نام دسته‌بندی <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required maxlength="100">
                </div>
                <div class="mb-3">
                    <label class="form-label">دسته والد</label>
                    <select name="parent_id" class="form-select">
                        <option value="">بدون والد (دسته اصلی)</option>
                        @foreach($serviceCategories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 d-flex gap-2 align-items-center">
                    <label class="form-label mb-0">نوع خدمت</label>
                    <button type="button" class="btn btn-outline-secondary btn-sm manage-btn" onclick="openModal('serviceType')"><i class="fa fa-cog"></i>مدیریت</button>
                    <select name="service_type" id="service-type-select" class="form-select" style="width:200px;">
                        @foreach($serviceTypes as $st)
                            <option value="{{ $st }}">{{ $st }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">نرخ پایه خدمت (تومان)</label>
                    <input type="number" name="base_rate" class="form-control" min="0" step="1000">
                </div>
                <div class="mb-3">
                    <label class="form-label">مالیات پیش‌فرض (%)</label>
                    <input type="number" name="tax" class="form-control" min="0" max="100" step="0.1">
                </div>
                <div class="mb-3">
                    <label class="form-label">توضیحات</label>
                    <textarea name="description" class="form-control" rows="3" maxlength="500"></textarea>
                </div>
                <div class="mb-3 form-switch">
                    <input class="form-check-input" type="checkbox" value="1" name="active" id="service-active" checked>
                    <label class="form-check-label" for="service-active">فعال</label>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg fw-bold">
                        <i class="fa fa-save ms-2"></i> ثبت دسته‌بندی خدمات
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- === POPUPS === --}}
{{-- personType --}}
<div id="modal-personType" class="modal-popup-bg" style="display:none;">
    <div class="modal-popup">
        <button type="button" class="close-btn" onclick="closeModal('personType')">&times;</button>
        <h5>مدیریت نوع شخص</h5>
        <div class="table-responsive">
            <table class="modal-popup-table table table-bordered">
                <thead>
                    <tr><th>عنوان</th><th>عملیات</th></tr>
                </thead>
                <tbody id="personType-list"></tbody>
            </table>
        </div>
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="personType-new" placeholder="افزودن نوع جدید">
            <button class="btn btn-primary" type="button" onclick="addPopupItem('personType')">ثبت</button>
        </div>
    </div>
</div>
{{-- unit --}}
<div id="modal-unit" class="modal-popup-bg" style="display:none;">
    <div class="modal-popup">
        <button type="button" class="close-btn" onclick="closeModal('unit')">&times;</button>
        <h5>مدیریت واحد اصلی</h5>
        <div class="table-responsive">
            <table class="modal-popup-table table table-bordered">
                <thead>
                    <tr><th>عنوان</th><th>عملیات</th></tr>
                </thead>
                <tbody id="unit-list"></tbody>
            </table>
        </div>
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="unit-new" placeholder="افزودن واحد جدید">
            <button class="btn btn-primary" type="button" onclick="addPopupItem('unit')">ثبت</button>
        </div>
    </div>
</div>
{{-- serviceType --}}
<div id="modal-serviceType" class="modal-popup-bg" style="display:none;">
    <div class="modal-popup">
        <button type="button" class="close-btn" onclick="closeModal('serviceType')">&times;</button>
        <h5>مدیریت نوع خدمت</h5>
        <div class="table-responsive">
            <table class="modal-popup-table table table-bordered">
                <thead>
                    <tr><th>عنوان</th><th>عملیات</th></tr>
                </thead>
                <tbody id="serviceType-list"></tbody>
            </table>
        </div>
        <div class="input-group mb-2">
            <input type="text" class="form-control" id="serviceType-new" placeholder="افزودن نوع جدید">
            <button class="btn btn-primary" type="button" onclick="addPopupItem('serviceType')">ثبت</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/category-advanced.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
<script>


</script>
@endsection
