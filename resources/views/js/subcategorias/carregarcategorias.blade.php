<script type="text/javascript">


  function carregarCategoriasSub() {
    $.ajax({
      url: '{{ route("getCategorias") }}',
      type: 'GET',
      dataType: 'json',
      success: function( data ) {
        $('#categoriasListaSub').empty()
        $.each(data['aaData'], function(index, value) {
         $('#categoriasListaSub').append($('<option>').text(value.nome).attr('value', value.id));
        });
         }
    });
  }



  </script>