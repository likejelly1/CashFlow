@extends('layouts.master')
@php
$user = \Illuminate\Support\Facades\Auth::user();
@endphp
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form New Project</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('cogs.project')}}">List Project</a></div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-success alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Success</div>
                        {{ session()->get('message') }}
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('cogs.storeProject')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Project Name</label>
                                <input required type="text" name="name" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label>Customer Name</label>
                                <select required class="form-control" name="customer_id">
                                    @foreach ($c as $customer)
                                    <option value="{{ $customer->id }}">{{$customer->institution_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal"><i class="fas fa-plus"></i> Add New Customer</button>
                            </div>
                            <div class="form-group">
                                <label>Author</label>

                                <input value="{{ $user->name }}" type="text" name="user_id" class="form-control form-control-lg" disabled>

                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cogs.storeCustomer')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Institution Name</label>
                        <input type="text" name="institution_name" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label>Person Name</label>
                        <input type="text" name="person_name" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        <input type="text" name="position" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label>Department</label>
                        <input type="text" name="department" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <input type="text" name="phone_number" class="form-control phone-number">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button id="closeModalTambah" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection