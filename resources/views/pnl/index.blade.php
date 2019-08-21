@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profit and Loss</h1>
        <!-- <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{url ('/cogs/index2')}}">List Project</a></div>
            <div class="breadcrumb-item ">Project Detail</div>
        </div> -->
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Consolidation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Gross Sales</td>
                                    </tr>
                                    <tr>
                                        <td>Faktor Negotation</td>
                                    </tr>
                                    <tr>
                                        <td>Net Sales</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Cost of sales</th>
                                        <th>Amount</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cost of product</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Administrasi</td>
                                    </tr>
                                    <tr>
                                        <td>Bank Garansi</td>
                                    </tr>
                                    <tr>
                                        <td>Entertainment</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya lain-lain</td>
                                    </tr>
                                    <tr>
                                        <td>Project Cost</td>
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
@section('script.js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endsection

@endsection