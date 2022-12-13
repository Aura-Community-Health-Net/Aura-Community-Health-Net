const modalButton = document.getElementById("modalbutton");
const modal = document.getElementById("modal");
const overlay = document.getElementById("overlay");

modalButton.addEventListener("click", () => {
    modal.style.display = "block";
    overlay.style.display = "block";
    modal.classList.add("modal-open");

});

