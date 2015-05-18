<!-- include summernote js-->
<script src="{{ asset('adminLTE/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/ckeditor/adapters/jquery.js') }}"></script>
<script>
    jQuery(document).ready(function($) {
    	$('textarea.ckeditor' ).ckeditor();
    });
</script>