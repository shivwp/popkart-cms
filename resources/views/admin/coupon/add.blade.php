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
   <h1 class="page-title">{{$title}}</h1>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard.product.index') }}">Coupon</a></li>
      <li class="breadcrumb-item active" aria-current="page">
         <?php
            if (isset($coupon->id)) {
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
      <div class="d-flex justify-content-end mb-5">
         <a href="{{ route('dashboard.coupon.index') }}#" class="btn btn-info-light ">Back</a>
      </div>
      <form method="POST" action="{{ route('dashboard.coupon.store') }}" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-10">
               <div class="form-group">
                  <input type="text"  class="genrate_code form-control code" id="genrate_code" name="code" placeholder="Coupon code" value="{{isset($coupon) ? $coupon->code : '' }}" />
                  <small class="text-danger code_text"></small>
               </div>
            </div>
            <div class="col-2">
               <a class="gen-btn btn btn-info-light    w-100"  href="javascript:void(0);" onclick="codegenrate()">Generate Code</a>
            </div>
         </div>
         <div class="row">
            <input type="hidden" name="id" value="{{ isset($coupon) ? $coupon->id : ''}}">
            <div class="col-md-6">
               <div class="form-group">
                  <label class="form-label">Select Product</label>
                  <select class="form-control select2 product_search" name="product_id[]" id="product_search" multiple="">
                     @if(!isset($coupon))
                     <option value="0">All</option>
                     @else
                     @foreach($product as $val)
                     @isset($coupon)
                     @php
                     $check = json_decode($coupon->product_id)
                     @endphp
                     @endisset
                     <option value="{{$val->id}}" {{ isset($check) && in_array($val->id, $check) ? 'selected' : '' }}>{{$val->pname}}</option>
                     @endforeach
                     @endif
                  </select>
               </div>
               <!-- <div class="form-group">
                  <label class="form-label">Limit per coupon</label>
                  <input type="number" class="form-control limit_per_coupon" name="limit_per_coupon" placeholder="Coupon" value="{{isset($coupon) ? $coupon->limit_per_coupon : '' }}" required>
                  <small class="text-danger limit_per_coupon_text" ></small>
               </div>
               <div class="form-group">
                  <label class="form-label">Coupon amount</label>
                  <input type="number" class="form-control coupon_amount" name="coupon_amount" placeholder="Amount" value="{{isset($coupon) ? $coupon->coupon_amount : '' }}" required>
                  <small class="text-danger coupon_amount_text" ></small>
               </div>
               <div class="form-group">
                  <label class="form-label">Start date</label>
                  <input type="date" class="form-control start_date" name="start_date" placeholder="Date" value="{{isset($coupon) ? $coupon->start_date : '' }}" required>
                  <small class="text-danger start_date_text" ></small>
               </div> -->
            </div>
            <div class="col-md-6">
               <!-- <div class="form-group">
                  <label class="form-label">Select Category</label>
                  <select class="form-control select2" name="category_id[]" id="coupon_amount" multiple>
                     <option value="0">All</option>
                     @if(count($category)>0)
                     @foreach($category as $key => $val)
                     @isset($coupon)
                     @php
                     $check = json_decode($coupon->category_id)
                     @endphp
                     @endisset
                     <option value="{{$val->id}}" {{isset($check) && in_array($val->id, $check) ? 'selected' : '' }}>{{$val->title}}</option>
                     @endforeach
                     @endif
                  </select>
               </div> -->
              <!--  <div class="form-group">
                  <label class="form-label">Limit per user</label>
                  <input type="number" class="form-control limit_per_user" name="limit_per_user" placeholder="User" value="{{isset($coupon) ? $coupon->limit_per_user : '' }}" required>
                  <small class="text-danger limit_per_user_text"></small>
               </div> -->
               <div class="form-group">
                  <label class="form-label">Status</label>
                  <select class="form-control select2" name="status" id="coupon_amount" >
                  <option value="1" {{isset($coupon) && ($coupon->status == 1) ? 'selected' : ''}}>Active</option>
                  <option value="0" {{isset($coupon) && ($coupon->status == 0) ? 'selected' : ''}}>InActive</option>
                  </select>
               </div>
               <!-- <div class="form-group">
                  <label class="form-label">Expiry date</label>
                  <input type="date" class="form-control expiry_date" name="expiry_date" placeholder="Date" value="{{isset($coupon) ? $coupon->expiry_date : '' }}" required>
                  <small class="text-danger expiry_date_text"></small>
               </div> -->
            </div>
            <div class="col-12">
               <div class="form-group">
                  <label class="form-label">Description</label>
                  <textarea rows="4" cols="50" class="form-control description" name="description" placeholder="Type here" required>{{isset($coupon) ? $coupon->description : '' }}</textarea>
                  <small class="text-danger description_text"></small>
               </div>
            </div>
            <div class="col-md-12">
               <label class="form-label mt-0">Coupon Image</label>
               <div class="dropify-wrapper" style="height: 302px;border: 1px solid #cdcdcd;">
                  <div class="dropify-message" >
                     <span class="file-icon">
                        <p>Drag and drop a file here or click</p>
                     </span>
                     <p class="dropify-error">Ooops, something wrong appended.</p>
                  </div>
                  <div class="dropify-loader"></div>
                  <div class="dropify-errors-container">
                     <ul>
                     </ul>
                  </div>
                  @if(isset($coupon->featured_image))
                  <input type="file" class="dropify imagedrop" data-height="300" data-default-file="{{asset('coupons/feature/'.$coupon->featured_image)}}" name="featured_image" value="">
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
         </div>
         @if(isset($coupon->id))
         <button class="btn btn-success-light mt-3 submit" type="submit">Update</button>
         @else
         <button class="btn btn-success-light mt-3 submit" type="submit">Save</button>
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
   
   
   
   function codegenrate() {
   
      var rnd = Math.floor(Math.random() * 10000);
   
      document.getElementById('genrate_code').value = 'COUP'+rnd;
   
   }
   
</script>
<script type="text/javascript">
   $('document').ready(function() {
      $('.product_search').select2({
           minimumInputLength: 2,
            ajax: {
                    url: '{{ route("dashboard.product-search") }}',
                    method: 'post',
                    dataType: 'json',
                    delay:250,
                    data: function (params) {
                      // console.log(params);
                        return{
                           psearchTerm: params.term,
                           _token: '{{csrf_token()}}'
                        }
                     },
                    processResults: function(data){
                      // console.log(data);
                      return{
                        results: data
                      };
                    },
                    cache:true
              }
      });
      
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function(){
   $("#myModal").css("z-index", "0");
   
   $('.submit').on('click',function(e){
   e.preventDefault();
   
   value = true;
   
   
   var code = $('.code').val();
   var description = $('.description').val();
   var limit_per_coupon = $('.limit_per_coupon').val();
   var coupon_amount = $('.coupon_amount').val();
   var start_date = $('.start_date').val();
   var limit_per_user = $('.limit_per_user').val();
   var expiry_date = $('.expiry_date').val();
   
   
   
   if (code == '') {
       $('.code_text').text('Please enter a code');
       value = false;
   }else{
       $('.code_text').text('');
   }
   
   if (description == '' ) {
      $( ".description_text" ).text('Please enter discription');
       value = false;
   }else{
       $('.description_text').text('');
   }
   
   if (limit_per_coupon == '' ) {
       $('.limit_per_coupon_text').text('Please enter coupon limit per user');
       value = false;
   }else{
       $('.limit_per_coupon_text').text('');
   }
   if (coupon_amount == '') {
       $('.coupon_amount_text').text('Please enter amount');
       value = false;
   }else{
       $('.coupon_amount_text').text('');
   }
   
   if (start_date == '') {
      $( ".start_date_text" ).text('Please select date');
       value = false;
   }else{
       $('.start_date_text').text('');
   }
   
   if (limit_per_user == '' ) {
       $('.limit_per_user_text').text('Please select limit per user');
       value = false;
   }else{
       $('.limit_per_user_text').text('');
   }
   if (expiry_date == '' ) {
       $('.expiry_date_text').text('Please select date');
       value = false;
   }else{
       $('.expiry_date_text').text('');
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