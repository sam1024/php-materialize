    </main>
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/materialize/materialize.min.js"></script>
    <script type="text/javascript" src="/sweetalert2/sweetalert2.min.js"></script>
    <script type="text/javascript">
      $("#buscar").keyup(function(e) {
        var contenido = new RegExp($(this).val(), 'i');
        $("tr").hide();
        $("tr").filter(function() {
          return contenido.test($(this).text());
        }).show();
        $(".cabecera").attr("style", "");
      });

      $(".button-collapse").sideNav();
      function may(obj, id) {
        obj = obj.toUpperCase();
        document.getElementById(id).value = obj;
      }
      $('select').material_select();
    </script>
