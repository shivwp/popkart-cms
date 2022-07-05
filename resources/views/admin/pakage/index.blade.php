@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
<!-- <style type="text/css">
    .paginatesection{
        position: relative;
    }
    .paginatesection1{
        position: absolute;
        z-index: 55;
    }
</style> -->
@section('page-header')
                        <!-- PAGE-HEADER -->
                            <div>
                                <h1 class="page-title">Subcriptions</h1>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Subcription</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">List</li>
                                    </ol>
                            </div>
                        
                        <!-- PAGE-HEADER END -->
@endsection
@section('content')
                   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                        <!-- ROW-1 OPEN-->
                            <!-- ROW-1 OPEN -->
                            <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                <div class="addnew-ele">
                                   
                                <a href="{{ route('dashboard.pakage.create') }}" class="btn btn-info-light "> Add
                                Pakage </a>
                                  
                            </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link   href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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

                            
                                    <div class="card-body">
                                        <div class="table-responsive">
                                           <!-- <div class="paging-section paginatesection">
                                            <form method="get" class="paginatesection1" >
                                                    <h6>show</h6>
                                                    <select id="pagination" name="paginate">
                                                        <option value="10" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 10) ? 'selected':''}}>10</option>
                                                        <option value="20" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 20) ? 'selected':''}}>20</option>
                                                        <option value="30" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 30) ? 'selected':''}}>30</option>
                                                        <option value="50" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 50) ? 'selected':''}}>50</option>
                                                   @if(isset($_GET['page']))<input type="hidden" name="page" value="{{$_GET['page']}}">@endif
                                                   <input type="submit" name="" style="display:none;">
                                               </form>
                                               
                                               </div> -->
                                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                                <thead>
                                    

                                                    <tr>
                                                        <th class="wd-15p">S.no</th>
                                                        <th class="wd-15p">Package Name</th>
                                                        <th class="wd-15p">Package Price</th>
                                                        <th class="wd-15p">Action</th>
                                                       
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody" >
                                                        @php
                                                        $i = 1;
                                                        @endphp
                                                        @foreach($data as $key => $value)
                                                    <tr>
                                                        
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->price }}</td>
                                                        
                                                         <td>   
                                                            <a class="btn btn-sm btn-secondary" href="{{ route('dashboard.pakage.show', $value->id ) }}"><i class="fa fa-edit"></i> </a>
                                                            
                                                       
                                                          <!--   <form action="{{ route('dashboard.pakage.destroy', $value->id ) }}" method="POST" onsubmit="return confirm('Do You Want To Delete This ?');" style="display: inline-block;">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <button type="submit" class="btn btn-sm btn-danger" value=""><i class="fa fa-trash"></i></button>
                                                            </form> -->
                                                            
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
<script type="text/javascript">
     $(document).ready(function() {
  $('#pagination').on('change', function() {
    var $form = $(this).closest('form');
    $form.submit();
    $form.find('input[type=submit]').click();
    
  });
});
</script>
  
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>

@endsection
 