document.addEventListener("DOMContentLoaded", function() {
    const hamburg = document.querySelector("#toggle-btn");

    hamburg.addEventListener("click", function(){
        document.querySelector("#sidebar").classList.toggle("expand");
    });
});
