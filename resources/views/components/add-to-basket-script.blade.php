@once
@push('scripts')
<script>
    $(document).ready(function () {
        $('.add-to-basket').click(function () {
            $.ajax({
                url: '/basket/'+$(this).attr('product'),
                type: 'PUT',
                data: {
                    'id': $(this).attr('product'),
                  '_token': '{{csrf_token()}}'
        },
            success: function(response) {
                $('#basket-button').text(response+' items in cart');
            }
        });
        })
    });
</script>
@endpush
@endonce
