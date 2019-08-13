@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form New Project</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Project Name</label>
                            <input type="text" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label>Customer Name</label>
                            <input type="text" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection