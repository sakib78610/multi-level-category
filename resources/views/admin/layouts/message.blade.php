<script>
            @if (Session::get('success'))
              swal({
                    title: "{{ session('success') }}",
                    icon: "success",
                    button: "Close",
                    timer: 1500,
                  });
            @endif
            
            @if (Session::get('error'))
              swal({
                    title: "{{ session('error') }}",
                    icon: "error",
                    button: "Close",
                  });
            @endif

            @if (Session::get('info'))
                swal({
                    title: "",
                    html: "<p style='color:#00c0ef'>{{ Session::get('info') }}</p>",
                    timer: 4000,
                    showConfirmButton: true,
                    type: "info",
                    confirmButtonColor: "#31ce8b"
                               }).then(function(){
                window.location.reload(window.location.href);
                 
                });
            @endif

            @if (Session::get('warning'))
                swal({
                    title: "",
                    html: "<p style='color:#f39c12'>{{ Session::get('warning') }}</p>",
                    timer: 4000,
                    showConfirmButton: true,
                    type: "warning",
                    confirmButtonColor: "#31ce8b"
                                }).then(function(){
                 window.location.reload(window.location.href);
                 
                 });
            @endif
             
</script>

   