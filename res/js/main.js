$('#menu button').on('click', function(event) {
    if (!$(this).hasClass('active')) {
        $('#menu button').removeClass('active');
        $(this).addClass('active');

        switch($(this).attr('id')) {
            case "parts":
                getPart();
                break;
            case "vendors":
                getVendor();
                break;
            case "edit":
                break;
            case "reset":
                break;
        }
    } else {
        $('#menu button').removeClass('active');
        $('#dynamic')[0].innerHTML = "";
    }
});

function getPart() {
    var rhttp = new XMLHttpRequest();
    rhttp.onreadystatechange = function() {
        if (rhttp.readyState == 4 && rhttp.status == 200) {
            document.getElementById("dynamic").innerHTML = rhttp.responseText;

        }
    }
    rhttp.open("GET", "res/php/part.php", true);
    rhttp.send();
}

function getVendor() {
    var rhttp = new XMLHttpRequest();
    rhttp.onreadystatechange = function() {
        if (rhttp.readyState == 4 && rhttp.status == 200) {
            document.getElementById("dynamic").innerHTML = rhttp.responseText;

        }
    }
    rhttp.open("GET", "res/php/vendor.php", true);
    rhttp.send();
}