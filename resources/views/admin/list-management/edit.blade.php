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
                                <h1 class="page-title">Edt List</h1>
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item active" aria-current="page">Edt</li>
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

<style type="text/css">
    .ts-wrapper{
        position: relative;
    }
    .ts-control{
        position: absolute;
        left: 0px;
        top: 0px;
    }
    input[type=number]::-webkit-inner-spin-button {
    opacity: 1
</style>

                                <div class="card">
                                <form class="formadd" method="post" action="{{ route('dashboard.list.update' , $id) }}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
<div class="d-flex justify-content-end">
            <a href="{{ route('dashboard.list.index') }}#" class="btn btn-info-light ">Back</a>
        </div>
                                        <input type="hidden" name="id" value="{{ old('id', isset($user) ? $user->id : '') }}">

                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    @foreach($data as $da => $key)
                                                    <div class="form-group">
                                                        <label class="form-label">Grocery Name</label>
                                                        <input type="text" class="form-control Grocery_name grocery_name " name="grocery_name"
                                                        
                                                         placeholder="Name" value="{{$key->grocery_name}}" required>
                                                        
                                                    </div>
                                                    @endforeach
                                                    <small class="text-danger grocery_name_text"></small>
                                                </div>

                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">List User</label>

                                                   <select name="mainuser" class="mainuser form-control" required>

                                                            @foreach($data as $key => $item)
                                                            @foreach($userdata as $user => $us)
                                                            <option value="{{$us->id}}" {{ isset($item) && $item->main_user_id == $us->id ? 'selected': ''  }} >{{ $us->first_name }}</option>
                                                            @endforeach
                                                             @endforeach
                                                    </select>
                                                        <small class="text-danger user_text"></small>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-6">
                                                   
                                                    <div class="form-group">
                                                        
                                                        <label class="form-label">Select People</label>

                                                        <select id="select-tags" multiple name="user[]" class="user" required>

                                                            @foreach($users as $key => $item)
                                                            @foreach($userdata as $user => $us)
                                                            <option value="{{$us->id}}" {{ isset($item) && $item->id == $us->id ? 'selected': ''  }} >{{ $us->first_name }}</option>
                                                            @endforeach
                                                             @endforeach
                                                        </select>
                                                       <small class="text-danger user_text"></small>
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-6">
                                                     @foreach($data as $da => $key)
                                                    <div class="form-group">
                                                     
                                                        <label class="form-label">Store Name</label>
                                                        <input class="form-control store" value="{{$key->store}}" type="text" name="store" required>
                                                        
                                                    </div>
                                                     @endforeach
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    @foreach($data as $da => $key)
                                                    <div class="form-group">
                                                        <label class="form-label">Date Of Shopping</label>
                                                        <input type="date" class="form-control date" name="date" value="{{$key->date}}" required>
                                                        <span class="text-danger date_text">@error('store_name'){{"**".$message}}@enderror</span>
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>

                                                <div class="col-md-6">
                                                    @foreach($data as $da => $key)
                                                    <div class="form-group">
                                                        <label class="form-label">Time Of Shopping</label>
                                                        <input type="time" class="form-control" name="time" value="{{$key->time}}" required>
                                                        <span>@error('store_name'){{"**".$message}}@enderror</span>
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>

                                               

                                                <div class="col-md-6">
                                                    @foreach($data as $da => $key)
                                                    <div class="form-group">
                                                        <label class="form-label">Add Massage</label>
                                                        <input type="text" class="form-control" name="massage" value="{{$key->massage}}" required>
                                                        <span>@error('store_name'){{"**".$message}}@enderror</span>
                                                    </div>
                                                    @endforeach
                                                    
                                                </div>

                                                
                                                <div class="col-md-8">

                                                    <div class="form-group">
                                                      
                                                        <label class="form-label">Add Item</label>
                                                        
                                                        <select id="select-beast" class="form-control product" name="product" required>
                                                            <option disabled selected>Select Grocery</option>
                                                            @foreach($product as $prod => $pro)  
                                                            <option value="{{ $pro->id }}">{{ $pro->pname }}</option>
                                                            @endforeach  
                                                        </select>

                                                        <!-- <select id="select-beast" multiple name="product[]"  required>

                                                            @foreach($product as $prod => $pro)  
                                                            <option value="{{ $pro->id }}">{{ $pro->pname }}</option>
                                                            @endforeach 
                                                        </select> -->
                                                        
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-md-12 producttable">
                                                    <table class="table border">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">S.no</th>
                                                          <th scope="col">Product Name</th>
                                                          <th scope="col">Quantity</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        @foreach($productdata as $productkey => $productvalue)
                                                        <tr>
                                                          <td scope="col">{{$productvalue->product_id}} <input  value='{{$productvalue->product_id}}' type='hidden' name='value[]'></td>
                                                          <td scope="col">{{$productvalue->productname}}</td>
                                                          <td scope="col"><input type="number" min="1" name="qty[]" value="{{$productvalue->qty}}" ></td>
                                                          <td scope="col" class="hide" >x</td>
                                                        </tr>
                                                        @endforeach
                                                      </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                       
                                        <button type ="button" class="btn btn-success-light mt-3 add ">Update</button>
                                    </div>

                                </form>
                                    
                                </div>
s
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
           new TomSelect("#select-beast",{
            create: true,
            sortField: {
                field: "text",
                direction: "asc"
            }
});

        });
</script>  

<script type="text/javascript">

    $(document).ready(function() {
        $("#myModal").css("z-index", "0");
        $(".hide").on('click', function () {
        $(this).closest('tr').remove();
        });

        $('.product').on('change',function(){
            val = $(this).val();
            val1 = $('.product option:selected').text();
            val2 =  $('.qty').val();
                $('.producttable').show();
               
            markup = "<tr> <td>" + val + " <input class='name' value='" + val + "' type='hidden' name='value[]'></td> <td>" + val1 + "</td> <td> <input min='1' value='1' type='number' name='qty[]'> <td class='hide' >x</td> </tr>";
    
           var values = $("input[name='value[]']")
              .map(function(){return $(this).val();}).get();

              console.log(values);

              if(jQuery.inArray(val, values) != -1 ) {
                    console.log("is in array");
                } else if( val == '') {
                    console.log("is in array o");
                   
                }else{
                     $("table tbody").append(markup);
                }

             

             $(".hide").on('click', function () {
            $(this).closest('tr').remove();
            });
        
            $('.add').on('click',function(){

                $('.formadd').submit();
            })
        })

        $('.add').on('click',function(){

                $('.formadd').submit();
            })

        $('.formadd').on('submit',function(e){

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
@endsection
