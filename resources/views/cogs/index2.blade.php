@extends('layouts.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Projects</h1>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>List Project</h4>
            <div class="card-header-action">
              <a href="{{ route('cogs.addProject')}}" class="btn btn-danger"><i class="fas fa-plus"></i> Add New Project</a>
            </div>
          </div>

          <div class="card-body">
            <div class="clearfix mb-3"></div>
            <div class="table-responsive">
              <table id="projectList" class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Project</th>
                    <th>Project Name</th>
                    <th>Customer Name</th>
                    <th>Author</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($project as $p)
                  <tr>
                    <td>{{ $p->id}}</td>
                    <td>{{ $p->code}}</td>
                    <td>{{ $p->name}}</td>
                    <td>{{ $p->customer->institution_name}}</td>
                    <td>{{ $p->user->name }}</td>
                    <td>

                      <form action="{{route('cogs.destroy', $p->id)}}" method="post">
                        <a href="{{ route('cogs.show', [ 'id' => $p->id ])}}" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fas fa-eye"></i></a>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-icon delete btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete">
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
    $('#projectList').DataTable();
  });
</script>
@endsection
@endsection