<script>
    $('.btn-delete').on('click',function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                var form = $(this).parents('form:first');
                form.submit();
            }
        })
    });
</script>
@if ($message = Session::get('sweetDelete'))
    <script>
        $(document).ready(function(){
            Swal.fire(
            'Deleted!',
            '<strong>{{ $message }}</strong>',
            'success'
            )
        });
    </script>
@endif