@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <a href="{{ route('customer.index')}}" class="btn btn-danger btn-circle-sm m-1"><i class="fas fa-chevron-left"></i></a>
        <h1 style="padding-left:10px">Form New Customer</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('customer.store')}}" method="post">
                            {{ csrf_field() }}
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
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection