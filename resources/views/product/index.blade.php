@extends('layouts.master')
@section('content')

<section class="section">
  <div class="section-header">
    <h1>Our Products</h1>
    <div class="section-header-button">
      <button id="createProduct" class="btn btn-primary">Add New</button>
    </div>
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
              <table id="itemList" class="table table-striped">
                <thead>
                  <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Categories</th>
                    <th>Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="dataTable">
                  @include('product.table')
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Modal  -->
<div class="modal fade" id="tambahProductModalLong" tabindex="-1" role="dialog" aria-labelledby="tambahProductModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahProductModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addProductForm" action="{{route('product.store')}}" method="POST">
        @csrf
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="product_code" id="productCode">
        <div class="modal-body">
          <div class="form-group">
            <div class="section-title">Product Name</div>
            <input required id="name" type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <div class="section-title">Categories</div>
            <select name="categories" class="form-control select2">
              @foreach($categories as $c)
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="saveButton" class="btn btn-primary"></button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script.js')
<script src="{{asset('stisla\assets\js\page\forms-advanced-forms.js')}}"></script>

<script>
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      }
    });

    function load() {
      $.ajax({
        url: "{{route('product.load')}}",
        success: function(response) {
          $('#dataTable').html(response);
        }
      });
    }


    $('#itemList').DataTable();
    // add modal
    $('#createProduct').click(function(e) {
      $('#saveButton').html("Create product");
      $('#addProductForm').trigger("reset");
      $('#tambahProductModalLongTitle').html("Add Product");
      $('#tambahProductModalLong').modal('show');
    });


    // edit
    $('.edit').click(function(e) {
      e.preventDefault();
      // alert('ini button edit');
      var id = $(this).data('id');
      // console.log(id);
      $.get("/product/" + id + "/edit",
        function(data) {
          // console.log(data);
          $('#saveButton').html("Update product");
          // $('#addProductForm').trigger("reset");
          $('#tambahProductModalLongTitle').html("Edit Product");
          $('#name').val(data.name);
          $('#price').val(data.price);
          $('#id').val(data.id);
          $('#productCode').val(data.code);
          $('#tambahProductModalLong').modal('show');
        });

    });


    // delete
    // $('.delete').click(function(e) {
    //   e.preventDefault();
    //   // console.log(1);
    //   var id = $(this).data('id');
    //   // console.log(id);
    //   var c = confirm("Are you sure want to delete?");
    //   if (c) {
    //     $.ajax({
    //       type: "DELETE",
    //       data: {
    //         "id": id,
    //         "_token": "{{csrf_token()}}"
    //       },
    //       url: "/product/" + id,
    //       success: function(data) {
    //         if (data.status == "sukses") {
    //           alert("data berhasil dihapus");
    //           load();
    //         } else {
    //           alert("data gagal dihapus");
    //         }
    //       }
    //     });

    //   } else {
    //     alert("tidak jadi");
    //   }
    // });

    // save or updata
    // $('#addProductForm').submit(function(e) {
    //   e.preventDefault();
    //   var request = new FormData(this);
    //   // console.log(request);
    //   $.ajax({
    //     url: "{{route('product.store')}}",
    //     method: "POST",
    //     data: request,
    //     contentType: false,
    //     cache: false,
    //     processData: false,
    //     success: function(data) {
    //       if (data.status == "sukses") {
    //         $('.close').click();
    //         alert('transaksi e');
    //         load();
    //       } else {
    //         alert('data gagal masuk');
    //       }
    //       load();
    //     }
    //   });
    // });








  });
</script>
@endsection