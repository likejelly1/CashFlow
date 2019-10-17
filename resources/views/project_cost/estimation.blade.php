@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp
@extends('layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('pc.index')}}" class="btn btn-danger btn-circle-sm m-1"><i class="fas fa-chevron-left"></i></a>
        <h1 style="padding-left:10px">Estimation Cost</h1>

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
                            <h4>Total Item</h4>
                        </div>
                        <div class="card-body">
                            {{count($projects->project_cost)}}
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
                            <h4>Total Estimated Cost</h4>
                        </div>
                        <div id="totalCost" class="card-body">
                            Rp {{number_format($total)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
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
                            <button id="createEstimation" class="btn btn-danger"><i class="fas fa-plus"></i> Add New Item</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="itemList" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Rate</th>
                                        <th>Qty</th>
                                        <th>Frequency</th>
                                        <th>Duration</th>
                                        <th>Subtotal Estimated Cost</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects->project_cost as $pc)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pc->item}}</td>
                                        <td>Rp {{number_format($pc->rate)}}</td>
                                        <td>{{$pc->qty}}</td>
                                        <td>{{$pc->freq}}</td>
                                        <td>{{$pc->durration}}</td>
                                        <td id="subtotal{{$pc->id}}">Rp {{number_format($pc->rate*$pc->freq*$pc->durration*$pc->qty)}}</td>
                                        @if($user->role_id ==3 ||$user->role_id ==7)
                                        <td>
                                            <button class="btn btn-icon btn-success add" data-id="{{$pc->id}}" data-toggle="tooltip" data-placement="bottom" title="Add"><i class="fa fa-plus"></i></button>
                                            <button class="btn btn-icon btn-primary edit" data-id="{{$pc->id}}" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="far fa-edit"></i></button>
                                            <button onclick="document.getElementById('destroyform{{$pc->id}}').submit()" class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                            <button class="btn btn-info btn-icon detail" data-id="{{$pc->id}}"><i class="fa fa-eye" data-toggle="tooltip" data-placement="bottom" title="View"></i></button>
                                        </td>
                                        @endif
                                    </tr>
                                    <form id="destroyForm{{$pc->id}}" style="display: none;" action="{{route('pc.destroy.estimation', ['id'=> $pc->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- add Estimation Modal  -->
<div class="modal fade" id="tambahEstimationModal" tabindex="-1" role="dialog" aria-labelledby="tambahEstimationModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahEstimationModalTitle">Modal title</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <form id="addEstimationForm" action="{{route('pc.store.estimation')}}" method="POST">
                @csrf
                <input required type="hidden" name="project_id" value="{{$projects->id}}">
                <input id="pcCode" type="hidden" name="code">

                <div class="modal-body">
                    <div class="form-group">
                        <div class="section-title">Item Name</div>
                        <input required id="item" type="text" name="item" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="section-title">Rate</div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input id="rate" required type="text" name="rate" class="form-control money">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="section-title">Estimation</div>
                        <small>Quantity, Frequency, Durration</small>
                        <div class="form-inline">
                            <input id="qty" min="1" required type="number" name="qty" placeholder="Qty" class="form-control col-4">
                            <input id="freq" min="1" required type="number" name="freq" placeholder="Frequency" class="form-control col-4">
                            <input id="durration" min="1" required type="number" name="durration" placeholder="Durration" class="form-control col-4">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="saveButton" class="btn btn-primary"></button>
                    <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- add Realization Modal -->
<div class="modal fade" id="addRealizationModal" tabindex="-1" role="dialog" aria-labelledby="addRealizationModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRealizationModalTitle">Modal title</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <form id="addEstimationForm" action="{{route('pc.store.realization')}}" method="POST">
                @csrf
                <input id="projectCostId" required type="hidden" name="project_cost_id">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="section-title">Execution Date</div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-calendar"></i>
                                </div>
                            </div>
                            <input required name="execution_date" type="date" class="form-control daterange-cus">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="section-title">Cost</div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input id="rate" required type="text" name="cost" class="form-control money">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="saveRealization" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script.js')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#itemList').DataTable();

        $('#itemList tbody').on('click', '.detail', function() {
            // console.log(1);
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var id = $(this).data('id');
            // console.log(id);
            try {
                $.ajax({
                    type: "GET",
                    url: "/pc/" + id + "/real",
                    success: function(response) {
                        // console.log(response);
                        if (row.child.isShown()) {
                            // This row is already open - close it
                            row.child.hide();
                        } else {
                            // Open this row
                            row.child(response).show();
                        }
                    }
                });
            } catch (error) {
                console.log(error);
            }
        });
    });

    function format() {
        return '<table cellpadding = "5" cellspacing = "0" border = "0"style = "padding-left:50px;" > ' +
            '<tr>' +
            '<td>Full name:</td>' +
            '<td>' + 'jallu' + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Extension number:</td>' +
            '<td>' + 'ganteng' + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Extra info:</td>' +
            '<td>And any further details here (images etc)...</td>' +
            '</tr>' +
            '</table>';
    }

    function load() {
        var table = $('#itemList').DataTable();
        var id = table.row.data('id');
        $.ajax({
            url: "",
            success: function(response) {
                $('#dataTable').html(response);
            }
        });
    }


    $('#itemList').DataTable();
    // add modal
    $('#createEstimation').click(function(e) {
        $('#saveButton').html("Create Estimation");
        $('#addEstimationForm').trigger("reset");
        $('#tambahEstimationModalTitle').html("Add Estimation");
        $('#tambahEstimationModal').modal('show');
    });


    // edit Estimation
    $('.edit').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.get("/pc/" + id + "/edit/est", function(data) {
            $('#saveButton').html("Update Estimation");
            $('#tambahEstimationModalTitle').html("Edit Estimation");
            $('#addEstimationForm').trigger("reset");
            $('#pcCode').val(data.code);
            $('#item').val(data.item);
            $('#rate').val(data.rate);
            $('#qty').val(data.qty);
            $('#freq').val(data.freq);
            $('#durration').val(data.durration);
            $('#tambahEstimationModal').modal('show');
        });
    });
    // add realization
    $('.add').click(function(e) {
        e.preventDefault();
        var id_project_cost = $(this).data('id');
        $('#projectCostId').val(id_project_cost);
        $('#saveRealization').html("Save");
        $('#addRealizationTitle').html("Add Realization");
        $('#addEstimationForm').trigger("reset");
        $('#addRealizationModal').modal('show');
    });
</script>
@endsection
@endsection