@extends('layouts.master')

@section('content')
<div class="container body">
  <div class="main_container">
    <div class="right_col" role="main">
      <div class="">
        <div class="clearfix"></div>

        <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Projects</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 10%">Kode Project</th>
                          <th style="width: 20%">Project Name</th>
                          <th style="width: 20%">Customer Name</th>
                          <th style="width: 20%">Sales Name </th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <a href="{{ url ('/cogs/pages') }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <!-- end project list -->
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection