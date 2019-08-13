@extends('layouts.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Projects</h1>
    <div class="section-header-button">
      <a href="{{ url ('/cogs/tambahProject')}}" class="btn btn-primary">Add New</a>
    </div>
  </div>
  
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>List Project</h4>
          </div>

          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Kode Project</th>
                  <th>Project Name</th>
                  <th>Customer Name</th>
                  <th>Author</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><a href="{{ url ('/cogs/pages')}}" class="btn btn-info">View</a></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="float-right">
            <nav>
              <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection