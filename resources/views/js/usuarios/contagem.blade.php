<script type="text/javascript">

  function contagemUsuarios() {
    $.ajax({
      url: '{{ route("getUsuariosTotal") }}',
      type: "GET",
      dataType: "json",
      async: false,
      success: function (data) {
        $('#usuariosContagem').text(data['usuarios']);
      }
    });
  }


</script>