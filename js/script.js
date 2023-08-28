document.addEventListener('DOMContentLoaded', function() {
    var sideBarIsOpen = true;

    var toogleBtn = document.getElementById('toogleBtn');
    var dashboard_sidebar = document.getElementById('dashboard_sidebar');
    var dashboard_content_container = document.getElementById('dashboard_content_container');
    var logotelecom = document.querySelector('.logotelecom');
    var userImage = document.getElementById('userImage');
    var menuIcons = document.getElementsByClassName('menuText');

    toogleBtn.addEventListener('click', function(event) {
        event.preventDefault();
        if (sideBarIsOpen) {
            dashboard_sidebar.style.width = '10%';
            dashboard_sidebar.style.transition='0.4s all';
            dashboard_content_container.style.width = '90%';
            logotelecom.style.fontSize = '60px';
            userImage.style.width = '60px';
            for (var i = 0; i < menuIcons.length; i++) {
                menuIcons[i].style.display = 'none';
            }
            document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'center';
            sideBarIsOpen = false;
        } else {
            dashboard_sidebar.style.width = '20%';
           
            dashboard_content_container.style.width = '80%';
            logotelecom.style.fontSize = '80px';
            userImage.style.width = '80px';
            for (var i = 0; i < menuIcons.length; i++) {
                menuIcons[i].style.display = 'inline-block';
            }
            document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'left';
            sideBarIsOpen = true;
        }
    });
});
