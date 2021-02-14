var x = 1;

function cek(){
    $.ajax({
        url: "ceknotif.php",
        cache: false,
        success: function(msg){
            $("#notif").html(msg);
        }
    });
    var waktu = setTimeout("cek()",3000);
}

$(document).ready(function(){
    cek();
});


