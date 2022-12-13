// const modalButton = document.getElementById("reg-btn")
// const modal = document.getElementById("modal")
// const regForm = document.getElementById("reg-form")
// const overlay = document.getElementById("overlay")
// const OKBtn = document.getElementById("ok-btn")
const uploadBtn = document.querySelector(".upload-btn")
const profileImageInput = document.querySelector("#profilePic")
const displayName = document.querySelector("#display-image")

// modalButton.addEventListener("click", () => {
//     modal.style.display = 'block';
//     overlay.style.display = 'block';
//     modal.classList.add("modal-open");
//     overlay.classList.add("overlay-open");
// });
//
// OKBtn.addEventListener("click", () => {
//     regForm.submit();
// })
//
// overlay.addEventListener("click", (e) => {
//     console.log("click on overlay");
//     if (e.target === overlay){
//         closeModal();
//     }
// });
//
// function closeModal(){
//     overlay.classList.remove("overlay-open");
//     modal.classList.remove("modal-open");
//     modal.classList.add("modal-close");
//     overlay.classList.add("overlay-close");
//     setTimeout(() => {
//         modal.style.display = 'none';
//         overlay.style.display = 'none';
//         modal.classList.remove("modal-close");
//         overlay.classList.remove("overlay-close");
//     }, 200)
// }
//
//
// function getImage(imagename){
//     var newimg = imagename.replace(/^.*\\/,"");
//     $('#display-image').html(newimg);
// }

uploadBtn.addEventListener("click", () => {
    profileImageInput.click()
})

profileImageInput.addEventListener("change", function (){
    if(this.files && this.files.length > 0) {
        displayName.innerHTML = this.files[0].name
    }
})