@extends('layouts.vertical-menu.master')

@section('css')

<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/date-picker/spectrum.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet" />

@endsection

@section('page-header')

<!-- PAGE-HEADER -->

<div>

	<h1 class="page-title">Rewards</h1>

	<ol class="breadcrumb">

		<li class="breadcrumb-item"><a href="{{ route('dashboard.product.index') }}">Rewards</a></li>

		@if(isset($GiftCard->id))
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        @else
            <li class="breadcrumb-item active" aria-current="page">Add</li>
        @endif

	</ol>

</div>



<!-- PAGE-HEADER END -->

@endsection



@section('content')
<div id="myModal" class="modal fade d-flex justify-content-center align-items-center">  
                                <div class="imgmyModal" >       
                                   <img src="{{ asset('assets/images/loader.gif') }}">
                                </div>
                        </div>
<!-- ROW-1 OPEN-->

<div class="card">

	<div class="card-body">
<div class="d-flex justify-content-end">
            <a href="{{ route('dashboard.gift-card.index') }}#" class="btn btn-info-light ">Back</a>
        </div>
		<form method="POST" action="{{ route('dashboard.gift-card.store') }}" enctype="multipart/form-data">

			@csrf

			<div class="row">

				<input type="hidden" name="id" value="{{ isset($GiftCard) ? $GiftCard->id : '' }}">

				<div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Title</label>

						<input type="text" class="form-control title" name="title" placeholder="Title"  value="{{isset($GiftCard) ? $GiftCard->title : '' }}" required>
						<small class="text-danger title_text"></small>
					</div>

				</div>

				<div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Amount</label>

						<input type="number" class="form-control amount" name="amount" placeholder="Amount"  value="{{isset($GiftCard) ? $GiftCard->amount : '' }}" required>
						<small class="amount_text text-danger"></small>
					</div>

				</div>

				<!-- <div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Valid Days</label>

						<input type="number" class="form-control valid_days" name="valid_days" placeholder="valid days"  value="{{isset($GiftCard) ? $GiftCard->valid_days : '' }}" required>
						<small class="valid_days_text text-danger"></small>
					</div>

				</div> -->

				<div class="col-md-12">

					<div class="form-group">

						<label class="form-label">Status</label>

						<select class="form-control select2" name="status">

							<option value="" disabled>status</option>

							<option value="1" {{isset($GiftCard) && ($GiftCard->status == '1') ? 'selected' : '' }}>Active</option>

							<option value="0" {{isset($GiftCard) && ($GiftCard->status == '0') ? 'selected' : '' }}>Deactive</option>

						</select>

					</div>

				</div>

				<div class="col-md-12">

					<div class="form-group">

						<label class="form-label">Description</label>

						<textarea class="form-control description" name="description" placeholder="Description"  value=""  required>{{isset($GiftCard) ? $GiftCard->description : '' }}</textarea>
						<small class="description_text text-danger"></small>

					</div>

				</div>

				<div class="col-md-12">

					<label class="form-label mt-0">Reward Image</label>

					<div class="dropify-wrapper" style="height: 302px;border: 1px solid #cdcdcd;">

						<div class="dropify-message" >

							<span class="file-icon"> <p>Drag and drop a file here or click</p>

							</span>

							<p class="dropify-error">Ooops, something wrong appended.</p>

						</div>

						<div class="dropify-loader"></div><div class="dropify-errors-container">

							<ul>

							</ul>

						</div>
						@if(isset($GiftCard->image))
							<input type="file" class="dropify" data-height="300" data-default-file="{{asset('images/giftcard/'.$GiftCard->image)}}" name="image" value="">
							<img src="{{url('images/giftcard').'/'.$GiftCard->image}}" alt="" style="height:50px">
							
						@else
							<input type="file" class="dropify" data-height="300" name="image" value="">
						@endif
						
						

						<button type="button" class="dropify-clear">Remove</button>

						<div class="dropify-preview">

							<span class="dropify-render">



							</span>

							<div class="dropify-infos"

							>

								<div class="dropify-infos-inner">

									<p class="dropify-filename">

										<span class="dropify-filename-inner"></span>

									</p>

									<p class="dropify-infos-message">Drag and drop or click to replace</p>

								</div>

							</div>

						</div>

					

					</div>



				</div>

				


				<div>

				


			</div>




@if(isset($GiftCard->id))
				<button class="btn btn-success-light mt-3 mx-3 submit" type="submit">Update</button>
			@else
				<button class="btn btn-success-light mt-3 mx-3 submit" type="submit">Save</button>
			@endif

	</div>

	


</form>

</div>

</div>					

@endsection

@section('js')

<script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/date-picker/spectrum.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/select2/select2.full.min.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/time-picker/toggles.min.js') }}"></script>

<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

<script>

	$(document).ready(function() {

		$('#dataTable').DataTable();

	});

</script>

<script>

	$(document).ready(function() {



		$('#attr').change(function(){

//$('#new_city').hide();

var attrid = $(this).val();

// AJAX request

$.ajax({

	url:'{{url('dashboard/get-attr-value')}}',

	method: 'post',

	data: {

		"_token": "{{ csrf_token() }}",

		"attrid": attrid

	},

	dataType: 'json',

	success: function(response) {

		// Remove options 

		$('#attrval').find('option').not(':first').remove();

// Add options

$.each(response,function(index,data){

	$('#attrval').append('<option value="'+data['id']+'">'+data['attr_value_name']+'</option>');

});

}

});

});



	});

</script>

<script type="text/javascript">

	$(document).ready(function(){
		$("#myModal").css("z-index", "0");

		$('.submit').on('click',function(e){
        e.preventDefault();

        value = true;

     
        var title = $('.title').val();
        var description = $('.description').val();
        var amount = $('.amount').val();
        var valid_days = $('.valid_days').val();
        var discription = $('.discription').val();
        var amount = $('.amount').val();


        if (title == '') {
            $('.title_text').text('Please enter product name');
            value = false;
        }else{
            $('.title_text').text('');
        }

        if (description == '') {
           $( ".description_text" ).text('Please enter discription');
            value = false;
        }else{
            $('.description_text').text('');
        }

        if (amount == '' ) {
            $('.amount_text').text('Please enter price');
            value = false;
        }else{
            $('.amount_text').text('');
        }
        if (valid_days == '') {
            $('.valid_days_text').text('Please enter product name');
            value = false;
        }else{
            $('.valid_days_text').text('');
        }

        
        
     
        
        if (value == true) {
            
            setTimeout(function () { disableButton(); }, 0);
            function disableButton() {
                $(".submit").prop('disabled', true);
            }
                $('form').unbind('submit').submit();
                $("#myModal").css("z-index", "999");
                $("#myModal").modal('show');
        }
    })
	})
</script>

@endsection

