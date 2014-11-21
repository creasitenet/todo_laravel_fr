
<div id="alertes">

	@if(Session::has('error'))
	<div class="alert alert-danger alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('error') }}
	</div>
	@endif

	@if(Session::has('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		{{ Session::get('success') }}
	</div>
	@endif

</div>
