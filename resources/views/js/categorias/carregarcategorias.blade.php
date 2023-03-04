<script type="text/javascript">
  function carregarCategorias() {
    $.ajax({
      url: '{{ route("getCategorias") }}',
      type: 'GET',
      dataType: 'json',
      success: function( data ) {
        $('#categoriasLista').empty()
        $('#categoriasLista').append($('<option>').text("Selecione a categoria").attr('value', "0"));
        $.each(data['aaData'], function(index, value) {
         $('#categoriasLista').append($('<option>').text(value.nome).attr('value', value.id));
        });
         }
    });
  }


  carregarCategorias()


  </script>