let list = document.querySelectorAll('.db_btn');

for(let i=0 ; i<list.length ; i++)
{
    list[i].onclick = function () {
        let j=0;
        while (j<list.length)
        {
            list[j++].className = 'db_btn';
        }

        list[i].className = 'db_btn active';
    }
}


let menu_toggle = document.querySelector('.toggle_bar');
let Navigation = document.querySelector('.Navigation-pane');
menu_toggle.onclick = function()
{
    menu_toggle.classList.toggle('active');
    Navigation.classList.toggle('active');
}


