<script type="text/javascript">
  function carregarSelect1() {
    $('#prodCategorias').append($('<option>').text("Carregando...").attr('value', "0"));
    $('#prodCategorias').removeAttr('disabled');

    $.ajax({
      url: '{{ route("getCategorias") }}',
      type: 'GET',
      dataType: 'json',
      success: function( data ) {
        $('#prodCategorias').empty()
        $('#prodCategorias').append($('<option>').text("Selecione a categoria").attr('value', "sem_categoria"));
        $.each(data['aaData'], function(index, value) {
         $('#prodCategorias').append($('<option>').text(value.nome).attr('value', value.id));
        });
         }
    });
  }


  carregarSelect1()


  </script>