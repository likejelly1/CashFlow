@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('cashflow.index')}}" class="btn btn-danger btn-circle-sm m-1"><i class="fas fa-chevron-left"></i></a>
        <h1 style="padding-left:10px">Realization Cash Flow</h1>

        <div class="section-header-breadcrumb">
            <h1>Project Code : <b>#{{$projects->code}}</b></h1>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
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
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-money-bill-alt h2"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Surplus</h4>
                        </div>
                        <div class="card-body">
                            Rp {{number_format($total)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">

                   
                    
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Surplus (Shortage)</h4>
                        <div class="card-header-action">
                            <button type="button" class="btn btn-danger text-right" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus"></i> Add Estimated</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="surplusList" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Total </th>
                                        <th>Cummulative Surplus</th>
                                        <th>Estimated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i< count($surplus); $i++) <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$surplus[$i]->month}}</td>
                                        <td>{{$surplus[$i]->year}}</td>
                                        <td>Rp {{number_format($surplus[$i]->total_surp)}}</td>
                                        <td>Rp {{number_format($cum_surp[$i])}}</td>
                                        <td></td>
                                        </tr>
                                        @endfor
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
                        <h4>Sales Commission</h4>
                        <div class="card-header-action">
                            <button type="button" class="btn btn-danger text-right" data-toggle="modal" data-target="#tambahModalSalesCommission"><i class="fas fa-plus"></i> Add Sales Commission</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="salesCommission" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Total Commission </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($real_commission as $real)
                                    <tr>
                                        <td>{{$real->execution_date}}</td>
                                        <td>{{$real->total}}</td>
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

<!--Add Modal Estimated-->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <form action="{{ route('cashflow.storeEst')}}" method="post">
                {{csrf_field()}}
                <input required type="hidden" name="project_id" value="{{$projects->id}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Percent</label>
                        <div class="form-group">
                            <label>Percent</label>
                            <div class="input-group">
                                <input id="percent" type="text" name="percent" class="form-control">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        %
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Rp
                                </div>
                            </div>
                            <input type="text" name="amount" class="form-control money amount">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Add Modal Sales Commission-->
<div class="modal fade" id="tambahModalSalesCommission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New</h5>

            </div>
            <form action="{{ route('cashflow.storeRealCommission')}}" method="post">
                {{csrf_field()}}
                <input required type="hidden" name="project_id" value="{{$projects->id}}">
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('script.js')
<script>
    $(document).ready(function() {
        $('#surplusList').DataTable();
    })

    $(document).ready(function() {
        $('#salesCommission').DataTable();
    })
</script>

@endsection
@endsection