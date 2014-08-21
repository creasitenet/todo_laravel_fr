
<div id="alertes">

	@if ($errors->any())
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>{{Lang::get('notifications.title.error')}}</strong>
		{{Lang::get('notifications.any-error-message')}}
	</div>
	@endif

	@if(Session::has('error'))
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{Lang::get('notifications.title.error')}} !</strong>
		{{ Session::get('error') }}
	</div>
	@endif

	@if(Session::has('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>{{Lang::get('notifications.title.success')}} !</strong>
		{{ Session::get('success') }}
	</div>
	@endif


	@if(Session::has('warning'))
	<div class="alert alert-warning alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>{{Lang::get('notifications.title.warning')}}</h4>
		{{ Session::get('warning') }}
	</div>
	@endif

	@if(Session::has('info'))
	<div class="alert alert-info alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4>{{Lang::get('notifications.title.info')}}</h4>
		{{ Session::get('info') }}
	</div>
	@endif

</div>
