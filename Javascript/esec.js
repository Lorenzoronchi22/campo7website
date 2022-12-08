
function setDurata(){
    ora = document.getElementById("ora").value;
    if(ora == 22){
        document.getElementById("durata").max = 1;
        document.getElementById("durata").value = 1;
    }else{
        document.getElementById("durata").max = 2;
    }
}
