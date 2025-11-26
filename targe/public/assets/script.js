$(document).ready(function(){ 
    $("form").submit(function(){ 
        if($("input[name='title']").val().trim() === ""){ 
            alert("El título es obligatorio"); 
            return false; 
        } 
    }); 
});