let form_add = document.getElementById("form-add");
let form_hum = document.getElementById("form-hum");
let form_smena = document.getElementById("form-smena");

function all_smena(){

    form_smena.style.display ="block";
    form_hum.style.display ="none";
    form_add.style.display ="none";
    
}

function all_hum(){
    form_hum.style.display ="block";
    form_add.style.display ="none";
    form_smena.style.display ="none";
    
}


function add_hum(){
    form_add.style.display="block";
    form_smena.style.display ="none";
    form_hum.style.display ="none";
}

