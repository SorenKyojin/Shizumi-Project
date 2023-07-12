window.onload = function(){
    var menuVisible = 0;
}
function menuToggle() {
    if (menuVisible == 1) {
        menuVisible = 0;
        document.getElementById(menu).style.visibility = hidden;
    }
    else{
        menuVisible = 1;
        document.getElementById(menu).style.visibility = visible;
    }
}