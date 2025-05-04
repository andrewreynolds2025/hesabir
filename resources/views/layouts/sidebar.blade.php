<aside class="sidebar">
    <button class="toggle-btn" id="sidebar-toggle" title="باز/بستن سایدبار">
        <i class="fa fa-bars"></i>
    </button>
    <div class="logo">حسابیر</div>
    <ul>
        <li class="menu-item">
            <a href="/dashboard" class="menu-link {{ request()->is('dashboard') ? 'active' : '' }}">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="menu-text">داشبورد</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu">
                <span class="icon"><i class="fa fa-user-friends"></i></span>
                <span class="menu-text">اشخاص</span>
                <span class="icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">شخص جدید</a>
                <a href="#" class="submenu-link">اشخاص</a>
                <a href="#" class="submenu-link">لیست دریافت ها</a>
                <a href="#" class="submenu-link">لیست پرداخت ها</a>
                <a href="#" class="submenu-link">سهامداران</a>
                <a href="#" class="submenu-link">فروشندگان</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu">
                <span class="icon"><i class="fa fa-boxes"></i></span>
                <span class="menu-text">کالاها و خدمات</span>
                <span class="icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">کالای جدید</a>
                <a href="#" class="submenu-link">خدمات جدید</a>
                <a href="#" class="submenu-link">کالاها و خدمات</a>
                <a href="#" class="submenu-link">به روز رسانی لیست قیمت</a>
                <a href="#" class="submenu-link">چاپ بارکد</a>
                <a href="#" class="submenu-link">چاپ بارکد تعدادی</a>
                <a href="#" class="submenu-link">صفحه لیست قیمت کالا</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu">
                <span class="icon"><i class="fa fa-university"></i></span>
                <span class="menu-text">بانکداری</span>
                <span class="icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">بانک ها</a>
                <a href="#" class="submenu-link">صندوق ها</a>
                <a href="#" class="submenu-link">تنخواه گردان ها</a>
                <a href="#" class="submenu-link">انتقال</a>
                <a href="#" class="submenu-link">لیست انتقال ها</a>
                <a href="#" class="submenu-link">لیست چک های دریافتی</a>
                <a href="#" class="submenu-link">لیست چک های پرداختی</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu">
                <span class="icon"><i class="fa fa-chart-line"></i></span>
                <span class="menu-text">فروش و درآمد</span>
                <span class="icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">فروش جدید</a>
                <a href="#" class="submenu-link">فاکتور سریع</a>
                <a href="#" class="submenu-link">برگشت از فروش</a>
                <a href="#" class="submenu-link">فاکتورهای فروش</a>
                <a href="#" class="submenu-link">فاکتورهای برگشت از فروش</a>
                <a href="#" class="submenu-link">درآمد</a>
                <a href="#" class="submenu-link">لیست درآمدها</a>
                <a href="#" class="submenu-link">قرارداد فروش اقساطی</a>
                <a href="#" class="submenu-link">لیست فروش اقساطی</a>
                <a href="#" class="submenu-link">اقلام تخفیف دار</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu">
                <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                <span class="menu-text">خرید و هزینه</span>
                <span class="icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">خرید جدید</a>
                <a href="#" class="submenu-link">برگشت از خرید</a>
                <a href="#" class="submenu-link">فاکتورهای خرید</a>
                <a href="#" class="submenu-link">فاکتورهای برگشت از خرید</a>
                <a href="#" class="submenu-link">هزینه</a>
                <a href="#" class="submenu-link">لیست هزینه ها</a>
                <a href="#" class="submenu-link">ضایعات</a>
                <a href="#" class="submenu-link">لیست ضایعات</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu">
                <span class="icon"><i class="fa fa-warehouse"></i></span>
                <span class="menu-text">انبارداری</span>
                <span class="icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">انبارها</a>
                <a href="#" class="submenu-link">حواله جدید</a>
                <a href="#" class="submenu-link">رسید و حواله های انبار</a>
                <a href="#" class="submenu-link">موجودی کالا</a>
                <a href="#" class="submenu-link">موجودی تمامی انبارها</a>
                <a href="#" class="submenu-link">انبار گردانی</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu">
                <span class="icon"><i class="fa fa-balance-scale"></i></span>
                <span class="menu-text">حسابداری</span>
                <span class="icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">سند جدید</a>
                <a href="#" class="submenu-link">لیست اسناد</a>
                <a href="#" class="submenu-link">تراز افتتاحیه</a>
                <a href="#" class="submenu-link">بستن سال مالی</a>
                <a href="#" class="submenu-link">جدول حساب ها</a>
                <a href="#" class="submenu-link">تجمیع اسناد</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link has-submenu">
                <span class="icon"><i class="fa fa-ellipsis-h"></i></span>
                <span class="menu-text">سایر</span>
                <span class="icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <div class="submenu">
                <a href="#" class="submenu-link">آرشیو</a>
                <a href="#" class="submenu-link">پنل پیامک</a>
                <a href="#" class="submenu-link">استعلام</a>
                <a href="#" class="submenu-link">دریافت سایر</a>
                <a href="#" class="submenu-link">لیست دریافت ها</a>
                <a href="#" class="submenu-link">پرداخت سایر</a>
                <a href="#" class="submenu-link">لیست پرداخت ها</a>
                <a href="#" class="submenu-link">سند تسعیر ارز</a>
                <a href="#" class="submenu-link">سند توازن اشخاص</a>
                <a href="#" class="submenu-link">سند توازن کالاها</a>
                <a href="#" class="submenu-link">سند حقوق</a>
            </div>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <span class="icon"><i class="fa fa-chart-pie"></i></span>
                <span class="menu-text">گزارش ها</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <span class="icon"><i class="fa fa-cog"></i></span>
                <span class="menu-text">تنظیمات</span>
            </a>
        </li>
    </ul>
</aside>
