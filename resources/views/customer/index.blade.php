@extends('layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Customer</h1>

    </div>
    <div class="section-body">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Customers</h4>
                        <div class="card-header-action">
                            <a href="{{ route('customer.add')}}" class="btn btn-danger"><i class="fas fa-plus"></i> Add New Customer</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="clearfix mb-3"></div>
                        <div class="table-responsive">
                            <table id="itemList" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Institution Name</th>
                                        <th>Person Name </th>
                                        <th>Position</th>
                                        <th>Department</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                    @foreach($customer as $cust)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cust->institution_name }}</td>
                                        <td>{{ $cust->person_name }}</td>
                                        <td>{{ $cust->position }}</td>
                                        <td>{{ $cust->department }}</td>
                                        <td>{{ $cust->email }}</td>
                                        <td>{{ $cust->phone_number }}</td>
                                        <td>
                                            <form action="{{ route('customer.destroy', $cust->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('customer.edit', $cust->id) }}" class="btn btn-icon edit btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <button class="btn btn-icon delete btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
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
        $('#itemList').DataTable();
    });
</script>
@endsection
@endsection