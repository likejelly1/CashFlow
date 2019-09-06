@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Cash out Flow</h1>

        <div class="section-header-breadcrumb">
            <h1>Project Code : <b>#{{$projects->code}}</b></h1>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-list h2"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4></h4>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4></h4>

                        </div>

                        <div class="card-body">
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-money-bill-alt h2"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4></h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fa fa-university h4 text-white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Client Name</h4>
                        </div>
                        <div class="card-body">
                            {{$projects->customer->institution_name}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Items</h4>
                        <div class="card-header-action">
                            <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus"></i> Add New</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="clearfix mb-3"></div> -->
                        <div class="table-responsive">
                            <table id="itemList" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Schedule</th>
                                        <th>Cost</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($outflow as $of)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$of->description}}</td>
                                        <td>{{$of->execution_date}}</td>
                                        <td>{{$of->cost}}</td>
                                        <td>
                                            <form action="{{ route('cashflow.destroyOut', $of->id)}}" method="post">
                                                <a href="{{route('cashflow.edit_out', $of->id)}}" class="btn btn-icon btn-primary" data-id="{{$of->id}}" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-icon btn-danger" data-id="{{$of->id}}" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Summary Total</h4>
                    </div>
                    <div class="card-body">
                        <!-- <div class="clearfix mb-3"></div> -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bulan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td></td>
                                       
                                        <td>
                                          {{$dates}}  
                                        </td>
                                       
                                        <td></td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Add Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('cashflow.storeOut')}}" method="post">
                {{csrf_field()}}
                <input required type="hidden" name="project_id" value="{{$projects->id}}">

                <div class="modal-body">
                    <div class="form-group">
                        <label>Description Item</label>
                        <input type="text" class="form-control form-control-lg" name="description">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input name="execution_date" type="date" class="form-control daterange-cus">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Cost</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="number" name="cost" class="form-control form-control-md">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


@section('script.js')
<script>
    $(document).ready(function() {
        $('#itemList').DataTable();
    })
</script>
@endsection
@endsection