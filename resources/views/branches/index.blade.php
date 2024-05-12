
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>إدارة الفروع<i class="fa-solid fa-location-pin"></i>

         <hr>           <div class="float-end">
              @can('branch-create')
              <a class="btn btn-success" href="{{ route('branches.create') }}">إنشاء فرع جديد </a>
              @endcan
          </div>
        <br>
        </h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>#</th>
            <th>المدينه</th>
            <th>الفروع</th>
            <th width="280px">Actions</th>
        </tr>
        @php $i = 0; @endphp


        @foreach ($branches as $branch)
        @php $i++; @endphp
     <tr>
        <td>{{ $i }}</td>
         <td>{{ $branch->town }}</td>
         <td>{{ $branch->branch_name }}</td>
         <td>
                <form action="{{ route('branches.destroy',$branch->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('branches.show',$branch->id) }}"><i class="fa-solid fa-eye"></i></a>
                    @can('branch-edit')
                    <a class="btn btn-primary" href="{{ route('branches.edit',$branch->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('branch-delete')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    @endcan
                </form>
         </td>
     </tr>
     @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $branches->links('pagination::bootstrap-4') }}
    </div>
@endsection
