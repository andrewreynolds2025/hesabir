@php
$user = Auth::user();
@endphp
<aside class="sidebar" id="sidebar">
    <button class="toggle-btn" id="sidebar-toggle" title="باز/بستن سایدبار">
        <i class="fa fa-bars"></i>
    </button>
    <div class="logo" id="sidebar-logo">حسابیر</div>
    @if($user)
        <div class="user-info" id="sidebar-user">
            <img src="{{ $user->profile_photo_url ?? 'images/default-avatar.png' }}" alt="آواتار کاربر">
            <div class="name">{{ $user->name }}</div>
        </div>
    @endif
    <ul>
        <li class="menu-item">
            <a href="/dashboard" class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="menu-text">داشبورد</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu" data-submenu="people">
                <span class="icon"><i class="fa fa-user-friends"></i></span>
                <span class="menu-text">اشخاص</span>
                <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu" id="submenu-people">
                <a href="/persons/create" class="submenu-link {{ request()->is('persons/create') ? 'active' : '' }}">
                    <i class="fa fa-user-plus ml-2"></i>
                    شخص جدید
                </a>
                <a href="/persons" class="submenu-link {{ request()->is('persons') ? 'active' : '' }}">
                    <i class="fa fa-users ml-2"></i>
                    لیست اشخاص
                </a>
                <a href="/receipts" class="submenu-link">
                    <i class="fa fa-credit-card ml-2"></i>
                    لیست دریافت ها
                </a>
                <a href="/payments" class="submenu-link">
                    <i class="fa fa-money-bill ml-2"></i>
                    لیست پرداخت ها
                </a>
                <a href="/shareholders" class="submenu-link">
                    <i class="fa fa-chart-pie ml-2"></i>
                    سهامداران
                </a>
                <a href="/suppliers" class="submenu-link">
                    <i class="fa fa-truck ml-2"></i>
                    فروشندگان
                </a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu" data-submenu="goods">
                <span class="icon"><i class="fa fa-boxes"></i></span>
                <span class="menu-text">کالاها و خدمات</span>
                <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu" id="submenu-goods">
                <a href="/products/create" class="submenu-link">
                    <i class="fa fa-plus ml-2"></i>
                    کالای جدید
                </a>
                <a href="/services/create" class="submenu-link">
                    <i class="fa fa-plus ml-2"></i>
                    خدمات جدید
                </a>
                <a href="/products" class="submenu-link">
                    <i class="fa fa-box ml-2"></i>
                    کالاها و خدمات
                </a>
                <a href="/pricelists/update" class="submenu-link">
                    <i class="fa fa-sync ml-2"></i>
                    به روز رسانی لیست قیمت
                </a>
                <a href="/barcodes/print" class="submenu-link">
                    <i class="fa fa-barcode ml-2"></i>
                    چاپ بارکد
                </a>
                <a href="/barcodes/print-multi" class="submenu-link">
                    <i class="fa fa-barcode ml-2"></i>
                    چاپ بارکد تعدادی
                </a>
                <a href="/pricelists" class="submenu-link">
                    <i class="fa fa-list-ul ml-2"></i>
                    لیست قیمت کالا
                </a>
                <a href="/categories/create" class="submenu-link">
                    <i class="fa fa-sitemap ml-2"></i>
                    دسته بندی
                </a>
                <a href="/categories-list" class="submenu-link">
                    <i class="fa fa-sitemap ml-2"></i>
                    لیست دسته‌بندی‌ها
                </a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu" data-submenu="banking">
                <span class="icon"><i class="fa fa-university"></i></span>
                <span class="menu-text">بانکداری</span>
                <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu" id="submenu-banking">
                <a href="/banks" class="submenu-link">بانک ها</a>
                <a href="/funds" class="submenu-link">صندوق ها</a>
                <a href="/pettycashes" class="submenu-link">تنخواه گردان ها</a>
                <a href="/transfers/create" class="submenu-link">انتقال</a>
                <a href="/transfers" class="submenu-link">لیست انتقال ها</a>
                <a href="/cheques/received" class="submenu-link">لیست چک های دریافتی</a>
                <a href="/cheques/paid" class="submenu-link">لیست چک های پرداختی</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu" data-submenu="sales">
                <span class="icon"><i class="fa fa-chart-line"></i></span>
                <span class="menu-text">فروش و درآمد</span>
                <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu" id="submenu-sales">
                <a href="/sales/create" class="submenu-link">فروش جدید</a>
                <a href="/sales/quick-invoice" class="submenu-link">فاکتور سریع</a>
                <a href="/sales/returns/create" class="submenu-link">برگشت از فروش</a>
                <a href="/sales/invoices" class="submenu-link">فاکتورهای فروش</a>
                <a href="/sales/returns" class="submenu-link">فاکتورهای برگشت از فروش</a>
                <a href="/revenues/create" class="submenu-link">درآمد</a>
                <a href="/revenues" class="submenu-link">لیست درآمدها</a>
                <a href="/installment-contracts/create" class="submenu-link">قرارداد فروش اقساطی</a>
                <a href="/installment-contracts" class="submenu-link">لیست فروش اقساطی</a>
                <a href="/sales/discounted-items" class="submenu-link">اقلام تخفیف دار</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu" data-submenu="purchase">
                <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                <span class="menu-text">خرید و هزینه</span>
                <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu" id="submenu-purchase">
                <a href="/purchases/create" class="submenu-link">خرید جدید</a>
                <a href="/purchases/returns/create" class="submenu-link">برگشت از خرید</a>
                <a href="/purchases/invoices" class="submenu-link">فاکتورهای خرید</a>
                <a href="/purchases/returns" class="submenu-link">فاکتورهای برگشت از خرید</a>
                <a href="/expenses/create" class="submenu-link">هزینه</a>
                <a href="/expenses" class="submenu-link">لیست هزینه ها</a>
                <a href="/wastes/create" class="submenu-link">ضایعات</a>
                <a href="/wastes" class="submenu-link">لیست ضایعات</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu" data-submenu="warehouse">
                <span class="icon"><i class="fa fa-warehouse"></i></span>
                <span class="menu-text">انبارداری</span>
                <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu" id="submenu-warehouse">
                <a href="/warehouses" class="submenu-link">انبارها</a>
                <a href="/warehouse-transfers/create" class="submenu-link">حواله جدید</a>
                <a href="/warehouse-transfers" class="submenu-link">رسید و حواله های انبار</a>
                <a href="/stocks" class="submenu-link">موجودی کالا</a>
                <a href="/stocks/all" class="submenu-link">موجودی تمامی انبارها</a>
                <a href="/stocktakings/create" class="submenu-link">انبار گردانی</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu" data-submenu="accounting">
                <span class="icon"><i class="fa fa-balance-scale"></i></span>
                <span class="menu-text">حسابداری</span>
                <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu" id="submenu-accounting">
                <a href="/vouchers/create" class="submenu-link">سند جدید</a>
                <a href="/vouchers" class="submenu-link">لیست اسناد</a>
                <a href="/opening-balances" class="submenu-link">تراز افتتاحیه</a>
                <a href="/financial-year/close" class="submenu-link">بستن سال مالی</a>
                <a href="/accounts/table" class="submenu-link">جدول حساب ها</a>
                <a href="/vouchers/aggregate" class="submenu-link">تجمیع اسناد</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu" data-submenu="others">
                <span class="icon"><i class="fa fa-ellipsis-h"></i></span>
                <span class="menu-text">سایر</span>
                <span class="submenu-arrow"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu" id="submenu-others">
                <a href="/archive" class="submenu-link">آرشیو</a>
                <a href="/sms-panel" class="submenu-link">پنل پیامک</a>
                <a href="/inquiry" class="submenu-link">استعلام</a>
                <a href="/other-receipts/create" class="submenu-link">دریافت سایر</a>
                <a href="/other-receipts" class="submenu-link">لیست دریافت ها</a>
                <a href="/other-payments/create" class="submenu-link">پرداخت سایر</a>
                <a href="/other-payments" class="submenu-link">لیست پرداخت ها</a>
                <a href="/currency-conversion" class="submenu-link">سند تسعیر ارز</a>
                <a href="/persons/balance" class="submenu-link">سند توازن اشخاص</a>
                <a href="/products/balance" class="submenu-link">سند توازن کالاها</a>
                <a href="/salary-vouchers" class="submenu-link">سند حقوق</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="/reports" class="menu-link">
                <span class="icon"><i class="fa fa-chart-pie"></i></span>
                <span class="menu-text">گزارش ها</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="/settings" class="menu-link">
                <span class="icon"><i class="fa fa-cog"></i></span>
                <span class="menu-text">تنظیمات</span>
            </a>
        </li>
    </ul>
</aside>
