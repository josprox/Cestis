function registro() {
    document.getElementById('registro').style.display = 'block';
    document.getElementById('login').style.display = 'none';
    $('.active').removeClass("active");
    $("#mst").addClass("active");
}

function login() {
    document.getElementById('registro').style.display = 'none';
    document.getElementById('login').style.display = 'block';
    $('.active').removeClass("active");
    $("#alm").addClass("active");
}