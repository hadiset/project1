$(document).ready(function(){
    $(".iCheck-helper").click(function(){
        // event.preventDefault();
        //alert("Berhasil");
        $("button").prop('disabled', function(i, v) { return !v;alert(i);alert(v) });
    });
});

// $(".icheck").click(function(){
//     alert("Berhasil");
// });