<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/summernote.js')}}" type="text/javascript"></script>
	<script src="{{URL::asset('handleAjax.js')}}"></script>
	<script src="{{URL::asset('handleAjAx_Form.js')}}"></script>
	<script src="{{URL::asset('HandleAJAX_List.js')}}"></script>
	

	<script>
		function noneLoading() {

			$(".full-page-absolute").addClass("None");
		}

		setTimeout(() => {
			$(".full-page-absolute").addClass("opacity");
			setTimeout(() => {
				noneLoading()
			}, 300);
		}, 500);
	</script>

	<script src="{{ URL::asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
	<script src="{{URL::asset('assets/demo/default/custom/components/base/blockui.js')}}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js')}}" type="text/javascript"></script>

<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-markdown.js')}}" type="text/javascript"></script>
	<script src="{{ URL::asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
	