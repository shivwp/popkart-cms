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
                                <h1 class="page-title">Edit Catagory</h1>
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                                <!-- <a href="{{route('dashboard.store.index')}}" class="btn btn-success-light mt-3 ">Back</a> -->
                            </div>
                            
                        
                        <!-- PAGE-HEADER END -->
@endsection

@section('content')
                        <!-- ROW-1 OPEN-->
                                <div class="card">
                                <form  method="post" action="{{route('dashboard.store.edit' , $user->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('GET')
                                    <div class="card-body">
                                        <input type="hidden" name="id" value="{{ old('id', isset($user) ? $user->id : '') }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Name</label>
                                                        <input type="text" class="form-control" name="store_name" placeholder="Name" value="{{ old('store_name', isset($user) ? $user->store_name : '') }}" required>
                                                       
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Store Address</label>
                                                        <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address', isset($user) ? $user->address : '') }}" required>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                       
                                        <button type ="submit" class="btn btn-success-light mt-3 ">Add</button>
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
<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });
</script>
@endsection
