@extends('layouts.app')
@section('content')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5 text-center">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $message }}.
                    </div>
                    @endif
                </div>
            </div>
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Cars Modals List
                            <span class="d-block text-muted pt-2 font-size-sm">Cars management made easy</span></h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('models.create')}}"  class="btn btn-light-primary font-weight-bold btn-sm px-4 font-size-base ml-2">Add Car Modals</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                            <tr>
                                <th>No #</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @if(isset($models) && $models->count())
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$model->name}}</td>
                                        <td>{{$model->created_at}}</td>
                                        <td>
                                            <form action="{{route('models.destroy',$model->id)}}" method="POST">
                                                <a href="{{route('models.edit',$model->id)}}" class="btn btn-sm btn-clean btn-icon"><i class="la la-edit"></i></a>
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this model')" class="btn btn-sm btn-clean btn-icon"><i class="la la-trash"></i></a></td>
                                                @csrf
                                                @method('DELETE')
                                            </form>    
                                    </tr>
                                @endforeach    
                            @else
                                {{'no Record Found'}}
                            @endif
                        </tbody>
                    </table>
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

@endsection
<script>
    var KTDatatablesAdvancedColumnRendering = function() {

var init = function() {
    var table = $('#kt_datatable');

    // begin first table
    table.DataTable({
        responsive: true,
        paging: true,
    });
};

return {

    //main function to initiate the module
    init: function() {
        init();
    }
};
}();
</script>