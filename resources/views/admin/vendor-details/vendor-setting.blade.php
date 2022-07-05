@extends('layouts.vertical-menu.master')
@section('page-header')
                        <!-- PAGE-HEADER -->
                            <div><h1 class="page-title">Store Edit</h1></div>
                        <!-- PAGE-HEADER END -->
@endsection
@section('content')
<div id="myModal" class="modal fade d-flex justify-content-center align-items-center">  
                                <div class="imgmyModal" >       
                                   <img src="{{ asset('assets/images/loader.gif') }}">
                                </div>
                        </div>
<div class="card">

  <div class="card-body" id="add_space">
     <div class="d-flex justify-content-end">
      <a href="{{ route('dashboard.vendorsettings.index') }}#" class="btn btn-info-light ">Back</a>
    </div>
    <form action="{{ route("dashboard.vendorsettings.store") }}" method="post" enctype="multipart/form-data">
      @csrf

      <input type="hidden" class="form-control" name="vendor_id" value="{{ isset($vendor) ? $vendor->id : '' }}">
      <div class="row">
        
         <div class="col-md-6">
          <div class="form-group">
            <label class="control-label ">Store Name </label>
            <input type="text" name="first_name" class="form-control first_name" value="{{($data['first_name'])??''}}" required>
            <small class="text-danger first_name_text"></small>
          </div>
        </div>
         <div class="col-md-6">
          <div class="form-group">
            <label class="control-label ">Phone Number </label>
            <input type="number" name="phone_number" class="form-control " value="{{($data['phone_number'])??''}}" required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label ">Email </label>
            <input type="email" class="form-control"  name="email" value="{{($data['email'])??''}}" required>
          </div>
        </div>
          <div class="col-md-12">
          <div class="form-group">
            <label class="control-label ">Address </label>
            <textarea type="text" name="last_name" class="form-control location" >{{($data['last_name'])??''}}</textarea>
            
            <small class="text-danger location_text"></small>
          </div>
        </div>
      </div>
      <div class="row">
      
      <button class="btn btn-success-light mt-3 mx-3 submit">Update</button>
    </div>
    </div>
    </div>
  </form>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
   $(document).ready(function(){
        $("#myModal").css("z-index", "0");

        $('.submit').on('click',function(e){
        e.preventDefault();

        value = true;

     
        var first_name = $('.first_name').val();
        var location = $('.location').val();

        if (first_name == '') {
            $('.first_name_text').text('Please enter a Store name');
            value = false;
        }else{
            $('.first_name_text').text('');
        }

        if (location == '' ) {
           $( ".location_text" ).text('Please enter store location');
            value = false;
        }else{
            $('.location_text').text('');
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