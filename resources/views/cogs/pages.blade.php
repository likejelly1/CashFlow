@extends('layouts.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Summary Project</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('cogs.project')}}">List Project</a></div>
      <div class="breadcrumb-item ">Project Detail</div>
    </div>
  </div>
  <h4 class="section-title"><span>Project Code : </span>{{ $project->code }}</h4>

  <div class="statistic-details mt-sm-4">
    <div class="statistic-details-item mt-4">
      <div class="detail-value" style="color: red;"> Harga Modal :</div>
      <div class="detail-value" style="color: red;"> Harga Jual :</div>
    </div>

    <div class="statistic-details-item">
      <span class="text-muted">PPN 10%</span>
      <div class="detail-value"> $243</div>
      <div class="detail-value"> $243</div>
      <div class="detail-name">Hardware Total</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted">PPN 10%</span>
      <div class="detail-value"> $243</div>
      <div class="detail-value">$2,902</div>
      <div class="detail-name">Software License Total</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted">PPN 10%</span>
      <div class="detail-value"> $243</div>
      <div class="detail-value">$12,821</div>
      <div class="detail-name">APP License Total</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted"> PPN 10%</span>
      <div class="detail-value"> $243</div>
      <div class="detail-value">$92,142</div>
      <div class="detail-name">MIB's Solution Total</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted"> PPN 10%</span>
      <div class="detail-value"> $243</div>
      <div class="detail-value">$92,142</div>
      <div class="detail-name">MIB's Professional Service Total</div>
    </div>
    <div class="statistic-details-item">
      <span class="text-muted"> PPN 10%</span>
      <div class="detail-value"> $243</div>
      <div class="detail-value">$92,142</div>
      <div class="detail-name">MIB's Maintenance Service Total</div>
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
                <a class="nav-link" id="all-tab2" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">{{ucfirst('all products')}}</a>
              </li>
              @foreach($category as $c)
              <li class="nav-item">
                <a class="nav-link" data-id="{{$c->id}}" id="{{$c->name}}-tab2" data-toggle="tab" href="#{{$c->name}}" role="tab" aria-controls="{{$c->name}}" aria-selected="true">{{ucfirst($c->name)}}</a>
              </li>
              @endforeach
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab2">
                <!-- <div class="clearfix mb-3"></div> -->
                <table class="table table-stripped table-responsive">
                  <thead class="thead-dark">
                    <tr>
                      <th>#</th>
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
                    @foreach($product_carts as $res)
                    <tr>
                      <td>{{$loop->iteration}}</td>
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
          <input id="project_id" type="hidden" name="project_id" value="{{$project->id}}">
          <div class="form-group">
            <label for="desc">Product Description</label>
            <select class="form-control" name="product_id">
              @foreach ($product as $p)
              <option value="{{$p->id}}">{{$p->name}}</option>
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
    $('.table').DataTable();
    $('#hardware-tab2').addClass("active");
    $('#hardware').addClass("active show");
    // $('#hardware').addClass("show");
  });
  $('.nav-link').click(function(e) {
    e.preventDefault();
    var cat_id = $(this).data('id');
    var proj_id = $('#project_id').val();
    // console.log(cat_id);
    $.get("/cogs/" + proj_id + "/getdata/" + cat_id, function(data) {
      // $('#dataTable').html(data);
      console.log(data);
    });
  });
</script>
@endsection

@endsection