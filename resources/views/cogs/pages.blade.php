@extends('layouts.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Summary Project</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{url ('/cogs/index2')}}">List Project</a></div>
      <div class="breadcrumb-item ">Project Detail</div>
    </div>
  </div>

  <div class="statistic-details mt-sm-4">
    <div class="statistic-details-item">
      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
      <div class="detail-value">$243</div>
      <div class="detail-name">Today's Sales</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
      <div class="detail-value">$2,902</div>
      <div class="detail-name">This Week's Sales</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
      <div class="detail-value">$12,821</div>
      <div class="detail-name">This Month's Sales</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
      <div class="detail-value">$92,142</div>
      <div class="detail-name">This Year's Sales</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
      <div class="detail-value">$92,142</div>
      <div class="detail-name">This Year's Sales</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
      <div class="detail-value">$92,142</div>
      <div class="detail-name">This Year's Sales</div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Project Detail</h4>
            <div class="card-header-action">
              <button type="button" class="btn btn-primary text-right" data-toggle="modal" data-target="#editModal"><i class="fas fa-plus"></i> Add Project Detail</button>
            </div>
          </div>
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
                <table id="projectDetail" class="table table-bordered table-responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th>DESCRIPTION</th>
                      <th>Qty</th>
                      <th>Satuan</th>
                      <th>Price List(satuan)</th>
                      <th>Price List(total)</th>
                      <th><a>Disc(%)</a></th>
                      <th><a>Gross-Up(%)</a></th>
                      <th>Harga Satuan Modal</th>
                      <th>Harga Total Modal</th>
                      <th><a>Disc(%) Jual</a></th>
                      <th><a>Gross-Up(%) Jual</a></th>
                      <th>Harga Satuan Jual</th>
                      <th>Harga Total Jual</th>

                    </tr>
                  </thead>
                  <tbody id="dataTable">
                    @foreach($project->product_carts as $res)

                    <tr>
                      <td>{{ $res->product->name }}</td>
                      <td>{{ $res->qty }}</td>
                      <td><a href="#">null</a></td>
                      <td>{{ $res->product->price }}</td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="software" role="tabpanel" aria-labelledby="profile-tab2">

                <div class="clearfix mb-3"></div>
                <table id="projectDetail" class="table table-bordered table-responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">DESCRIPTION</th>
                      <th rowspan="2">Qty</th>
                      <th rowspan="2">Satuan</th>
                      <th rowspan="2">Price List(satuan)</th>
                      <th rowspan="2">Price List(total)</th>
                      <th rowspan="2"><a>Disc(%)</a></th>
                      <th rowspan="2"><a>Gross-Up(%)</a></th>
                      <th rowspan="2">Harga Satuan Modal</th>
                      <th rowspan="2">Harga Total Modal</th>
                      <th rowspan="2"><a>Disc(%) Jual</a></th>
                      <th rowspan="2"><a>Gross-Up(%) Jual</a></th>
                      <th rowspan="2">Harga Satuan Jual</th>
                      <th rowspan="2">Harga Total Jual</th>
                    </tr>
                  </thead>
                  <tbody id="dataTable">
                    @foreach($project->product_carts as $res)

                    <tr>
                      <td>{{ $res->product->name }}</td>
                      <td>{{ $res->qty }}</td>
                      <td><a href="#">null</a></td>
                      <td>{{ $res->product->price }}</td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                      <td><a href="#">null</a></td>
                    </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">

                <div class="clearfix mb-3"></div>
                <table id="projectDetail" class="table table-bordered table-responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">DESCRIPTION</th>
                      <th rowspan="2">Qty</th>
                      <th rowspan="2">Satuan</th>
                      <th rowspan="2">Price List(satuan)</th>
                      <th rowspan="2">Price List(total)</th>
                      <th rowspan="2"><a>Disc(%)</a></th>
                      <th rowspan="2"><a>Gross-Up(%)</a></th>
                      <th rowspan="2">Harga Satuan Modal</th>
                      <th rowspan="2">Harga Total Modal</th>
                      <th rowspan="2"><a>Disc(%) Jual</a></th>
                      <th rowspan="2"><a>Gross-Up(%) Jual</a></th>
                      <th rowspan="2">Harga Satuan Jual</th>
                      <th rowspan="2">Harga Total Jual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>oracle</td>
                      <td>2</td>
                      <td></td>
                      <td></td>
                      <td></td>
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
              <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="solution-tab2">

                <div class="clearfix mb-3"></div>
                <table id="projectDetail" class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">DESCRIPTION</th>
                      <th rowspan="2">Qty</th>
                      <th rowspan="2">Satuan</th>
                      <th rowspan="2">Price List(satuan)</th>
                      <th rowspan="2">Price List(total)</th>
                      <th rowspan="2"><a>Disc(%)</a></th>
                      <th rowspan="2"><a>Gross-Up(%)</a></th>
                      <th rowspan="2">Harga Satuan Modal</th>
                      <th rowspan="2">Harga Total Modal</th>
                      <th rowspan="2"><a>Disc(%) Jual</a></th>
                      <th rowspan="2"><a>Gross-Up(%) Jual</a></th>
                      <th rowspan="2">Harga Satuan Jual</th>
                      <th rowspan="2">Harga Total Jual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>oracle</td>
                      <td>2</td>
                      <td></td>
                      <td></td>
                      <td></td>
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
              <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="service-tab2">

                <div class="clearfix mb-3"></div>
                <table id="projectDetail" class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">DESCRIPTION</th>
                      <th rowspan="2">Qty</th>
                      <th rowspan="2">Satuan</th>
                      <th rowspan="2">Price List(satuan)</th>
                      <th rowspan="2">Price List(total)</th>
                      <th rowspan="2"><a>Disc(%)</a></th>
                      <th rowspan="2"><a>Gross-Up(%)</a></th>
                      <th rowspan="2">Harga Satuan Modal</th>
                      <th rowspan="2">Harga Total Modal</th>
                      <th rowspan="2"><a>Disc(%) Jual</a></th>
                      <th rowspan="2"><a>Gross-Up(%) Jual</a></th>
                      <th rowspan="2">Harga Satuan Jual</th>
                      <th rowspan="2">Harga Total Jual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>oracle</td>
                      <td>2</td>
                      <td></td>
                      <td></td>
                      <td></td>
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
              <div class="tab-pane fade" id="contact2" role="tabpanel" aria-labelledby="maint-tab2">

                <div class="clearfix mb-3"></div>
                <table id="projectDetail" class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">DESCRIPTION</th>
                      <th rowspan="2">Qty</th>
                      <th rowspan="2">Satuan</th>
                      <th rowspan="2">Price List(satuan)</th>
                      <th rowspan="2">Price List(total)</th>
                      <th rowspan="2"><a>Disc(%)</a></th>
                      <th rowspan="2"><a>Gross-Up(%)</a></th>
                      <th rowspan="2">Harga Satuan Modal</th>
                      <th rowspan="2">Harga Total Modal</th>
                      <th rowspan="2"><a>Disc(%) Jual</a></th>
                      <th rowspan="2"><a>Gross-Up(%) Jual</a></th>
                      <th rowspan="2">Harga Satuan Jual</th>
                      <th rowspan="2">Harga Total Jual</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>oracle</td>
                      <td>2</td>
                      <td></td>
                      <td></td>
                      <td></td>
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

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Project Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('cogs.storeProcart')}}" method="post">

          {{csrf_field()}}
          <input type="hidden" name="project_id" value="{{$project->id}}">
          <div class="form-group">
            <label for="desc">Product Description</label>
            <select class="form-control" name="product_id">
              @foreach ($product as $p)
              <option value="{{$p->id}}">{{$p->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="cat">Categories</label>
            <select class="form-control" name="categories_id">
              @foreach ($category as $c)
              <option value="{{$c->id}}">{{$c->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="qty">Qty</label>
            <input type="text" class="form-control form-control-lg" name="qty">
          </div>
          <!-- <div class="form-group">
              <label for="pl_satuan">Price List(satuan)</label>
              <input readonly type="text" class="form-control form-control-lg" value="" name="u">
          </div> -->
      </div>
      <div class="modal-footer">
        <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@section('script.js')
<script>
  $(document).ready(function() {
    $('projectDetail').DataTable();
  });
</script>
@endsection

@endsection