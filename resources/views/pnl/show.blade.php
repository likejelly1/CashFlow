@extends('layouts.master')
@section('content')
@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp
<section class="section">
    <div class="section-header">
        <a href="{{ route('pnl.index')}}" class="btn btn-danger btn-circle-sm m-1"><i class="fas fa-chevron-left"></i></a>
        <h1 style="padding-left:10px">Profit and Loss</h1>

        <div class="section-header-breadcrumb">
            <h1>Project Code : <b>#{{$project->code}}</b></h1>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fa fa-university h4 text-white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Client Name</h4>
                        </div>
                        <div class="card-body">
                            {{$project->customer->institution_name}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-money-bill-alt h2"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Contract Price</h4>
                        </div>
                        <div class="card-body">
                            Rp {{number_format($contract_price)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <h5 class="text-white" style="margin-top:30px"><i class="fas fa-money-bill-alt"></i></h5>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Gross Profit</h4>
                        </div>
                        <div class="card-body">
                            Rp {{number_format($gross_profit)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <h5 class="text-white" style="margin-top:30px"><i class="fas fa-money-bill-alt"></i></h5>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Nett Profit</h4>
                        </div>
                        <div class="card-body">
                            Rp {{number_format($nett_profit)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="statistic-details sm-4">
                            <div class="statistic-details-item">
                                <div class="detail-value">Rp {{number_format($total_gross_sales)}}</div>
                                <div class="detail-name">Quotation</div>
                            </div>
                            <div class="statistic-details-item">
                                <div class="detail-value">Rp {{number_format($total_negotiation)}}</div>
                                <div class="detail-name">Negotiation</div>
                            </div>
                            <div class="statistic-details-item">
                                <div class="detail-value">Rp {{number_format($total_nett_sales)}}</div>
                                <div class="detail-name">Nett Sales</div>
                            </div>
                            <div class="statistic-details-item">
                                <div class="detail-value">Rp {{number_format($total_nett_sales * 10/100)}}</div>
                                <div class="detail-name">PPN 10%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <h2 class="section-title">Gross Sales</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Total Gross Sales: Rp {{number_format($total_gross_sales)}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Categories</th>
                                        <th>Amount</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gross_sales as $gs)
                                    <tr>
                                        <td>{{$gs->category->name}}</td>
                                        <td>Rp {{number_format($gs->amount)}}</td>
                                        <td>100%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <h2 class="section-title">Negotiation</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Total Negotiation: Rp {{number_format($total_negotiation)}}</h4>
                        @if($user->role_id == 1 || $user->role_id == 7)
                        <div class="card-header-action">
                            <button id="EditNegotiation" class="btn btn-danger text-right"><i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i></button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Categories</th>
                                        <th>Amount</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($negotiations as $n)
                                    <tr>
                                        <td>{{$n->category->name}}</td>
                                        <td>Rp {{number_format($n->amount)}}</td>
                                        <td>{{$n->percent}}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-sm-12 col-lg-4">
                <h2 class="section-title">Nett Sales</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Total Nett Sales: Rp {{number_format($total_nett_sales)}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Categories</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($nett_sales as $n)
                                    <tr>
                                        <td>{{$n->category->name}}</td>
                                        <td>Rp {{number_format($n->amount)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <h2 class="section-title">Cost Of Sales</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Total Cost Sales: Rp {{number_format($total_cost_sales)}}</h4>
                        @if($user->role_id == 3 || $user->role_id == 7)
                        <div class="card-header-action">
                            <div id="addCostSales" class="btn-group">
                                <button class="btn btn-danger text-right" data-toggle="tooltip" data-placement="bottom" title="Add"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-danger text-right" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-edit"></i></button>
                            </div>

                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Item</th>
                                        <th>Amount</th>
                                        <th>Precentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cost_sales as $cs)
                                    <tr>
                                        <td>{{$cs->item}}</td>
                                        <td>Rp {{number_format($cs->amount)}}</td>
                                        <td>{{$cs->percent}}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <h2 class="section-title">Cost Of Product</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Total Cost Product: Rp {{number_format($total_cost_products)}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Category</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cost_products as $cp)
                                    <tr>
                                        <td>{{$cp->category->name}}</td>
                                        <td>Rp {{number_format($cp->amount)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <h2 class="section-title">Commissions</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Total Commission: Rp {{number_format($total_commissions)}}</h4>
                        @if($user->role_id == 3 || $user->role_id == 7)
                        <div class="card-header-action">
                            <div id="addCommission" class="btn-group">
                                <button class="btn btn-danger text-right"><i class="fas fa-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                <button class="btn btn-danger text-right"><i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i></button>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Item</th>
                                        <th>Amount</th>
                                        <th>Precentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($commissions as $c)
                                    <tr>
                                        <td>{{$c->item}}</td>
                                        <td>Rp {{number_format($c->amount)}}</td>
                                        <td>{{$c->percent}}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <h2 class="section-title">Pre Sales</h2>
                <div class="card">
                    <div class="card-header">
                        <h4>Total Sales Commission: Rp {{number_format($total_sales_commission)}}</h4>
                        @if($user->role_id == 3 || $user->role_id == 7)
                        <div class="card-header-action">
                            <button id="EditSalesCommission" class="btn btn-danger text-right"><i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i></button>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Percentage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales_commission as $sc)
                                    <tr>
                                        <td>{{$sc->category->name}}</td>
                                        <td>Rp {{number_format($sc->amount)}}</td>
                                        <td>{{$sc->percent}}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- modal Negotiation -->
<div class="modal fade" id="NegotiationModal" tabindex="-1" role="dialog" aria-labelledby="addNegotiationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNegotiationLabel">Negotiation</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form id="negotiationForm" action="{{route('pnl.storeNegotiation')}}" method="post">
                    {{csrf_field()}}
                    <input id="project_id" type="hidden" name="project_id" value="{{$project->id}}">
                    <div class="form-group">
                        <div class="section-title">Categories</div>
                        <select id="category" name="category_id" class="form-control select2">
                            @foreach($negotiations as $n)
                            <option value="{{$n->category_id}}">{{$n->category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Negotiation Percent</label>
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
            <div class="modal-footer">
                <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="savenegotiation" type="submit" class="btn btn-primary">Submit</button>

            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal Negotiation -->


<!-- modal CostSales -->
<div class="modal fade" id="CostSalesModal" tabindex="-1" role="dialog" aria-labelledby="addCostSalesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCostSalesLabel">CostSales</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form id="CostSalesForm" action="{{route('pnl.storeCostSales')}}" method="post">
                    {{csrf_field()}}
                    <input id="project_id" type="hidden" name="project_id" value="{{$project->id}}">
                    <div class="form-group">
                        <div class="section-title">Item</div>
                        <select name="item" class="form-control select2">
                            <option value="Entertainment">Entertainment</option>
                            <option value="Biaya Administrasi">Biaya Administrasi</option>
                            <option value="Bank Garansi">Bank Garansi</option>
                            <option value="Biaya Lain-lain">Biaya Lain-lain</option>
                        </select>
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
            <div class="modal-footer">
                <button id="saveCostSales" type="submit" class="btn btn-primary">Submit</button>
                <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal CostSales -->

<!-- modal Commission -->
<div class="modal fade" id="CommissionModal" tabindex="-1" role="dialog" aria-labelledby="addCommissionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCommissionLabel">Commission</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <form id="CommissionForm" action="{{route('pnl.storeCommission')}}" method="post">
                    {{csrf_field()}}
                    <input id="project_id" type="hidden" name="project_id" value="{{$project->id}}">
                    <div class="form-group">
                        <div class="section-title">Item</div>
                        <select name="item" class="form-control select2">
                            <option value="Technical Commission">Technical Commission</option>
                            <option value="Sales Commission">Sales Commission</option>
                            <option value="Admin and Finance Team Commission">Admin and Finance Team Commission</option>
                        </select>
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
            <div class="modal-footer">
                <button id="saveCommission" type="submit" class="btn btn-primary">Submit</button>
                <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal Commission -->

<!-- modal SalesCommission -->
<div class="modal fade" id="SalesCommissionModal" tabindex="-1" role="dialog" aria-labelledby="addSalesCommissionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSalesCommissionLabel">SalesCommission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="SalesCommissionForm" action="{{route('pnl.storeSalesCommission')}}" method="post">
                    {{csrf_field()}}
                    <input id="project_id" type="hidden" name="project_id" value="{{$project->id}}">
                    <div class="form-group">
                        <div class="section-title">Categories</div>
                        <select name="category_id" class="form-control select2" required>
                            @foreach($sales_commission as $n)
                            <option value="{{$n->category_id}}">{{$n->category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SalesCommission Percent</label>
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
            <div class="modal-footer">
                <button id="saveSalesCommission" type="submit" class="btn btn-primary">Submit</button>
                <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal SalesCommission -->

<script>
    $('#EditNegotiation').click(function(e) {
        e.preventDefault();
        $('#NegotiationModal').modal('show');
    });

    $('#addCostSales').click(function(e) {
        e.preventDefault();
        $('#CostSalesModal').modal('show');
    });
    $('#addCommission').click(function(e) {
        e.preventDefault();
        $('#CommissionModal').modal('show');
    });
    $('#EditSalesCommission').click(function(e) {
        e.preventDefault();
        $('#SalesCommissionModal').modal('show');
    });
</script>
@endsection