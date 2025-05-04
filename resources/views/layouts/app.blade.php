<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>داشبورد | حسابیر</title>
    <link rel="stylesheet" href="/fonts/fonts.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-xs8dF..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: { fontFamily: { 'sans': ['AnjomanMax', 'Tahoma', 'sans-serif'] }, },
            rtl: true,
        }
    </script>
    <style>
        body { background: #f9fafb; }
    </style>
    @yield('head')
</head>
<body>
    @include('layouts.sidebar')
    <div class="main-content" id="main-content">
        @yield('content')
    </div>
    <script>
        // اسکریپت باز و بسته شدن سایدبار و اکاردئون
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.getElementById('sidebar-toggle');
            const submenuHeaders = document.querySelectorAll('.sidebar .menu-link.has-submenu');
            let openSubmenu = null;

            toggleBtn.addEventListener('click', function () {
                sidebar.classList.toggle('collapsed');
                document.getElementById('main-content').classList.toggle('sidebar-collapsed');
            });

            submenuHeaders.forEach(header => {
                header.addEventListener('click', function (e) {
                    e.preventDefault();
                    // بستن زیرمنوی قبلی
                    if (openSubmenu && openSubmenu !== this) {
                        openSubmenu.classList.remove('active');
                        openSubmenu.nextElementSibling.classList.remove('open');
                    }
                    // بازکردن فعلی
                    const submenu = this.nextElementSibling;
                    if (submenu.classList.contains('open')) {
                        submenu.classList.remove('open');
                        this.classList.remove('active');
                        openSubmenu = null;
                    } else {
                        submenu.classList.add('open');
                        this.classList.add('active');
                        openSubmenu = this;
                    }
                });
            });
            // فعال کردن زیرمنوی جاری طبق url
            const links = document.querySelectorAll('.submenu-link');
            links.forEach(link => {
                if (window.location.pathname === link.getAttribute('href')) {
                    link.classList.add('active');
                    const submenu = link.closest('.submenu');
                    if (submenu) {
                        submenu.classList.add('open');
                        submenu.previousElementSibling.classList.add('active');
                        openSubmenu = submenu.previousElementSibling;
                    }
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
