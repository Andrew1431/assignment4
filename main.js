function getPart() {
    var rhttp = new XMLHttpRequest();
    rhttp.onreadystatechange = function() {
        if (rhttp.readyState == 4 && rhttp.status == 200) {
            document.getElementById("dynamic").innerHTML = rhttp.responseText;
        }
    }
    rhttp.open("GET", "part.php", true);
    console.log("hi mom!");
    rhttp.send();
}