
@if(Session::has('flash_message'))
  <script>
     swal({   title: " {{ Session::get('flash_message') }} ",   text: " هذه الرساله سوف تختفى بعد 2 ثانية ",   timer: 4000,   showConfirmButton: false });
  </script>
@endif
