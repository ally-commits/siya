let form = document.getElementById("form");
let profile = document.getElementById("profile");

let btn = document.getElementById("btn-click");
btn.addEventListener("click", () => {
    if(form.style.display == 'none') {
        form.style.display = 'block';
        profile.style.display = 'none';
    } else {
        form.style.display = 'none';
        profile.style.display = 'block';
    }
});

let btn2 = document.getElementById("btn-profile");
btn2.addEventListener("click", () => {
    if(form.style.display == 'none') {
        form.style.display = 'block';
        profile.style.display = 'none';
    } else {
        form.style.display = 'none';
        profile.style.display = 'block';
    }
});