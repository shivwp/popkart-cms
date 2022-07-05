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

                                <h1 class="page-title">Add Heath Tips</h1>

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

                                <div class="card-body">

	

	<div class="addnew-ele">



<a href="{{ route('dashboard.healthtips.index') }}" class="btn btn-info-light ">



	Back



</a>

</div>

                                <form  method="post" action="{{route('dashboard.healthtips.store')}}" enctype="multipart/form-data">

                                    @csrf

                                    <div class="card-body">

                                        <input type="hidden" name="id" value="{{ old('id', isset($user) ? $user->id : '') }}">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <label class="form-label">Title </label>

                                                        <input type="text" class="form-control title" name="title" placeholder="Title" value="{{ old('title') }}" required>

                                                        <small class="text-danger title_text"></small>

                                                    </div>

                                                    

                                                </div>

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <label class="form-label">Descriptions</label>

                                                        <textarea class="form-control description" name="description" placeholder="Description" value="{{ old('description') }}" required></textarea>

                                                       

                                                        <small class="text-danger description_text"></small>

                                                    </div>

                                                    

                                                </div>

                                                

				                   

                                                <div class="col-md-12">



<label class="form-label mt-0"> Image</label>



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

   

        <input type="file" class="dropify" data-height="300" name="image" value="">

   

    

    



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



     

        var title = $('.title').val();

        var description = $('.description').val();





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

