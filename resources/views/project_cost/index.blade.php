@extends('layouts.master')

@section('content')

        <section class="section">
          <div class="section-header">
            <h1>Project Cost</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Projects</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Kode Project</th>
                          <th>Project Name</th>
                          <th>Customer Name</th>
                          <th>Author</th>
                          <th>Number Of Items</th>
                          <th>Action</th>
                        </tr>
                        <tr>
                          <td>PRO13190001</td>
                          <td>Project 1</td>
                          <td>PT. Pangau Terbang</td>
                          <td>Eko </td>
                          <td>0</td>
                          <td>
                            <a href="{{ route('pc.show')}}" class="btn btn-info btn-icon icon-left">
                                <i class="fas fa-eye"></i>
                                View Items
                            </a>
                          </td>
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