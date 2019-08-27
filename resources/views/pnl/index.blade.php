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
        <h2 class="section-title">Consolidation</h2>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Consolidation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
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
                                    <tr>
                                        <td>Gross PROFIT</td>
                                    </tr>
                                    <tr>
                                        <td>Internet Expense</td>
                                    </tr>
                                    <tr>
                                        <td>NETT PROFIT</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Cost of Sales</h4>
                    </div>

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
                        <h5 style="color: #6777ef;">Total Cost of Sales : <b>Rp.</b></h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Commission A</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Commission A</th>
                                        <th>Amount</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sales Team</td>
                                    </tr>
                                    <tr>
                                        <td>Technical Team</td>
                                    </tr>
                                    <tr>
                                        <td>Admin+Finance Team</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h5 style="color: #6777ef;">Total Commission : <label>Rp.</label></h5>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Commission A</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" style="width:100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Commission A</th>
                                        <th>Amount</th>
                                        <th>%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sales Team</td>
                                    </tr>
                                    <tr>
                                        <td>Technical Team</td>
                                    </tr>
                                    <tr>
                                        <td>Admin+Finance Team</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h5 style="color: #6777ef;">Total Commission : <label>Rp.</label></h5>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#hardware" role="tab" aria-controls="home" aria-selected="true">Hardware</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#software" role="tab" aria-controls="software" aria-selected="false">Software License</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Application License</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="solution-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">MIB's Solution</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="service-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">MIB's Professional Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="maint-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">MIB's Maintenance Services</a>
                            </li>
                        </ul>

                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade active show" id="hardware" role="tabpanel" aria-labelledby="home-tab2">
                                <div class="clearfix mb-3"></div>
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
                                                <td>Gross of Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Faktor Negotation</td>
                                            </tr>
                                            <tr>
                                                <td>Net Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Cost of product</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="software" role="tabpanel" aria-labelledby="profile-tab2">

                                <div class="clearfix mb-3"></div>
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
                                                <td>Gross of Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Faktor Negotation</td>
                                            </tr>
                                            <tr>
                                                <td>Net Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Cost of product</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">

                                <div class="clearfix mb-3"></div>
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
                                                <td>Gross of Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Faktor Negotation</td>
                                            </tr>
                                            <tr>
                                                <td>Net Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Cost of product</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="solution-tab2">

                                <div class="clearfix mb-3"></div>
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
                                                <td>Gross of Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Faktor Negotation</td>
                                            </tr>
                                            <tr>
                                                <td>Net Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Cost of product</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="service-tab2">

                                <div class="clearfix mb-3"></div>
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
                                                <td>Gross of Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Faktor Negotation</td>
                                            </tr>
                                            <tr>
                                                <td>Net Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Cost of product</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="maint-tab2">

                                <div class="clearfix mb-3"></div>
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
                                                <td>Gross of Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Faktor Negotation</td>
                                            </tr>
                                            <tr>
                                                <td>Net Sales</td>
                                            </tr>
                                            <tr>
                                                <td>Cost of product</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>


@endsection