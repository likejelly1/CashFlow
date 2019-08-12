@extends('layouts.master')

@section('content')

        <section class="section">
          <div class="section-header">
            <h1>Table</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Projects</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Kode Project</th>
                          <th>Customer Name</th>
                          <th>Sales Name</th>
                          <th>Action</th>
                        </tr>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><a href="{{ url ('/cogs/pages')}}" class="btn btn-secondary">View</a></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>
@endsection