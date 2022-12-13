const modalButton = document.getElementById("add-product-btn")
const modal = document.getElementById("modal")
const addProductForm = document.getElementById("add-product-form")
const overlay = document.getElementById("overlay")
const OKBtn = document.getElementById("ok-btn")
const nameInput = document.getElementById("name")
const weightInput = document.getElementById("weight")
const priceInput = document.getElementById("price")
const stock = document.getElementById("stock")
const uploadBtn = document.querySelector(".upload-btn")
const ImageInput = document.querySelector("#image")
const displayName = document.querySelector("#display-image")

modalButton.addEventListener("click", () => {
    modal.style.display = 'block';
    overlay.style.display = 'block';
    modal.classList.add("modal-open");
    overlay.classList.add("overlay-open");
});

OKBtn.addEventListener("click", () => {
    addProductForm.submit();
})

overlay.addEventListener("click", (e) => {
    console.log("click on overlay");
    if (e.target === overlay){
        closeModal();
    }
});

function closeModal(){
    overlay.classList.remove("overlay-open");
    modal.classList.remove("modal-open");
    modal.classList.add("modal-close");
    overlay.classList.add("overlay-close");
    setTimeout(() => {
        modal.style.display = 'none';
        overlay.style.display = 'none';
        modal.classList.remove("modal-close");
        overlay.classList.remove("overlay-close");
    }, 200)
}

uploadBtn.addEventListener("click", () => {
    ImageInput.click()
})

ImageInput.addEventListener("change", function (){
    if(this.files && this.files.length > 0) {
        displayName.innerHTML = this.files[0].name
    }
})