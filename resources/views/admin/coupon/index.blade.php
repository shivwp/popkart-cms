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
                                <h1 class="page-title">{{$title}}</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Coupon</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">List</li>
                                </ol>
                            </div>
                        
                        <!-- PAGE-HEADER END -->
@endsection
@section('content')

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

                            
                        <!-- ROW-1 OPEN-->
                            <!-- ROW-1 OPEN -->
                            <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                <div class="addnew-ele">
                                <a href="{{ route('dashboard.coupon.create') }}" class="btn btn-info-light ">
                                    {{$buton_name}}
                                </a>
                            </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                           
                                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th class="wd-15p">coupon title</th>
                                                        <!-- <th class="wd-15p">description</th> -->
                                                         <th class="wd-15p">Image</th> 
                                                        <th class="wd-15p">Status</th>
                                                        <th class="wd-15p">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if(count($coupon)>0)
                                                    @foreach($coupon as $key => $item)
                                                        <tr>
                                                            <td>{{ $item->id ?? '' }}</td>
                                                            <td>{{ $item->code ?? '' }}</td>
                                                             <td style="height: 70px;width: 100px;">
                                                            @if(!empty($item->featured_image))
                                                           
                                                            <img src="{{url('coupons/feature/'.$item->featured_image)}}" alt="" style="height:50px">

                                                            @endif
                                                        </td>
                                                            <td>
                                                            @if($item->status == 1)
                                                            <span class="tag tag-green">Active</span>
                                                            @else
                                                            <span class="tag tag-gray-dark">Deactive</span>
                                                            @endif
                                                             </td>
                                                            
                                                            <td>
                                                                {{--<a class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a>--}}
                                                                 @can('coupon_edit')
                                                                 <a class="btn btn-sm btn-secondary" href="{{ route('dashboard.coupon.edit', $item->id) }}"><i class="fa fa-edit"></i> </a>
                                                                  @endcan
                                                                 @can('coupon_delete')
                                                                    <form action="{{ route('dashboard.coupon.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure');" style="display: inline-block;">
                                                                        <input type="hidden" name="_method" value="DELETE">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <button type="submit" class="btn btn-sm btn-danger" value=""><i class="fa fa-trash"></i></button>
                                                                    </form>
                                                                    @endcan
                                                               
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
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
 