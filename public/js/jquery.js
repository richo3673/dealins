function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function huFunction() {
    $(".pop").toggle();
}
function huFunction2() {
    $(".pop2").toggle();
}
function huFunction3() {
    $(".pop3").toggle();
}
window.onclick = function (event) {
    if (!event.target.matches('i')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        var hide = document.getElementById("file-ip-hide");
        preview.src = src;
        preview.style.display = "block";
        hide.src = src;
        hide.style.display = "none";
    }
}

function myFunction2(){
    const targetDiv = document.getElementById("one");
    const btn = document.getElementById("btn");
    btn.onclick = function () {
        if (targetDiv.style.display !== "none") {
            targetDiv.style.display = "none";
        } else {
            targetDiv.style.display = "block";
        }
    };
}



