document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebar-toggle');
    const submenuHeaders = document.querySelectorAll('.menu-link.has-submenu');
    let openSubmenu = null;

    // باز و بسته کردن سایدبار
    toggleBtn.addEventListener('click', function () {
        sidebar.classList.toggle('collapsed');
    });

    // آکاردئونی زیرمنوها با چرخش فلش
    submenuHeaders.forEach(header => {
        header.setAttribute('aria-expanded', 'false');
        header.addEventListener('click', function (e) {
            e.preventDefault();
            // بستن زیرمنوی قبلی
            if (openSubmenu && openSubmenu !== this) {
                openSubmenu.setAttribute('aria-expanded', 'false');
                openSubmenu.nextElementSibling.classList.remove('open');
            }
            // باز کردن فعلی
            const submenu = this.nextElementSibling;
            if (submenu.classList.contains('open')) {
                submenu.classList.remove('open');
                this.setAttribute('aria-expanded', 'false');
                openSubmenu = null;
            } else {
                submenu.classList.add('open');
                this.setAttribute('aria-expanded', 'true');
                openSubmenu = this;
            }
        });
    });
});
