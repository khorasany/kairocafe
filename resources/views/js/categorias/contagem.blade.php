<script type="text/javascript">


  function contagemCategorias() {
    $.ajax({
      url: '{{ route("getCategoriasTotal") }}',
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {
        $('#categoriasContagem').text(data['categorias']);
      }
    });
  }

  contagemCategorias()


</script>