$("#nick").change(function() {
  $.post(
    "ajax_validacion_nick.php", {
      nick:$("#nick").val(),
      beforeSend: function() {
        $(".validacion").html("Espera un momento por favor");
      }
    }, function(resp) {
      $(".validacion").html(resp);
    }
  )
});

$("#btn_guardar").hide();

$("#pass2").change(function() {
  if ($("#pass1").val() != $("#pass2").val()) {
    swal("ERROR!!!",
         "Las contraseñas no coinciden",
         "error");
  } else {
    $("#btn_guardar").show();
  }
});

$(".form").keypress(function(e) {
  if (e.which === 13) {
    return false;
  }
});

$(".link_block").on("click", function() {
  swal("AVISO!!",
       "Bloqueo!!",
       "success");
});
