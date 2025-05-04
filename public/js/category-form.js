// راه‌اندازی آیکون‌پیکر
document.addEventListener('DOMContentLoaded', function () {
    // Iconpicker
    const iconBtn = document.getElementById('iconpicker-btn');
    const iconInput = document.getElementById('icon-input');
    const selectedIcon = document.getElementById('selected-icon');
    let currentIcon = iconInput.value || 'fa-solid fa-box';
    selectedIcon.innerHTML = `<i class="${currentIcon}"></i>`;

    new Iconpicker(iconBtn, {
        icons: [
            'fa-solid fa-box', 'fa-solid fa-cube', 'fa-solid fa-sitemap', 'fa-solid fa-tshirt',
            'fa-solid fa-tv', 'fa-solid fa-mobile-alt', 'fa-solid fa-laptop', 'fa-solid fa-tools',
            'fa-solid fa-tag', 'fa-solid fa-archive', 'fa-solid fa-bolt', 'fa-solid fa-book',
            'fa-solid fa-car', 'fa-solid fa-couch', 'fa-solid fa-leaf', 'fa-solid fa-heart',
            'fa-solid fa-apple-alt', 'fa-solid fa-paint-brush'
        ],
        showSelectedIn: iconBtn,
        selectedClass: 'btn-success',
        hideOnSelect: true,
        placement: 'bottom',
    })
    .on('iconpicker.select', function({iconpicker, icon}) {
        iconInput.value = icon;
        selectedIcon.innerHTML = `<i class="${icon}"></i>`;
    });

    // تصویر دسته‌بندی - درگ و دراپ و ویرایش
    const dropzone = document.getElementById('category-dropzone');
    const imgInput = document.getElementById('category-img-input');
    const imgPreview = document.getElementById('category-img-preview');

    dropzone.addEventListener('click', e => {
        imgInput.click();
    });
    dropzone.addEventListener('dragover', e => {
        e.preventDefault();
        dropzone.classList.add('dragover');
    });
    dropzone.addEventListener('dragleave', e => {
        dropzone.classList.remove('dragover');
    });
    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        dropzone.classList.remove('dragover');
        if(e.dataTransfer.files && e.dataTransfer.files[0]) {
            imgInput.files = e.dataTransfer.files;
            showPreview(e.dataTransfer.files[0]);
        }
    });
    imgInput.addEventListener('change', function(e) {
        if(this.files && this.files[0]) {
            showPreview(this.files[0]);
        }
    });
    function showPreview(file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            imgPreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
