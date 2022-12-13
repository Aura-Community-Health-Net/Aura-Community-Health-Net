const modalButton1 = document.getElementById("delete_button");
const modal1 = document.getElementById("modal1");
const overlay1 = document.getElementById("overlay1");

modalButton1.addEventListener("click", () => {
    modal1.style.display = "block";
    overlay1.style.display = "block";
    modal1.classList.add("modal-open");

});
