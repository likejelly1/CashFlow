@extends('layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Tab</h1>
          </div>

          <div class="section-body">
            <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Bordered Tab</h4>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">Hardware</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Software License</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#contact2" role="tab" aria-controls="contact" aria-selected="false">Application Lincese</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="solution-tab2" data-toggle="tab" href="#solution2" role="tab" aria-controls="profile" aria-selected="false">MIB's Solution</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="service-tab2" data-toggle="tab" href="#service2" role="tab" aria-controls="contact" aria-selected="false">MIB's Professional Services</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="maint-tab2" data-toggle="tab" href="#maint2" role="tab" aria-controls="contact" aria-selected="false">MIB's Maintenance Services</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade active show" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                        <table class="table table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">DESCRIPTION</th>
                                    <th rowspan="2">Qty</th>
                                    <th rowspan="2">Disc(%) Modal</th>
                                    <th rowspan="2">Gross-Up(%) Modal</th>
                                    <th rowspan="2">Harga Satuan Modal</th>
                                    <th rowspan="2">Harga Total Modal</th>
                                    <th rowspan="2">Disc(%) Jual</th>
                                    <th rowspan="2">Gross-Up(%) Jual</th>
                                    <th rowspan="2">Harga Satuan Jual</th>
                                    <th rowspan="2">Harga Total Jual</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>oracle</td>
                                    <td>2</td>
                                    <td>20%</td>
                                    <td>20%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                    <td>10%</td>
                                    <td>10%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                  </tr>
                                </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                      <table class="table table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">DESCRIPTION</th>
                                    <th rowspan="2">Qty</th>
                                    <th rowspan="2">Disc(%) Modal</th>
                                    <th rowspan="2">Gross-Up(%) Modal</th>
                                    <th rowspan="2">Harga Satuan Modal</th>
                                    <th rowspan="2">Harga Total Modal</th>
                                    <th rowspan="2">Disc(%) Jual</th>
                                    <th rowspan="2">Gross-Up(%) Jual</th>
                                    <th rowspan="2">Harga Satuan Jual</th>
                                    <th rowspan="2">Harga Total Jual</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>oracle</td>
                                    <td>2</td>
                                    <td>20%</td>
                                    <td>20%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                    <td>10%</td>
                                    <td>10%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                  </tr>
                                </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
                      <table class="table table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">DESCRIPTION</th>
                                    <th rowspan="2">Qty</th>
                                    <th rowspan="2">Disc(%) Modal</th>
                                    <th rowspan="2">Gross-Up(%) Modal</th>
                                    <th rowspan="2">Harga Satuan Modal</th>
                                    <th rowspan="2">Harga Total Modal</th>
                                    <th rowspan="2">Disc(%) Jual</th>
                                    <th rowspan="2">Gross-Up(%) Jual</th>
                                    <th rowspan="2">Harga Satuan Jual</th>
                                    <th rowspan="2">Harga Total Jual</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>oracle</td>
                                    <td>2</td>
                                    <td>20%</td>
                                    <td>20%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                    <td>10%</td>
                                    <td>10%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                  </tr>
                                </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="solution2" role="tabpanel" aria-labelledby="solution-tab2">
                        <table class="table table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">DESCRIPTION</th>
                                    <th rowspan="2">Qty</th>
                                    <th rowspan="2">Disc(%) Modal</th>
                                    <th rowspan="2">Gross-Up(%) Modal</th>
                                    <th rowspan="2">Harga Satuan Modal</th>
                                    <th rowspan="2">Harga Total Modal</th>
                                    <th rowspan="2">Disc(%) Jual</th>
                                    <th rowspan="2">Gross-Up(%) Jual</th>
                                    <th rowspan="2">Harga Satuan Jual</th>
                                    <th rowspan="2">Harga Total Jual</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>oracle</td>
                                    <td>2</td>
                                    <td>20%</td>
                                    <td>20%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                    <td>10%</td>
                                    <td>10%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                  </tr>
                                </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="service2" role="tabpanel" aria-labelledby="service-tab2">
                      <table class="table table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">DESCRIPTION</th>
                                    <th rowspan="2">Qty</th>
                                    <th rowspan="2">Disc(%) Modal</th>
                                    <th rowspan="2">Gross-Up(%) Modal</th>
                                    <th rowspan="2">Harga Satuan Modal</th>
                                    <th rowspan="2">Harga Total Modal</th>
                                    <th rowspan="2">Disc(%) Jual</th>
                                    <th rowspan="2">Gross-Up(%) Jual</th>
                                    <th rowspan="2">Harga Satuan Jual</th>
                                    <th rowspan="2">Harga Total Jual</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>oracle</td>
                                    <td>2</td>
                                    <td>20%</td>
                                    <td>20%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                    <td>10%</td>
                                    <td>10%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                  </tr>
                                </tbody>
                        </table>
                      </div>
                      <div class="tab-pane fade" id="maint2" role="tabpanel" aria-labelledby="maint-tab2">
                      <table class="table table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">DESCRIPTION</th>
                                    <th rowspan="2">Qty</th>
                                    <th rowspan="2">Disc(%) Modal</th>
                                    <th rowspan="2">Gross-Up(%) Modal</th>
                                    <th rowspan="2">Harga Satuan Modal</th>
                                    <th rowspan="2">Harga Total Modal</th>
                                    <th rowspan="2">Disc(%) Jual</th>
                                    <th rowspan="2">Gross-Up(%) Jual</th>
                                    <th rowspan="2">Harga Satuan Jual</th>
                                    <th rowspan="2">Harga Total Jual</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>oracle</td>
                                    <td>2</td>
                                    <td>20%</td>
                                    <td>20%</td>
                                    <td>50000</td>
                                    <td>50000</td>
                                    <td>10%</td>
                                    <td>10%</td>
                                    <td>50000</td>
                                    <td>50000</td>
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
@endsection