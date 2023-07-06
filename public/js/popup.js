var btn= document.getElementById("btn");
var overlay = document.getElementById("overlay");
var btnClose =document.getElementById("btnClose");

btn.addEventListener("click",openModal);

function openModal(){
    overlay.style.display="block";
}

btnClose.addEventListener('click',closePopup);
function closePopup(){
    overlay.style.display="none";
}