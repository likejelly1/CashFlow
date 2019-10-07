@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('cashflow.index')}}" class="btn btn-danger btn-circle-sm m-1"><i class="fas fa-chevron-left"></i></a>
        <h1 style="padding-left:10px">Cash in Flow</h1>
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
                            <h4>Total Billing</h4>
                        </div>
                        <div class="card-body">
                            {{count($inflow)}}
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
                            <h4>Percent Amount</h4>
                        </div>

                        <div class="card-body">
                            {{$inflow->sum('percent')}}
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
                            <h4>Total Direct Cash-in Flow</h4>
                        </div>
                        <div class="card-body">
                            Rp {{number_format($total)}}
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
                        <h4>All Billings</h4>
                        <div class="card-header-action">
                            <button type="button" class="btn btn-danger text-right" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus"></i> Add New</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="itemList" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Billings</th>
                                        <th>Schedule</th>
                                        <th>%</th>
                                        <th>Net Sales</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inflow as $in)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$in->billing}}</td>
                                        <td>{{Carbon\Carbon::parse($in->execution_date)->format('M-Y-d')}}</td>
                                        <td>{{$in->percent}}</td>
                                        <td>Rp {{number_format($total_nett_sales)}}</td>
                                        <td>
                                            Rp {{number_format($in->subtotal)}}
                                        </td>
                                        <td>
                                            <form action="{{ route('cashflow.destroy', $in->id)}}" method="post">
                                                <a href="{{route('cashflow.edit_in', $in->id)}}" class="btn btn-icon btn-primary" data-id="{{$in->id}}" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-icon btn-danger" data-id="{{$in->id}}" data-toggle="tooltip" data-placement="bottom" title="Delete">
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
                        <h4>Direct Cash-in Flow</h4>
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
                                    @foreach ($monthlyIn as $mi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mi->month }} </td>
                                        <td>{{ $mi->year }}</td>
                                        <td>Rp {{number_format($mi->total_monthlyIn)}}</td>
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
            <form action="{{ route('cashflow.store')}}" method="post">
                {{csrf_field()}}
                <input required type="hidden" name="project_id" value="{{$projects->id}}">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Billing</label>
                        <input type="text" class="form-control form-control-lg" name="billing" placeholder="enter description billing">
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
                        <label>Percent</label>
                        <div class="input-group">
                            <input type="number" id="percent" name="percent" step="1" min="0" max="100" class="form-control form-control-md">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-percent"></i>
                                </div>
                            </div>
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
</script>
@endsection

@endsection