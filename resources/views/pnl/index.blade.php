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
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Items</h4>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>#</th>
                                        <td>Gross Sales</td>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <td>Faktor Negotation</td>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <td>Net Sales</td>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <td>Cost of Sales</td>
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
        var table = $('#example').DataTable({
            // scrollY: "500px",
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: true
        });
    });
</script>
@endsection

@endsection