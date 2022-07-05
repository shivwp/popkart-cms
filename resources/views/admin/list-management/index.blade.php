
@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
<style type="text/css">
    .paginatesection{
        position: relative;
    }
    .paginatesection1{
        position: absolute;
        z-index: 55;
    }
</style>
@section('page-header')
                        <!-- PAGE-HEADER -->
                            <div>
                                <h1 class="page-title">List Managment</h1>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Manage</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                            </div>
                        
                        <!-- PAGE-HEADER END -->
@endsection
@section('content')
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <!-- ROW-1 OPEN-->
                        @if(session()->has('message'))
                                <script>
                                    $(document).ready(function(){
                                        $("#myModal").modal('show');
                                    });
                                     setTimeout(function(){
                                    $('#myModal').modal('hide')
                                        }, 2000);
                                </script>
                                <div id="myModal" class="modal fade">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <h6 class="text-center">{{ session()->get('message') }}</h6>
                                            </div>
                                        </div>
                                    </div> 
                               </div>
                            @endif
                            <!-- ROW-1 OPEN -->
                            <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                <div class="addnew-ele">
                                   
                                <a href="{{ route('dashboard.list.create') }}" class="btn btn-info-light ">
                                    Add List
                                </a>
                                  
                            </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                           
                                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                                <thead>
                                    

                                                    <tr>
                                                        <th class="wd-15p">S.no</th>
                                                        <th class="wd-15p">List Name</th>
                                                        <th class="wd-15p">Store Name</th>
                                                        <th class="wd-15p">Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody" >
                                                        @php
                                                        $i = 1;
                                                        @endphp
                                                       @foreach($users as $value => $key)
                                                    <tr>
                                                        
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $key->grocery_name }}</td>
                                                        <td>{{ $key->store }}</td>
                                                        
                                                         <td>
                                                               
                                                            <a class="btn btn-sm btn-secondary" href="{{ route('dashboard.list.edit' ,$key->id) }}"><i class="fa fa-edit"></i> </a>
                                                            
                                                       
                                                            <form action="{{ route('dashboard.list.destroy' , $key->id ) }}" method="POST" onsubmit="return confirm('Do You Want To Delete This ?');" style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <button type="submit" class="btn btn-sm btn-danger" value=""><i class="fa fa-trash"></i></button>
                                                            </form>
                                                            
                                                        </td>

                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                    <!-- TABLE WRAPPER -->
                                </div>
                                <!-- SECTION WRAPPER -->
                            </div>
                        </div>
                        <!-- ROW-1 CLOSED -->  
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#pagination').on('change', function() {
    var $form = $(this).closest('form');
    //$form.submit();
    $form.find('input[type=submit]').click();
    console.log( $form);
  });
});
</script>
@endsection
 