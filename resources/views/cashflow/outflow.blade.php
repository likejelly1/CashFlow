@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('cashflow.index')}}" class="btn btn-danger btn-circle-sm m-1"><i class="fas fa-chevron-left"></i></a>
        <h1 style="padding-left:10px">Cash out Flow</h1>

        <div class="section-header-breadcrumb">
            <h1>Project Code : <b>#{{$projects->code}}</b></h1>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-money-bill-alt h2"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Cash-out-flow</h4>
                        </div>
                        <div class="card-body">
                            Rp {{number_format($total)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
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
                            <button type="button" class="btn btn-danger text-right" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus"></i> Add New</button>
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
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($outflow as $of)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$of->description}}</td>
                                        <td>Rp {{number_format($of->total_cost)}}</td>
                                        <td>
                                            <button class="btn btn-info btn-icon expand" data-id="{{$of->description}}" data-toggle="tooltip" title="View" data-placement="bottom"><i class="fa fa-eye"></i></button>
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
                        <h4>Direct Cash-out Flow</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="totalList" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($monthlyOut as $mo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mo->month }} </td>
                                        <td>{{ $mo->year }}</td>
                                        <td>Rp {{number_format($mo->total_monthlyOut)}}</td>
                                    </tr>
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
                        <!-- <input type="text" class="form-control form-control-lg" name="description"> -->
                        <select name="description" class="form-control form-control-lg">
                            <option value="Hardware">Hardware</option>
                            <option value="Software">Software</option>
                            <option value="Application">Application</option>
                            <option value="MIB's Solution">MIB's Solution</option>
                            <option value="MIB's Professional Services">MIB's Professional Services</option>
                            <option value="MIB's Maintenance Service">MIB's Maintenance Service</option>
                            <option value="Biaya Administrasi">Biaya Administrasi</option>
                            <option value="Bank Garansi">Bank Garansi</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Biaya Lain-lain">Biaya Lain-lain</option>
                        </select>
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
                            <input type="text" name="cost" class="form-control form-control-md money">
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
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
    $(document).ready(function() {
        $('#totalList').DataTable();
    })
    var table = $('#itemList').DataTable();

    $('#itemList tbody').on('click', '.expand', function() {
        // console.log(1);
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var id = $(this).data('id');
        var proj_id = '{{$projects->id}}';
        // console.log(id);
        try {
            $.ajax({
                type: "GET",
                url: "/cashflow/" + id + "/detail/" + proj_id,
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
</script>

@endsection
@endsection