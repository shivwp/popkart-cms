@extends('layouts.vertical-menu.master')
@section('css')
<style>
	.bg-secondary {
    background-color: #d43f8d!important;
}
</style>
@endsection
@section('page-header')
                        <!-- PAGE-HEADER -->
                            <div>
                                <h1 class="page-title">Dashboard</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </div>
                        <!-- PAGE-HEADER END -->
@endsection
@section('content')
						<!-- ROW-1 -->
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
						<div calass="row">
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xl-6">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
										<div class="card">
											<div class="card-body text-center statistics-info">
												<a href="{{ route('dashboard.users.index') }}">
													<div class="counter-icon bg-primary mb-0 box-primary-shadow">
														<i class="fe fe-user-plus text-white"></i>
													</div>
													<h6 class="mt-4 mb-1">Total User</h6>
													<h2 class="mb-2 number-font usercount"></h2>
													<p class="text-muted">lorem ipsum - business coach of new time ,grant users , time journey with business </p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
										<div class="card">
											<div class="card-body text-center statistics-info">
												<a href="{{ route('dashboard.vendorsettings.index') }}">
													<div class="counter-icon bg-secondary mb-0 box-secondary-shadow" >
														<i class="fe fe-shopping-bag text-white"></i>
													</div>
													<h6 class="mt-4 mb-1">Total Store</h6>
													<h2 class="mb-2 number-font vendorcount"></h2>
													<p class="text-muted">lorem ipsum - business coach of new time ,grant users , time journey with business </p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
										<div class="card">
											<div class="card-body text-center statistics-info">
												<a href="{{ route('dashboard.product.index') }}">
												<div class="counter-icon bg-success mb-0 box-success-shadow">
													<i class="fe fe-package text-white"></i>
												</div>
												<h6 class="mt-4 mb-1">Total Item</h6>
												<h2 class="mb-2  number-font prductcount"></h2>
												<p class="text-muted">lorem ipsum - business coach of new time ,grant users , time journey with business </p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
										<div class="card">
											<div class="card-body text-center statistics-info">
												<a href="{{ route('dashboard.list.index') }}">
												<div class="counter-icon bg-info mb-0 box-info-shadow">
													<i class="fe fe-list text-white"></i>
												</div>
												<h6 class="mt-4 mb-1">Total List</h6>
												<h2 class="mb-2  number-font listcount"></h2>
												<p class="text-muted">lorem ipsum - business coach of new time ,grant users , time journey with business </p>
											</a>
											</div>
										</div>
									</div>
						</div>
						</div>
						<!-- ROW-1 END -->
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
         type:'GET',
         url:'{{ route("dashboard.update-user-count","view")}}',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         success:function(data){
            $('.usercount').text(data);
         }
      });
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
         type:'GET',
         url:'{{ route("dashboard.update-vendor-count","view")}}',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         success:function(data){
            $('.vendorcount').text(data);
         }
      });
	})
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
         type:'GET',
         url:'{{ route("dashboard.update-list-count","view")}}',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         success:function(data){
            $('.listcount').text(data);
         }
      });
	})
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
         type:'GET',
         url:'{{ route("dashboard.update-product-count","view")}}',
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         success:function(data){
            $('.prductcount').text(data);
         }
      });
	})
</script>

@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/index1.js') }}"></script>
@endsection




