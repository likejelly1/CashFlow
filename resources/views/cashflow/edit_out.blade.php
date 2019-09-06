@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Edit Cash out Flow</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @foreach($outflow as $of)
                        <form action="{{ route('cashflow.updateOut', $of->id)}}" method="post">
                            {{csrf_field()}}
                            {{ method_field('PUT')}}
                            <input type="hidden" name="project_id" value="{{$of->project_id}}">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Description Item</label>
                                    <input type="text" class="form-control form-control-lg" name="description" value="{{$of->description}}">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input name="execution_date" type="date" class="form-control daterange-cus" value="{{$of->execution_date}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Cost</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Rp
                                            </div>
                                        </div>
                                        <input type="number" name="cost" class="form-control form-control-md" value="{{$of->cost}}">
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