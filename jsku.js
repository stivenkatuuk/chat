feather.replace();

var element = document.getElementById("msg");
var txtTanya = $("#txtTanya");

element.scrollTop = element.scrollHeight;

$("#btnTanya").click(function(){
    $("#msg").append(balonChat("tanya",txtTanya.val()));
    jawab(txtTanya.val());
    txtTanya.val("");
    element.scrollTop = element.scrollHeight;
});

$("#txtTanya").keypress(function(key){
    if(key.which==13){    
        $("#msg").append(balonChat("tanya",txtTanya.val()));
        jawab(txtTanya.val());
        txtTanya.val("");
        element.scrollTop = element.scrollHeight;
        
        return false;
    }
});

function balonChat(typeChat,text){
    if(typeChat=="tanya"){
        result = "<div class='wrap-msg float-right w-100 text-right'><div class='msgbox bg-primary text-white p-2 rounded shadow-sm'>"+text+"</div></div>";
        return result;
    }else if(typeChat=="jawab"){
        result = "<div class='wrap-msg float-left w-100 text-left'><div class='msgbox bg-light text-dark p-2 rounded shadow-sm'>"+text+"</div></div>";
        return result;
    }
}

function jawab(tanya){
    $.ajax({
        type:"POST",
        url:"proses.php",
        data:{"txtTanya":tanya},
        success:function(msg){
            $("#msg").append(balonChat("jawab",msg));

            element.scrollTop = element.scrollHeight;
        }
    });
}