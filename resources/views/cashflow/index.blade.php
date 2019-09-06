@extends('layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Cash Flow</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Our Projects</h4>
                    </div>
                    <div class="card-body ">
                        <div class="clear-fix mb3"></div>
                        <div class="table-responsive">
                            <table id="projectList" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Project</th>
                                        <th>Project Name</th>
                                        <th>Customer Name</th>
                                        <th>Author</th>
                                        <th>Number Of Billings</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $p)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$p->code}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{ucfirst($p->customer->institution_name)}}</td>
                                        <td>{{ucfirst($p->user->name)}}</td>
                                        <td> {{count($p->inflow)}}</td>
                                        <td>
                                            <a href="{{ route('cashflow.show',['id'=>$p->id])}}" class="btn btn-light btn-icon icon-left">
                                                <i class="fas fa-eye"></i>
                                                In-flow
                                            </a>
                                            <a href="{{ route('cashflow.showOutflow',['id'=>$p->id])}}" class="btn btn-dark btn-icon icon-left">
                                                <i class="fas fa-eye"></i>
                                                Out-flow
                                            </a>
                                        </td>
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
@section('script.js')
<script>
    $(document).ready(function() {
        $('#projectList').DataTable();
    })
</script>
@endsection
@endsection