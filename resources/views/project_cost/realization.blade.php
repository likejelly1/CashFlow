<h5>Total Realization : <b>Rp {{number_format($totalcost)}}</b></h5>
<div class="row">
    @foreach($realization as $r)
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h4> Rp {{number_format($r->cost)}}</h4>
                <div class="card-header-action">
                    <button class="btn btn-primary" style="pointer-events: none;">{{$r->execution_date}}</button>
                    <button onclick="document.getElementById('destroyFormReal{{$r->id}}').submit();" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <form id="destroyFormReal{{$r->id}}" style="display: none;" action="{{route('pc.destroy.realization', ['id'=> $r->id])}}" method="POST">
        @method('DELETE')
        @csrf
    </form>
    @endforeach
</div>