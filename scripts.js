document.addEventListener('DOMContentLoaded', function () {
    var menuIcon = document.getElementById('menu-icon');
    var sidebar = document.getElementById('sidebar');

    menuIcon.addEventListener('click', function () {
        sidebar.classList.toggle('active');
    });
});
