	@extends('layouts.vertical-menu.master')

@section('css')

<style>

.note-placeholder {
	display: none !important;
}

.sub_cat, .sub_sub_cat {
	display: none;
}

</style>

<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/date-picker/spectrum.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/time-picker/jquery.timepicker.css')}}" rel="stylesheet" />

<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">

<link href="{{ URL::asset('assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet">

@endsection

@section('page-header')

<!-- PAGE-HEADER -->

<div>
	<h1 class="page-title">ITEMS</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{ route('dashboard.product.index') }}">ITEM</a>
		</li>
		<li class="breadcrumb-item active" aria-current="page">
			<?php
			if (isset($d)) {
				echo "Edit";
			}else{
				echo "Add";
			}
			?>
		</li>
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
			<a href="{{ route('dashboard.product.index') }}#" class="btn btn-info-light ">Back</a>
		</div>

		<form method="POST" action="{{ route('dashboard.product.store') }}" enctype="multipart/form-data">

			@csrf

			<div class="row">

				<input type="hidden" name="id" value="{{ isset($product) ? $product->id : '' }}">
				
				@if(Auth::user()->roles->first()->title == "Admin")	
				<!-- <div class="col-md-12">
					<div class="form-group">
						<label class="form-label">Select Store</label>
						<select name="vendorid" class="form-control select2" required >
							<option value="">Select</option>
							@if(count($all_vendors) > 0)
								@foreach($all_vendors as $val)
									<option value="{{$val->id}}" {{isset($product) && ($product->vendor_id == $val->id) ? 'selected' : ''}}>{{$val->first_name}}</option>
								@endforeach
							@endif
						</select>
					</div>
				</div> -->
				@endif

				<div class="col-md-12">

					<div class="form-group">

						<label class="form-label">Item Name</label>

						<input type="hidden" name="pid" value="{{ isset($product->id)?$product->id:'' }}" class="pid" required>

						<input type="text" class="form-control pname" name="productname" placeholder="Name"  value="{{isset($product) ? $product->pname : '' }}" required>
						<small class="text-danger pname_text"></small>

					</div>

				</div>

				<div class="col-md-12">

					<div class="form-group mb-0">

						<label class="form-label">Short Discription</label>

						<textarea class="form-control discription" name="example-textarea-input" rows="6" placeholder="text here.." required>{{isset($product) ? $product->short_description : '' }}</textarea>
						<small class="text-danger discription_text"></small>

					</div>

				</div>

				<!-- <div class="col-md-12">

					<div class="form-group mb-0">

						<label class="form-label">Detailed Discription</label>

                                                        <div id="summernote"><?php echo isset($product) ? $product->long_description : '' ?></div>

					</div>

				</div> -->

				<div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Select Category</label>

						<select name="catid" class="form-control select2" id="pc" required>
  						
							<option value="">Select</option>

							@if(count($category) > 0)

								@foreach($category as $val)

									<option value="{{$val->id}}" {{isset($product) && ($product->cat_id == $val->id) ? 'selected' : ''}}>{{$val->title}}</option>

								@endforeach

							@endif

						</select>

					</div>

				</div>

				<div class="col-md-6 ">

					<div class="form-group">

						<label class="form-label">Sub Category</label>

						<select name="catid_2" class="form-control select2" id="subpc" class="pc_1">

						@if(!isset($product))
							<option value="">Select</option>
						@endif

							@if(isset($subcats) > 0)
								@foreach($subcats as $val)
									<option value="{{$val->id}}" {{isset($product) && ($product->cat_id_2 == $val->id) ? 'selected' : ''}}>{{$val->title}}</option>

								@endforeach

							@endif

						</select>

					</div>

				</div>

					<div class="col-md-6 ">

					<div class="form-group">

						<label class="form-label">Sub Category</label>

						<select name="catid_3" class="form-control select2" id="subc" class="pc_2">

							<option value="">Select</option>

							@if(isset($sub_sub_category) > 0)

								@foreach($sub_sub_category as $val)

									<option value="{{$val->id}}" {{isset($product) && ($product->cat_id_3 == $val->id) ? 'selected' : ''}}>{{$val->title}}</option>

								@endforeach

							@endif

						</select>

					</div>

				</div>
				<!-- @if(Auth::user()->roles->first()->title == "Admin" && !empty($product))
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Product Commission</label>
						<input type="text" class="form-control" name="commission" value ="{{isset($product) ? $product->commission : '' }}" >
					</div>
				</div>
				@endif -->
				<!-- <div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Product Type</label>
						<select name="pro_type" class="form-control select2 pro_type" id="product_type" required>
								<option value="single" {{isset($product) && ($product->product_type == "single") ? 'selected' : ''}}>Single</option>
								<option value="variants" {{isset($product) && ($product->product_type == "variants") ? 'selected' : ''}}>Variants</option>
						</select>
					</div>
				</div>
 -->

				<!-- <div class="col-md-6 pro-single">
					<div class="form-group">
						<label class="form-label">Select Attributes</label>
						<select name="attribute" class="form-control select2" id="select-single-attr" multiple>
							<option value="" hidden>Select Attributes</option>
						@if(count($attrdata) > 0)
						@foreach($attrdata as $key => $attr)	
								<option value="{{ $attr->id }}" {{isset($product) && array_key_exists($attr->id,$product_attr) ? 'selected' : ''}}>{{ $attr->name }}</option>
						@endforeach
						@endif
						</select>
					</div>
					<button class="btn btn-success btn-sm" type="button" id="make_attr_value_selection">Make attribute value selection
					</button>
				</div>
				<div class="col-md-6 pro-variants">
					<div class="form-group">
						<label class="form-label">Select Attributes</label>
						<select name="attribute" class="form-control select2" id="select-multi-attr" multiple>
							<option value="" hidden>Select Attributes</option>
						@if(count($attrdata) > 0)
						@foreach($attrdata as $key => $attr)	
								<option value="{{ $attr->id }}" {{isset($product) && array_key_exists($attr->id,$product_attr) ? 'selected' : ''}}>{{ $attr->name }}</option>
						@endforeach
						@endif
						</select>
					</div>
					<button class="btn btn-success btn-sm" type="button" id="make_attr_value_selection_multi">Make attribute value selection
					</button>
				</div> -->

				<div class="col-md-12">
					<div class ="row attrval">
						@isset($product)
						@foreach($product_attr as $key => $val)
						<?php
							$attr = App\Models\Attribute::where('id','=', $key)->first();
							$attrval= App\Models\AttributeValue::where('attr_id','=',$key)->get();
						?>
						@if($product->product_type == "single")
						<div class="col-md-6">
							<div class="form-group attrs">
							<label class="form-label">{{$attr->name}}</label>
							<select name="attrvalid[{{$attr->id}}][]" class="form-control select2" id="selectattr" multiple="">
								@if(count($attrval)>0)
  									@foreach($attrval as $aval)
									<option value="{{$aval->id}}" {{isset($val) && in_array($aval->id,$val) ? 'selected' : ''}} >{{$aval->attr_value_name}}</option>
									@endforeach
								@endif
							</select>
							</div>
						</div>
						@elseif($product->product_type == "variants")
						<div class="col-md-6">
						<div class="form-group attrs">
							<label class="form-label">{{$attr->name}}</label>
							<select name="{{$attr->slug}}[]" class="form-control select2" id="selectattr" multiple="">
							@if(count($attrval)>0)
  									@foreach($attrval as $aval)
									<option value="{{$aval->id}}" {{isset($val) && in_array($aval->id,$val) ? 'selected' : ''}} >{{$aval->attr_value_name}}</option>
									@endforeach
							@endif
							</select>
							</div>
						
						</div>
						@endif
						@endforeach
						@endisset
					</div>
					<div class ="row make-variation">
					@isset($product)
					@if($product->product_type == "variants")
						<div class ="col-md-3">
								<button class="btn btn-success btn-sm mb-2" type="button" id="make_variantions">Make Variantions</button>
						</div>
					@endif
					@endisset
					</div>
				</div>
				@if(!isset($product))
				<div class="col-md-12 show_variantions" style="display: none;">
					<div class="form-group">
						<table class="table table-hover">
						<thead>
							<tr>
								<th></th>
								<th>SKU</th>
								<th>Price</th>
								<th>Number of item</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody class="variantions_combinations">

						   </tbody>
						</table>
					</div>
				</div>
				@else
  					@if($product->product_type == 'variants')
					  <div class="col-md-12 show_variantions">
						<div class="form-group">
							<table class="table table-hover">
							<thead>
								<tr>
									<th></th>
									<th>SKU</th>
									<th>Price</th>
									<th>Number of item</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="variantions_combinations">
  									@if(count($prodductVariants) > 0)
									  @foreach($prodductVariants as $key => $pval)
<tr id="variant_row_1">
	<!-- <td>1</td> -->
	<td>

  	{{-- @foreach(json_decode($pval->variant_value) as $key_var => $val_var)variants --}}
  	@foreach($pval->variants as $key_var => $val_var)
			<strong>{{$key_var}}:{{$val_var}}</strong>
	@endforeach
	</td>
	<td>
		<input type="text" class="form-control"  value="{{$pval->variant_sku}}" name="variant_sku[{{$key}}][]">
	</td>
	<td>
		<input type="text" class="form-control"  value="{{$pval->variant_price}}" name="variant_price[{{$key}}][]">
	</td>
	<td>
		<input type="text" class="form-control"  value="{{$pval->variant_stock}}" name="variant_stock[{{$key}}][]">
	</td>
	<td>
		<img src="{{url('products/gallery')}}/{{json_decode($pval->variant_images)[0]}}" style="height:50px">
		<input type="hidden" name="prv_img[{{$key}}][]" value="{{($pval->variant_images)}}">
		<input type="file" class="form-control"  value="" name="variant_images[{{$key}}][]">
	{{-- <input type="hidden" name="variant_id[{{$key}}][]" value="{{$key}}"> --}}
	<input type="hidden" name="variant_value[{{$key}}][]" value="{{json_decode(json_encode($pval->variant_value))}}">
	</td>
	<td>
		<button class="delete_variant fa fa-trash btn btn-danger btn-sm" data-row="1">
		</button>
	</td>
</tr>
									  @endforeach
									@endif
								</tbody>
							</table>
						</div>
					</div>
					@endif
				@endif
				
				<!-- <div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Sku </label>

						<input type="text" class="form-control" name="sku" placeholder="Sku" value="{{isset($product) ? $product->sku_id : '' }}" >

					</div>

				</div> -->

				<!-- <div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Shipping type</label>

						<select class="form-control select2" name="shipping_type" >

							<option value="">Select</option>

							<option value="paid" {{isset($product) && ($product->shipping_type == 'ekart') ? 'selected' : '' }}>Ekart</option>

							<option value="unpaid" {{isset($product) && ($product->shipping_type == 'wasil') ? 'selected' : '' }}>Wasil</option>

						</select>

					</div>

				</div> -->

				<!-- <div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Shipping Price</label>

						<input type="text" name="shipping_price" value="{{isset($product) ? $product->shipping_charge : '' }}" class="form-control" >

					</div>

				</div> -->

				<div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Price</label>

						<input type="number" class="form-control price" name="purchase" placeholder="Purchase Price" value="{{isset($product) ? $product->p_price : '' }}" required>
						<small class="text-danger price_text"></small>
					</div>

				</div>

				<div class="col-md-6">

					<div class="form-group">

						<label class="form-label">Discounted Price</label>

						<input type="number" class="form-control price_d" name="selling" placeholder="Selling Price" value="{{isset($product) ? $product->s_price : '' }}" required>
						<small class="text-danger price_d_text"></small>
					</div>

				</div>

				<div class="col-md-6">

					<div class="form-group">

						<input type="hidden"  name="productstatus" value="1" required>
						<small class="text-danger price_d_text"></small>
					</div>

				</div>

				<div class="col-md-12">

					<label class="form-label mt-0">Item Image</label>

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
						@if(isset($product->featured_image))
							<input type="file" class="dropify imagedrop" data-height="300" data-default-file="{{$product->featured_image}}" name="featured_image" value="">
							
						@else
							<input type="file" class="dropify imagedrop" data-height="300" name="featured_image" value="">
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
<!-- 
				<div class="col-md-12 mt-2">
					@if(isset($product->gallery_image))
					@php
						$value = json_decode($product->gallery_image);
						
					@endphp
					@if(isset($value))
					@foreach($value as $multidata)
	                    <div class="parc ">

	                    	<span class="pip" data-title="{{$multidata}}">
	                      	<img src="{{ url('products/gallery').'/'.$multidata ?? "" }}" alt="" width="100" height="100">
	                      	<a class="btn"><i class="pe-7s-trash remove" onclick="removeImage('{{$multidata}}')"></i></a> 
	                    </div>
	               @endforeach
	               @endif
	                  <input type ="hidden" name="gallery_image1" id="gallery_img" value="{{$product->gallery_image}}">
	               @endif
                	
					<label class="form-label mt-0">Gallery</label>
					<input type="file" class="" name="gallery_image[]" value="" multiple>
				</div> -->


				<!-- <div>
				<div class="col-md-12 mt-5">
					<div class="d-flex  align-items-center">
						<label class="switch">
							<input type="checkbox" id="featured" name="featured" {{ isset($product) && ($product->featured == 1) ?  'checked' : '' }}>
							<span class="slider round"></span>
						</label>
						<label for="scales" class="mt-1 mx-1 h6" >Featured</label>
					</div>
				</div>
				<div class="col-md-12 mt-2">
					<div class="d-flex  align-items-center">
						<label class="switch">
							<input type="checkbox" id="new" name="new" {{ isset($product) && ($product->new == 1) ?  'checked' : '' }}>
							<span class="slider round"></span>
						</label>
						<label for="scales" class="mt-1 mx-1 h6">New</label>
					</div>
				</div>
      			<div class="col-md-12 mt-2">
      				<div class="d-flex align-items-center">
						<label class="switch">
							<input type="checkbox" id="best_saller" name="best_saller" {{ isset($product) && ($product->best_saller == 1) ?  'checked' : '' }}>
							<span class="slider round"></span>
						</label>
						<label for="scales" class="mt-1 mx-1 h6">Best Seller</label>
					</div>
				</div>
				</div> -->



	</div>

	@if(isset($product->id))
		<button class="btn btn-success-light mt-3 submit " type="submit">Update</button>
	@else
		<button class="btn btn-success-light mt-3 submit " type="submit">Save</button>
	@endif

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



<script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/wysiwyag/jquery.richtext.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/wysiwyag/wysiwyag.js') }}"></script>

<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>

<script src="{{ URL::asset('assets/js/summernote.js') }}"></script>

<script src="{{ URL::asset('assets/js/formeditor.js') }}"></script>

<script type="text/javascript">
	$(".dropify-clear").on('click',function(){
			$('.imagedrop').val(" ");
		});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").css("z-index", "0");
		$('.submit').on('click',function(e){
        e.preventDefault();

        value = true;

       
        var pname = $('.pname').val();
        var discription = $('.discription').val();
        var price = $('.price').val();


        if (pname == '') {
            $('.pname_text').text('Please enter product name');
            value = false;
        }else{
            $('.pname_text').text('');
        }

        if (discription == '') {
           $( ".discription_text" ).text('Please enter discription');
            value = false;
        }else{
            $('.discription_text').text('');
        }

        if (price == '' ) {
            $('.price_text').text('Please enter price');
            value = false;
        }else{
            $('.price_text').text('');
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

    $('.status').on('change',function(){
        var status = $('.status :selected').text();
        if (status == 'Stocked') {
            $( ".sold_date" ).val('');
        }
        if (status == 'Not Used') {
            $( ".sold_date" ).val('');
        }
        
    });
	})
</script>


<script>     

 $('document').ready(function() {

    $('.note-codable').attr('name', 'content');

    var pre_editor_val = $('input[name="content"]').val();

    $('textarea[name="content"]').val(pre_editor_val);

    $('.note-editable.card-block').html(pre_editor_val);

    $('button[type="submit"]').click(function(editor_val){

        if(!jQuery('.codeview').lenght){

            var editor_val = $('.note-editable.card-block').html();

            $('textarea[name="content"]').val(editor_val);

        }

    });

  });

</script>



<script>

	$(document).ready(function() {

		$('#dataTable').DataTable();

	});

</script>

<script>

	$(document).ready(function() {

		if($('#product_type').val() == 'single'){
			
			$(".pro-variants").hide();
			$(".pro-single").show();

		}
		if($('#product_type').val() == 'variants'){
			$(".pro-variants").show();
			$(".pro-single").hide();
			
		}

		$('.tax-type').hide();

		$(document).on('change', '#tax_apply', function(e) {

		if($(this).find(":selected").val() == 'include') {

			$('.tax-type').show();

		} else {

			$('.tax-type').hide();

		}

		});

		$(document).on('change', '#pc', function(event) {

		//

		var pcat = $(this).val();

		$('.sub_sub_cat').hide();



		if(pcat != '0') {

			$.get('{{ url('dashboard/get-category') }}/'+pcat, function(data) {

			//

			$("#subpc").html(data.html);

			});  

			$('.sub_cat').show();

		} 

		else {

			$('.sub_cat').hide();

		}

		});

		$(document).on('change', '#subpc', function(event) {

		//

		var pcat = $(this).val();

		if(pcat != '0') {

			$.get('{{ url('dashboard/get-category') }}/'+pcat, function(data) {

			//

			$("#subc").html(data.html);

			});  

			$('.sub_sub_cat').show();

		} 

		else {

			$('.sub_sub_cat').hide();

		}

		});

		$(document).on('change', '#product_type', function(event) {
			var pro_type = $('#product_type').val();
			if(pro_type == "variants"){
				$('.pro-single').hide();
				$(".pro-variants").show();
			}
		});
		$(document).on('click', '.delete_variant', function(e){
			e.preventDefault();
			$('#variant_row_'+$(this).attr('data-row')).remove();
		});
		$('#make_attr_value_selection').on('click',function(e) {
			
			var attrid = $('#select-single-attr').val();
			$.ajax({
						url: "{{ route("dashboard.get-attr-value-single") }}",
						type: "POST",
						data: {
							attrid: attrid,
							_token: '{{csrf_token()}}'
						},
						dataType: 'json',
						success: function (result) {
							$('.attrval').html(result);
							$(".select2").select2();
						
						}
					});
		});
		$('#make_attr_value_selection_multi').on('click',function(e) {
			
			var attrid = $('#select-multi-attr').val();
			var html = '<div class ="col-md-3">'+
								'<button class="btn btn-success btn-sm" type="button" id="make_variantions">Make Variantions</button>'+
						'</div>';
		
			$.ajax({
						url: "{{ route("dashboard.get-attr-select") }}",
						type: "POST",
						data: {
							attrid: attrid,
							_token: '{{csrf_token()}}'
						},
						dataType: 'json',
						success: function (result) {
							$('.attrval').html(result);
							$('.make-variation').html(html);
							$(".select2").select2();
						
						}
					});

		});
		$(document).on("click", "#make_variantions" , function(e) {
			e.preventDefault();
			var formData = new FormData();
			$('.attrval > div.col-md-6').each(function( index,element ) {
				var name = $(this).find('select.form-control').attr('name');
				formData.append(name, $(this).find('select.form-control').val());
			});
			formData.append('_token', '{{ csrf_token() }}');
			$.ajax({
				url: '{{ route("dashboard.create-varient") }}',
				type: 'POST',
				data: formData,
				datatype: 'JOSN',
				processData: false,
				contentType: false,
				success: function (response) {
				// $('.cus_variants').hide();
				$('.hidevariationSelection').hide();
				$('.show_variantions').show();
				$('.variantions_combinations').html(response.html);
				},

				error: function (response) {

				}

			});

		});



	});

</script>
<script>
		function removeImage(data){
		console.log(data);
	    var inputvalue = $('#gallery_img').val();
	    var ary = JSON.parse(inputvalue);
	    console.log(ary);

		ary.splice( $.inArray(data,ary) ,1 );
	    var asd = JSON.stringify(ary);
	   $('.pip[data-title="'+data+'"]').remove();
	   $('#gallery_img').val(asd);
	}
</script>



@endsection

