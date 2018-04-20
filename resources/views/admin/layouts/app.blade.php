<!DOCTYPE html>
<html lang="en">

	@include('admin.partials.head')


<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		@include('admin/partials/header')

		@include('admin/partials/sidebar')

		@section('main-content')

		@show


		@include('admin/partials/footer')
		
	</div>
	
</body>
</html>