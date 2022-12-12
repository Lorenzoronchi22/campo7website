
function setDurata(id){
    ora = document.getElementById("ora").value;
    if(ora == 22){
        document.getElementById("id").max = 1;
        document.getElementById("id").value = 1;
    }else{
        document.getElementById("id").max = 2;
    }
}