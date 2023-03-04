<script type="text/javascript">


  function contagemSubCategorias() {
    $.ajax({
      url: '{{ route("getSubCategoriasTotal") }}',
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {
        $('#subcategoriasContagem').text(data['subcategorias']);
      }
    });
  }

  contagemSubCategorias()


</script>