@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Edit Cash in Flow</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @foreach($inflow as $in)
                        <form action="{{ route('cashflow.update', $in->id)}}" method="post">
                            {{csrf_field()}}
                            {{ method_field('PUT')}}
                            <input type="hidden" name="project_id" value="{{$in->project_id}}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Billing</label>
                                    <input type="text" class="form-control form-control-lg" name="billing" value="{{$in->billing}}" placeholder="enter description billing">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input name="execution_date" value="{{$in->execution_date}}" type="date" class="form-control daterange-cus">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Percent</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-percent"></i>
                                            </div>
                                        </div>
                                        <input type="number" name="percent" value="{{$in->percent}}" min="0" max="100" class="form-control form-control-md">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Save Change</button>
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