const popup = document.getElementById('pop');//popup menu
const popupclose = document.getElementById('closepop');//button to close popup
const openpopup = document.getElementById('check-button');//open popup
const closepop = document.getElementById('closepop');//close popup


function handleclicked(){
    popup.classList.add('open');
   
    popupclose.onclick = () =>{
        popup.classList.remove('open');
    }

}




