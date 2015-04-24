// Ajax calls should always have the CSRF token attached to them, otherwise they won't work
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });