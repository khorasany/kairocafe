<script type="text/javascript">
  $('#prodCategorias').on('change', function() {
    $('#prodSubCategorias').append($('<option>').text("Carregando...").attr('value', "0"));
    $('#prodSubCategorias').removeAttr('disabled');
    var catID = this.value;

    $.ajax({
      url: '{{ route("getSubCategorias") }}/'+catID,
      type: 'GET',
      dataType: 'json',
      success: function( data ) {
        if (data['resultados'] >= 1) {
          $('#prodSubCategorias').empty()
          $('#prodSubCategorias').append($('<option>').text("Selecione a sub categoria").attr('value', "sem_subcategoria"));
          $.each(data['aaData'], function(index, value) {
           $('#prodSubCategorias').append($('<option>').text(value.nome).attr('value', value.id));
         });
        } else {
          $('#prodSubCategorias').empty()
          $('#prodSubCategorias').attr('disabled', 'disabled');
          $('#prodSubCategorias').append($('<option>').text("Não existem sub categorias").attr('value', "sem_subcategoria"));
        }
      }
    });
  });







  $('#eprodCategorias').on('change', function() {
    $('#eprodSubCategorias').append($('<option>').text("Carregando...").attr('value', "0"));
    $('#eprodSubCategorias').removeAttr('disabled');
    var catID = this.value;

    $.ajax({
      url: '{{ route("getSubCategorias") }}/'+catID,
      type: 'GET',
      dataType: 'json',
      success: function( data ) {
        if (data['resultados'] >= 1) {
          $('#eprodSubCategorias').empty()
          $('#eprodSubCategorias').append($('<option>').text("Selecione a sub categoria").attr('value', "sem_subcategoria"));
          $.each(data['aaData'], function(index, value) {
           $('#eprodSubCategorias').append($('<option>').text(value.nome).attr('value', value.id));
         });
        } else {
          $('#eprodSubCategorias').empty()
          $('#eprodSubCategorias').attr('disabled', 'disabled');
          $('#eprodSubCategorias').append($('<option>').text("Não existem sub categorias").attr('value', "sem_subcategoria"));
        }
      }
    });
  });



</script>