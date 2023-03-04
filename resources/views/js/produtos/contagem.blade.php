<script type="text/javascript">

  function contagemProdutos() {
    $.ajax({
      url: '{{ route("getProdutosTotal") }}',
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {
        $('#produtosContagem').text(data['produtos']);
      }
    });
  }

  contagemProdutos();


</script>