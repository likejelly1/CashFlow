@extends('layouts.master')

@section('content')


<section class="section">
    <div class="section-header">
        <h1>Estimation Cost</h1>
        <div class="section-header-button">
            <button id="createEstimation" class="btn btn-primary">Add New Item</button>
        </div>

        <div class="section-header-breadcrumb">
            <h1>Project Code : <b style="color:#">#{{$projects->code}}</b></h1>

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
                            Rp {{number_format(array_sum($total))}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
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
                    </div>
                    <div class="card-body">
                        <!-- <div class="clearfix mb-3"></div> -->
                        <div class="table-responsive">
                            <table id="itemList" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Rate</th>
                                        <th>Qty</th>
                                        <th>Frequency</th>
                                        <th>Duration</th>
                                        <th>Total</th>
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
                                        <td>
                                            <button class="btn btn-icon btn-primary edit" data-id="{{$pc->id}}"><i class="far fa-edit"></i></button>
                                            <button onclick="document.getElementById('destroyform{{$pc->id}}').submit()" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></button>

                                        </td>
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

<!-- Modal  -->
<div class="modal fade" id="tambahEstimationModal" tabindex="-1" role="dialog" aria-labelledby="tambahEstimationModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahEstimationModalTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addEstimationForm" action="{{route('pc.store.estimation')}}" method="POST">
                @csrf
                <input required type="hidden" name="project_id" value="{{$projects->id}}">
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
                                    IDR
                                </div>
                            </div>
                            <input id="rate" required type="number" name="rate" class="form-control currency">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveButton" class="btn btn-primary"></button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('script.js')
<script>
    $(document).ready(function() {
        var table = $('#itemList').DataTable();

        $('#itemList tbody').on('click', 'td', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                row.child.hide();

            } else {
                row.child(format(row.data())).show();
            }

        });

    });


    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });

    function format(data) {
        return t
    }

    function load() {
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


    // edit
    $('.edit').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.get("/pc/" + id + "/edit/est", function(data) {
            $('#saveButton').html("Update Estimation");
            $('#tambahEstimationModalTitle').html("Edit Estimation");
            $('#addEstimationForm').trigger("reset");
            $('#item').val(data.item);
            $('#rate').val(data.rate);
            $('#qty').val(data.qty);
            $('#freq').val(data.freq);
            $('#durration').val(data.durration);
            $('#tambahEstimationModal').modal('show');
        });
    });
</script>
@endsection
@endsection