@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="../css/person-create.css">
@endsection

@section('content')
<div class="container mx-auto py-6 px-2">
    <form id="personForm" method="POST" action="{{ route('persons.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow-md p-6">
        @csrf
        <h1 class="text-2xl font-bold text-primary mb-6 text-center">افزودن شخص جدید</h1>
        <div class="flex flex-col md:flex-row md:gap-6">
            {{-- تصویر شخص --}}
            <div class="w-full md:w-1/5 flex flex-col items-center mb-5">
                <div class="relative">
                    <img id="profilePreview" src="{{ asset('images/default-avatar.png') }}" class="rounded-full border-2 border-primary w-28 h-28 object-cover" alt="شخص">
                    <input type="file" name="avatar" id="avatar" accept="image/*" class="hidden">
                    <button type="button" onclick="document.getElementById('avatar').click()" class="absolute bottom-0 left-0 bg-primary text-white px-3 py-1 rounded-full text-xs">ویرایش</button>
                </div>
            </div>
            <div class="w-full md:w-4/5">
                <div class="flex flex-wrap gap-4 items-center mb-3">
                    {{-- کد حسابداری --}}
                    <label class="block text-gray-700 font-bold mb-2 w-full md:w-auto">کد حسابداری:</label>
                    <div class="flex items-center gap-2">
                        <input type="text" name="account_code" id="account_code" class="form-input w-32 text-center" value="{{ old('account_code', $suggestedCode ?? '0001') }}" readonly>
                        <label class="switch">
                            <input type="checkbox" id="autoCodeSwitch" checked>
                            <span class="slider"></span>
                        </label>
                        <span class="text-xs text-gray-500" id="autoCodeHint">تولید خودکار کد</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1">شرکت</label>
                        <input type="text" name="company" class="form-input w-full" value="{{ old('company') }}">
                    </div>
                    <div>
                        <label class="block mb-1">عنوان</label>
                        <input type="text" name="title" class="form-input w-full" value="{{ old('title') }}">
                    </div>
                    <div>
                        <label class="block mb-1">نام</label>
                        <input type="text" name="first_name" class="form-input w-full" value="{{ old('first_name') }}">
                    </div>
                    <div>
                        <label class="block mb-1">نام خانوادگی</label>
                        <input type="text" name="last_name" class="form-input w-full" value="{{ old('last_name') }}">
                    </div>
                    <div>
                        <label class="block mb-1">نام مستعار</label>
                        <input type="text" name="nickname" class="form-input w-full" value="{{ old('nickname') }}">
                    </div>
                    <div>
                        <label class="block mb-1">دسته‌بندی</label>
                        <div class="flex gap-2">
                            <select name="category_id" id="category_id" class="form-input w-full">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                            <button type="button" id="addCategoryBtn" class="bg-accent text-white px-3 rounded">+</button>
                        </div>
                    </div>
                    <div>
                        <label class="block mb-1">نوع شخص</label>
                        <select name="type" class="form-input w-full">
                            <option value="customer">مشتری</option>
                            <option value="supplier">تأمین‌کننده</option>
                            <option value="shareholder">سهامدار</option>
                            <option value="employee">کارمند</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        {{-- تب‌بندی --}}
        <div class="tabs mt-6">
            <ul class="tab-header flex gap-2 border-b">
                <li class="active" data-tab="general">عمومی</li>
                <li data-tab="address">آدرس</li>
                <li data-tab="contact">تماس</li>
                <li data-tab="bank">حساب بانکی</li>
                <li data-tab="other">سایر</li>
            </ul>
            <div class="tab-content bg-white rounded-b-xl p-3">
                {{-- عمومی --}}
                <div class="tab-panel active" data-tab="general">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>اعتبار مالی (ریال)</label>
                            <input type="number" name="credit" class="form-input w-full" value="0">
                        </div>
                        <div>
                            <label>لیست قیمت</label>
                            <input type="text" name="price_list" class="form-input w-full">
                        </div>
                        <div>
                            <label>نوع مالیات</label>
                            <select name="tax_type" class="form-input w-full">
                                <option>۵- مودی مشمول ثبت نام در نظام مالیاتی</option>
                            </select>
                        </div>
                        <div>
                            <label>شناسه ملی</label>
                            <input type="text" name="national_id" class="form-input w-full">
                        </div>
                        <div>
                            <label>کد اقتصادی</label>
                            <input type="text" name="economic_code" class="form-input w-full">
                        </div>
                        <div>
                            <label>شماره ثبت</label>
                            <input type="text" name="register_no" class="form-input w-full">
                        </div>
                        <div>
                            <label>کد شعبه</label>
                            <input type="text" name="branch_code" class="form-input w-full">
                        </div>
                        <div>
                            <label>توضیحات</label>
                            <textarea name="description" class="form-input w-full h-16"></textarea>
                        </div>
                    </div>
                </div>
                {{-- آدرس --}}
                <div class="tab-panel" data-tab="address">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><label>آدرس</label><input type="text" name="address" class="form-input w-full"></div>
                        <div><label>کشور</label><input type="text" name="country" class="form-input w-full"></div>
                        <div><label>استان</label><input type="text" name="state" class="form-input w-full"></div>
                        <div><label>شهر</label><input type="text" name="city" class="form-input w-full"></div>
                        <div><label>کدپستی</label><input type="text" name="postal_code" class="form-input w-full"></div>
                    </div>
                </div>
                {{-- تماس --}}
                <div class="tab-panel" data-tab="contact">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><label>تلفن</label><input type="text" name="phone" class="form-input w-full"></div>
                        <div><label>موبایل</label><input type="text" name="mobile" class="form-input w-full"></div>
                        <div><label>فکس</label><input type="text" name="fax" class="form-input w-full"></div>
                        <div><label>تلفن ۱</label><input type="text" name="phone1" class="form-input w-full"></div>
                        <div><label>تلفن ۲</label><input type="text" name="phone2" class="form-input w-full"></div>
                        <div><label>تلفن ۳</label><input type="text" name="phone3" class="form-input w-full"></div>
                        <div><label>ایمیل</label><input type="email" name="email" class="form-input w-full"></div>
                        <div><label>وب سایت</label><input type="text" name="website" class="form-input w-full"></div>
                    </div>
                </div>
                {{-- حساب بانکی --}}
                <div class="tab-panel" data-tab="bank">
                    <div id="bankAccounts">
                        <div class="flex gap-4 mb-2">
                            <input type="text" name="banks[0][bank]" placeholder="بانک" class="form-input flex-1">
                            <input type="text" name="banks[0][account]" placeholder="شماره حساب" class="form-input flex-1">
                            <input type="text" name="banks[0][card]" placeholder="شماره کارت" class="form-input flex-1">
                            <input type="text" name="banks[0][sheba]" placeholder="شبا" class="form-input flex-1">
                        </div>
                    </div>
                    <button type="button" id="addBankBtn" class="bg-primary text-white px-3 py-1 rounded mt-2">افزودن حساب بانکی</button>
                </div>
                {{-- سایر --}}
                <div class="tab-panel" data-tab="other">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label>تاریخ تولد</label>
                            <input type="date" name="birthday" class="form-input w-full">
                        </div>
                        <div>
                            <label>تاریخ ازدواج</label>
                            <input type="date" name="marriage_date" class="form-input w-full">
                        </div>
                        <div>
                            <label>تاریخ عضویت</label>
                            <div class="flex gap-2">
                                <input type="date" name="join_date" id="join_date" class="form-input w-full">
                                <button type="button" class="bg-accent text-white px-3 rounded" onclick="setToday('join_date')">امروز</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- دکمه ثبت --}}
        <div class="text-center mt-6">
            <button type="submit" class="bg-primary text-white font-bold py-3 px-8 rounded-lg shadow hover:bg-accent transition">ثبت شخص</button>
        </div>
    </form>
</div>

{{-- پاپ‌آپ افزودن دسته‌بندی --}}
<div id="categoryModal" class="hidden fixed top-0 right-0 left-0 bottom-0 bg-black/40 z-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-8 w-96">
        <h3 class="text-lg font-bold mb-3">افزودن دسته‌بندی جدید</h3>
        <form id="categoryForm">
            <input type="text" id="newCategoryTitle" class="form-input w-full mb-3" placeholder="عنوان دسته‌بندی جدید">
            <div class="flex justify-between">
                <button type="button" onclick="submitCategory()" class="bg-primary text-white px-4 py-2 rounded">ثبت</button>
                <button type="button" onclick="closeCategoryModal()" class="bg-gray-300 px-4 py-2 rounded">انصراف</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="../js/person-create.js"></script>
@endsection
