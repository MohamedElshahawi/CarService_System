@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2> إدارة الصلاحيات  <i class="fa-solid fa-newspaper"></i>
                  <hr>
                    <div class="float-end">
                        @can('role-create')
                            <a class="btn btn-success" href="{{ route('roles.create') }}"> إنشاء وظيفه جديد</a>
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
            <th>الإسم</th>
            <th width="280px">Actions</th>
        </tr>

        @php $i = 0; @endphp

        @foreach ($roles as $key => $role)
        @php $i++; @endphp

            <tr>
                <td>{{ $i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('roles.show', $role->id) }}"><i class="fa-solid fa-eye"></i></a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('role-delete')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $roles->links('pagination::bootstrap-4') }}
    </div>
@endsection
