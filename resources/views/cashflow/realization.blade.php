@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Realization Cash Flow</h1>

        <div class="section-header-breadcrumb">
            <h1>Project Code : <b>#{{$projects->code}}</b></h1>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
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
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
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

        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Surplus (Shortage)</h4>
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
                                        <th>Cum Surplus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i = 0; $i< count($surplus); $i++) <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$surplus[$i]->month}}</td>
                                        <td>{{$surplus[$i]->year}}</td>
                                        <td>Rp {{number_format($surplus[$i]->total_surp)}}</td>
                                        <td>{{$cum_surp[$i]}}</td>
                                        </tr>
                                        @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('script.js')
<script>
    $(document).ready(function() {
        $('#surplusList').DataTable();
    })
</script>

@endsection
@endsection