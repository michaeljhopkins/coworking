<script>
	function redirect_to_new_page_with_template_parameter() {
		var new_template = $("#select_template").val();
		var current_url = "{{ Request::url() }}";

		window.location.href = strip_last_template_parameter(current_url)+'/'+new_template;
	}

	function strip_last_template_parameter(url) {
		// if it's a create or edit link with a template parameter
		if (url.indexOf("/create/") > -1 || url.indexOf("/edit/") > -1)
		{
			// remove the last parameter of the url
			var url_array = url.split('/');
			url_array = url_array.slice(0, -1);
			var clean_url = url_array.join('/');

			return clean_url;
		}

		return url;
	}

	jQuery(document).ready(function($) {
		$("#select_template").change(function(e) {
			var select_template_confirmation = confirm("Are you sure you want to change the page template? You will lose any unsaved modifications for this page.");
			if (select_template_confirmation == true) {
			    redirect_to_new_page_with_template_parameter();
			} else {
			    // txt = "You pressed Cancel!";
			}
		});

	});
</script>