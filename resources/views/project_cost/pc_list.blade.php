@extends('layouts.master')

@section('content')


<section class="section">
          <div class="section-header">
            <h1>Project Cost</h1>
            <div class="section-header-button">
              <a href="features-post-create.html" class="btn btn-primary">Add New</a>
            </div>
            
            <div class="section-header-breadcrumb">
                <h1>Project Code : <b style="color:#">#PRO08190001</b></h1>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Items</h2>
            <p class="section-lead">
              You can manage all Items, such as editing, deleting and more.
            </p>

    
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
                        <th>#</th>
                        <th>Item</th>
                        <th>Rate</th>
                        <th>Qty</th>
                        <th>Frequency</th>
                        <th>Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0</td>
                        <td>Laravel 5 Tutorial: Introduction
                            <div class="table-links">
                            <a href="#">View</a>
                            <div class="bullet"></div>
                            <a href="#">Edit</a>
                            <div class="bullet"></div>
                            <a href="#" class="text-danger">Trash</a>
                            </div>
                        </td>
                        <td>
                            <a href="#">Web Developer</a>,
                            <a href="#">Tutorial</a>
                        </td>
                        <td>
                            <a href="#">
                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">Rizal Fakhri</div>
                            </a>
                        </td>
                        <td>2018-01-20</td>
                        <td><div class="badge badge-primary">Published</div></td>
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
                    $('#itemList').DataTable();
                } );
            </script>
        @endsection
@endsection