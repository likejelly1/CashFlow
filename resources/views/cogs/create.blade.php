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
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('cogs.storeProject')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" name="name" class="form-control form-control-lg">
                            </div>
                            <div class="form-group">
                                <label>Customer Name</label>
                                <select class="form-control" name="customer_id">
                                    @foreach ($c as $customer)
                                    <option value="{{ $customer->id }}">{{$customer->institution_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Author</label>

                                <input value="{{ $user->name }}" type="text" name="user_id" class="form-control form-control-lg" disabled>

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