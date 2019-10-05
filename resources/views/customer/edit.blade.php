@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form New Customer</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @foreach($customer as $cust)
                        <form action="{{ route('customer.update', $cust->id )}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT')}}
                            <div class="form-group">
                                <label>Institution Name</label>
                                <input type="text" name="institution_name" class="form-control form-control-lg" value="{{ $cust->institution_name }}">
                            </div>
                            <div class="form-group">
                                <label>Person Name</label>
                                <input type="text" name="person_name" class="form-control form-control-lg" value="{{ $cust->person_name }}">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control form-control-lg" value="{{ $cust->position }}">
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" name="department" class="form-control form-control-lg" value="{{ $cust->department }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control form-control-lg" value="{{ $cust->email }}">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="phone_number" class="form-control phone-number" value="{{ $cust->phone_number }}">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Save change</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </form>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection