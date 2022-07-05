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
                                <h1 class="page-title">Add List</h1>
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
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0/dist/js/tom-select.complete.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                <div class="card">
                                <form  method="post" action="{{ route('dashboard.list.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="d-flex justify-content-end">
            <a href="{{ route('dashboard.list.index') }}#" class="btn btn-info-light ">Back</a>
        </div>
                                        <input type="hidden" name="id" value="{{ old('id', isset($user) ? $user->id : '') }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Grocery list name</label>
                                                        <input type="text" class="form-control grocery_name" name="grocery_name" placeholder="Name" value="{{ old('store_name', isset($user) ? $user->first_name : '') }}" required>
                                                        <span class=" text-danger grocery_name_text">@error('store_name'){{"**".$message}}@enderror</span>
                                                    </div>
                                                    
                                                </div>

                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">List User</label>

                                                   <select name="mainuser" class="mainuser form-control" required>

                                                    @foreach($users as $key => $item)
                                                    <option value="{{$item->id}}">{{ $item->first_name }}</option>
                                                    @endforeach
                                                    </select>
                                                        <small class="text-danger user_text"></small>
                                                    </div>
                                                    
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Select People</label>

                                                        <select id="select-tags" class="user" multiple name="user[]"  required>
                                                            @foreach($users as $key => $item)
                                                            <option value="{{$item->id}}">{{ $item->first_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <small class="text-danger user_text"></small>
                                                    </div>
                                                    
                                                </div>

                                               <div class="col-md-6">

                                                    <div class="form-group">
                                                     
                                                        <label class="form-label">Store Name</label>
                                                        <input type="text" class="form-control store " name="store" placeholder="Name" value="" required>
                                                        <small class="text-danger store_text"></small>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Date Of Shopping</label>
                                                        <input type="date" class="form-control date" name="date" value="{{ old('store_name', isset($user) ? $user->first_name : '') }}" required>
                                                        <span class="text-danger date_text">@error('store_name'){{"**".$message}}@enderror</span>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Time Of Shopping</label>
                                                        <input type="time" class="form-control" name="time" value="{{ old('store_name', isset($user) ? $user->first_name : '') }}" required>
                                                        <span>@error('store_name'){{"**".$message}}@enderror</span>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                       
                                        <button type ="submit" class="btn btn-success-light mt-3 submit">Add</button>
                                    </div>

                                </form>
                                    
                                </div>

<script>
        $(document).ready(function() {
        
           new TomSelect("#select-tags",{
        plugins: ['remove_button'],
        create: true,
        onItemAdd:function(){
            this.setTextboxValue('');
            this.refreshOptions();
        },
        render:{
            option:function(data,escape){
                return '<div class="d-flex"><span>' + escape(data.text) ;
            },
            
        }
    });

        });
</script>             
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").css("z-index", "0");

        $('.submit').on('click',function(e){
        e.preventDefault();

        value = true;

     
        var grocery_name = $('.grocery_name').val();
        var user = $('.user').val();
        // var store = $('.store').val();
        var date = $('.date').val();


        if (grocery_name == '') {
            $('.grocery_name_text').text('Please insert grocery list name');
            value = false;
        }else{
            $('.grocery_name_text').text('');
        }

        if (user == '') {
           $( ".user_text" ).text('Please select user');
            value = false;
        }else{
            $('.user_text').text('');
        }

        // if (store == '' ) {
        //     $('.store_text').text('Please select store');
        //     value = false;
        // }else{
        //     $('.store_text').text('');
        // }
        if (date == '' ) {
            $('.date_text').text('Please select date');
            value = false;
        }else{
            $('.date_text').text('');
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
