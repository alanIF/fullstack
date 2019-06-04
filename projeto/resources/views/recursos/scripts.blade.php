@section('js')
 <script>
  function confirmar(){
    // só permitirá o envio se o usuário responder OK
    var resposta = window.confirm("Deseja mesmo" + 
                   " excluir este registro?");
    if(resposta)
      return true;
    else
      return false; 
  }
</script>

 <script>
    $(document).ready( function () {
        $('#example1').DataTable();
        } );
        $(document).ready( function () {
        $('#example2').DataTable();
        } );
        $(document).ready( function () {
        $('#example3').DataTable();
        } );
        
    </script>
   
    
 @stop