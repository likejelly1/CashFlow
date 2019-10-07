@extends('layouts.master')

@section('content')
<section class="section">
  <div class="section-header">
    <a href="{{ route('cogs.project')}}" class="btn btn-danger btn-circle-sm m-1"><i class="fas fa-chevron-left"></i></a>
    <h1 style="padding-left:10px">COGS</h1>
    <div class="section-header-breadcrumb">
      <h1>Project Code : <b>#{{$project->code}}</b></h1>
    </div>
  </div>

  <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
    <div class="card">
      <div class="card-body">
        <div class="statistic-details sm-4">
          <div class="statistic-details-item mt-4">
            <div class="detail-value" style="color: red;"> Harga Modal</div>
            <div class="detail-value" style="color: red;"> Harga Jual</div>
          </div>
          @for($i = 0; $i< count($category); $i++) <div class="statistic-details-item">
            <span class="text-muted">PPN 10%</span>
            <div class="detail-value">Rp {{number_format($total_harga_modal[$i])}}</div>
            <div class="detail-value">Rp {{number_format($total_harga_jual[$i])}}</div>
            <div class="detail-name">{{$category[$i]->name}} Total</div>
        </div>
        @endfor
      </div>
    </div>
  </div>
  </div>


  <div class="section-body">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Project Detail</h4>
            <div class="card-header-action">
              <button id="addProductCarts" class="btn btn-danger text-right"><i class="fas fa-plus"></i> Add Project Detail</button>
            </div>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link all active" id="all-tab2" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All Item</a>
              </li>
              @foreach($category as $c)
              <li class="nav-item">
                <a class="nav-link data" data-id="{{$c->id}}" id="{{$c->name}}-tab2" data-toggle="tab" href="#{{$c->name}}" role="tab" aria-controls="{{$c->name}}" aria-selected="false">{{ucfirst($c->name)}}</a>
              </li>
              @endforeach
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade active show" id="all" role="tabpanel" aria-labelledby="all-tab2">
                <!-- <div class="clearfix mb-3"></div> -->
                <table class="table table-stripped table-responsive">
                  @include('cogs.cart')
                </table>
              </div>
              @foreach($category as $c)
              <div class="tab-pane fade" id="{{$c->name}}" role="tabpanel" aria-labelledby="{{$c->name}}-tab2">
                <!-- <div class="clearfix mb-3"></div> -->
                <table class="table table-stripped table-responsive">
                  @include('cogs.cart')
                </table>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="ProjectDetailModal" tabindex="-1" role="dialog" aria-labelledby="addProjectDetailLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProjectDetailLabel">Add Project Detail</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <form id="productDetailForm" action="{{route('cogs.storeProcart')}}" method="post">

          {{csrf_field()}}
          <input id="project_id" type="hidden" name="project_id" value="{{$project->id}}">
          <input id="code" type="hidden" name="code">
          <div class="form-group">
            <label for="desc">Product Description</label>
            <select class="product form-control" name="product_id">
              @foreach ($product as $p)
              <option value="{{$p->id}}">{{$p->name}} ({{$p->categories->name}})</option>
              @endforeach
            </select>
            <a id="addProduct" class="btn btn-link" href="#">New Product?</a>
          </div>
          <div class="form-group">
            <label for="qty">Qty</label>
            <input id="qty" required type="text" class="form-control form-control-lg" name="qty">
          </div>
          <div class="form-group">
            <label for="unit">Unit</label>
            <input id="unit" required type="text" class="form-control form-control-lg" name="satuan">
          </div>
          <div class="form-group">
            <label>Discount Price List</label>
            <div class="input-group">
              <input readonly id="pl_disc" type="text" name="pl_disc" class="form-control">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  %
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Gross Up Price List</label>
            <div class="input-group">
              <input readonly id="pl_gross" type="text" name="pl_gross" class="form-control">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  %
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Discount Selling</label>
            <div class="input-group">
              <input readonly id="jual_disc" type="text" name="jual_disc" class="form-control">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  %
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Gross Up Selling</label>
            <div class="input-group">
              <input readonly id="jual_gross" type="text" name="jual_gross" class="form-control">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  %
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button id="saveProductDetail" type="submit" class="btn btn-primary"></button>
        <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  -->
<div class="modal fade" id="tambahProductModalLong" tabindex="-1" role="dialog" aria-labelledby="tambahProductModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahProductModalLongTitle">Modal title</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form id="addProductForm" action="{{route('product.store')}}" method="POST">
        @csrf
        <input type="hidden" name="product_code" id="productCode">
        <div class="modal-body">
          <div class="form-group">
            <div class="section-title">Product Name</div>
            <input required id="name" type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <div class="section-title">Categories</div>
            <select name="categories" class="form-control select2">
              @foreach($category as $c)
              <option value="{{$c->id}}">{{$c->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <div class="section-title">Price</div>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  Rp
                </div>
              </div>
              <input required id="price" type="text" name="price" class="form-control money">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="saveButton" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
  $('.data').click(function(e) {
    e.preventDefault();
    var cat_id = $(this).data('id');
    var proj_id = $('#project_id').val();
    $.get("/cogs/" + proj_id + "/getdata/" + cat_id, function(data) {
      $('.table').html(data);
    });
  });
  $('.all').click(function(e) {
    e.preventDefault();
    var proj_id = $('#project_id').val();
    $.get("/cogs/" + proj_id + "/getAllProduct", function(data) {
      $('.table').html(data);
    });
  });

  $('#addProductCarts').click(function(e) {
    $('#saveProductDetail').html("Add product");
    $('#productDetailForm').trigger("reset");
    $('#addProjectDetailLabel').html("Add Product");
    $('#ProjectDetailModal').modal('show');
  });

  $('.satuan').click(function(e) {
    e.preventDefault();
    // console.log(1);
    var id = $(this).data('id');
    $.get("/cogs/edit/" + id, function(data) {
      // console.log(id);
      $('#productDetailForm').trigger("reset");
      $('#code').val(data.code);
      $('#unit').val(data.satuan);
      $('#qty').val(data.qty);
      $('.product').val(data.product_id);
      $('#pl_disc').val(data.discount_pl);
      $('#pl_gross').val(data.grossup_pl);
      $('#jual_disc').val(data.discount_jual);
      $('#jual_gross').val(data.grossup_jual);
      $('#saveProductDetail').html("Update Product");
      $('#addProjectDetailLabel').html("Update Unit Label");
      $('#ProjectDetailModal').modal('show');
    });
  });
  $('.discount_pl').click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.get("/cogs/edit/" + id, function(data) {
      $('#productDetailForm').trigger("reset");
      $('#code').val(data.code);
      $('#qty').val(data.qty);
      $('#unit').val(data.satuan);
      $('.product').val(data.product_id);
      $('#pl_disc').val(data.discount_pl);
      $('#pl_gross').val(data.grossup_pl);
      $('#jual_disc').val(data.discount_jual);
      $('#jual_gross').val(data.grossup_jual);
      $('#pl_disc').removeAttr('readonly');
      $('#saveProductDetail').html("Update Product");
      $('#addProjectDetailLabel').html("Update Discount Price List");
      $('#ProjectDetailModal').modal('show');
    });
  });
  $('.grossup_pl').click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.get("/cogs/edit/" + id, function(data) {
      $('#productDetailForm').trigger("reset");
      $('#code').val(data.code);
      $('#qty').val(data.qty);
      $('#unit').val(data.satuan);
      $('.product').val(data.product_id);
      $('#pl_disc').val(data.discount_pl);
      $('#pl_gross').val(data.grossup_pl);
      $('#jual_disc').val(data.discount_jual);
      $('#jual_gross').val(data.grossup_jual);
      $('#qty').prop('readonly', true);
      $('#pl_disc').prop('readonly', true);
      $('#jual_gross').prop('readonly', true);
      $('#jual_disc').prop('readonly', true);
      $('#pl_gross').removeAttr('readonly');
      $('#saveProductDetail').html("Update Product");
      $('#addProjectDetailLabel').html("Update Gross Up Price List");
      $('#ProjectDetailModal').modal('show');
    });
  });
  $('.discount_jual').click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.get("/cogs/edit/" + id, function(data) {
      $('#productDetailForm').trigger("reset");
      $('#code').val(data.code);
      $('#qty').val(data.qty);
      $('#unit').val(data.satuan);
      $('.product').val(data.product_id);
      $('#pl_disc').val(data.discount_pl);
      $('#pl_gross').val(data.grossup_pl);
      $('#jual_disc').val(data.discount_jual);
      $('#jual_gross').val(data.grossup_jual);
      $('#qty').prop('readonly', true);
      $('#pl_disc').prop('readonly', true);
      $('#pl_gross').prop('readonly', true);
      $('#jual_gross').prop('readonly', true);
      $('#jual_disc').removeAttr('readonly');
      $('#saveProductDetail').html("Update Product");
      $('#addProjectDetailLabel').html("Update Discount Jual");
      $('#ProjectDetailModal').modal('show');
    });
  });
  $('.grossup_jual').click(function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $.get("/cogs/edit/" + id, function(data) {
      $('#productDetailForm').trigger("reset");
      $('#code').val(data.code);
      $('#unit').val(data.satuan);
      $('#qty').val(data.qty);
      $('.product').val(data.product_id);
      $('#pl_disc').val(data.discount_pl);
      $('#pl_gross').val(data.grossup_pl);
      $('#jual_disc').val(data.discount_jual);
      $('#jual_gross').val(data.grossup_jual);
      $('#qty').prop('readonly', true);
      $('#pl_disc').prop('readonly', true);
      $('#pl_gross').prop('readonly', true);
      $('#jual_disc').prop('readonly', true);
      $('#jual_gross').removeAttr('readonly');
      $('#saveProductDetail').html("Update Product");
      $('#addProjectDetailLabel').html("Update Gross Up Jual");
      $('#ProjectDetailModal').modal('show');
    });
  });
  $('#addProduct').click(function(e) {
    e.preventDefault();
    $('#ProjectDetailModal').modal('hide');
    $('#tambahProductModalLong').modal('show');

  });
</script>
@endsection

@endsection