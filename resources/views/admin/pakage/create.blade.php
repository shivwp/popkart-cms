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
                                <h1 class="page-title">Add Package</h1>
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item active" aria-current="page">Add</li>
                                </ol>
                                <!-- <a href="{{route('dashboard.store.index')}}" class="btn btn-success-light mt-3 ">Back</a> -->
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

                                <form  method="post" action="{{ route('dashboard.pakage.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="card-body">
<!-- Back button -->
<div class="d-flex justify-content-end">
    <a href="{{ route('dashboard.pakage.index') }}#" class="btn btn-info-light ">Back</a>
</div>
<!-- Back button finish-->
                                        <input type="hidden" name="id" value="{{ old('id', isset($user) ? $user->id : '') }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Pakage Title</label>
                                                        <input type="text" class="form-control title" name="name" placeholder="Title" value="{{ old('store_name', isset($user) ? $user->first_name : '') }}" required>
                                                       <small class="text-danger title_text"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Price</label>
                                                        <input type="number" step=".01" class="form-control price" name="price" placeholder="Price" value="{{ old('address', isset($user) ? $user->first_name : '') }}" required>
                                                        <small class="text-danger price_text"></small> 
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Share List Friends Count</label>
                                                        <input type="text" class="form-control share_list" name="share_list" placeholder="Share With Friends" value="{{ old('share_list', isset($user) ? $user->share_list : '') }}" required>
                                                        <small class="text-danger share_list_text"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Validity</label>
                                                        <input type="number" class="form-control validity" name="validity" placeholder="Validity (Days)" value="{{ old('validity', isset($user) ? $user->validity : '') }}" required>
                                                        <small class="text-danger validity_check"></small>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Edit List Count</label>
                                                        <input type="text" class="form-control edit_list" name="edit_list" placeholder="Edit List Count" value="{{ old('edit_list', isset($user) ? $user->edit_list : '') }}" required>
                                                        <small class="text-danger edit_list_text"></small>
                                                    </div>
                                                    
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Price Visiblity</label>
                                                        <select class="form-control price_visiblity" name="price_visiblity" >
                                                            
                                                            <option value="No" >No</option>
                                                            <option value="Yes">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Reward Access</label>
                                                        <select class="form-control reward_access" name="reward_access" >
                                                            
                                                            <option value="No" >No</option>
                                                            <option value="Yes">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Health suggestion</label>
                                                        <select class="form-control health_access" name="health_access" >
                                                           
                                                            <option value="No" >No</option>
                                                            <option value="Yes">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Google Ads</label>
                                                        <select class="form-control google_ads" name="google_ads" >
                                                          
                                                            <option value="No" >No</option>
                                                            <option value="Yes">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Pakage Discription</label>
                                                        <textarea class="ckeditor form-control discription" name="discription"></textarea>
                                                    
                                                       <small class="text-danger discription_text"></small>
                                                    </div>
                                                    
                                                </div>

                                            </div>
                                       
                                        <button type ="submit" class="btn btn-success-light mt-3 submit">Add</button>
                                    </div>

                                </form>
                                    
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
<!-- <script src="../script/ckeditor/ckeditor.js" type="text/javascript"></script> -->
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>

<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });
</script>
<script type="text/javascript">

    

    $(document).ready(function(){
        $("#myModal").css("z-index", "0");

        $('.submit').on('click',function(e){
        e.preventDefault();

        value = true;

     
        var title = $('.title').val();
        var price = $('.price').val();
        // var discription = $('.discription').val();
        var share_list = $('.share_list').val();
        var edit_list = $('.edit_list').val();
        var validity = $('.validity').val();
        var price_visiblity = $('.price_visiblity').val();
        var reward_access = $('.reward_access').val();
        var health_access = $('.health_access').val();
        var google_ads = $('.google_ads').val();



        if (title == '') {
            $('.title_text').text('Please enter product name');
            value = false;
        }else{
            $('.title_text').text('');
        }

        // if (discription == '') {
        //    $( ".discription_text" ).text('Please enter discription');
        //     value = false;
        // }else{
        //     $('.discription_text').text('');
        // }

        if (price == '' ) {
            $('.price_text').text('Please enter price');
            value = false;
        }else{
            $('.price_text').text('');
        }

        if (validity == '' ) {
            $('.validity_check').text('Please enter validity days');
            value = false;
        }else{
            $('.validity_check').text('');
        }

        if (share_list == '' ) {
            $('.share_list_text').text('Please enter price');
            value = false;
        }else{
            $('.share_list_text').text('');
        }
        if (edit_list == '' ) {
            $('.edit_list_text').text('Please enter price');
            value = false;
        }else{
            $('.edit_list_text').text('');
        }
        if (price_visiblity == '' ) {
            $('.price_visiblity_text').text('Please enter price');
            value = false;
        }else{
            $('.price_visiblity_text').text('');
        }
        if (reward_access == '' ) {
            $('.reward_access_text').text('Please enter price');
            value = false;
        }else{
            $('.reward_access_text').text('');
        }
        if (health_access == '' ) {
            $('.health_access_text').text('Please enter price');
            value = false;
        }else{
            $('.health_access_text').text('');
        }
        if (google_ads == '' ) {
            $('.google_ads_text').text('Please enter price');
            value = false;
        }else{
            $('.google_ads_text').text('');
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
