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
                    <form action="{{route ('cogs.storeProject')}}" method="post">
                        {{csrf_field() }}
                        <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control form-control-lg" name="name">
                            </div>
                            <div class="form-group">
                                <label for="cust_name">Customer Name</label>
                                <select class="form-control" name="customer_id">
                                    @foreach ($c as $customer)
                                    <option value="{{ $customer->id}}">
                                        {{$customer->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="author">Author</label>
                                <input readonly type="text" class="form-control form-control-lg" value="" name="user_id">
                            </div> -->
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
</section>
@endsection