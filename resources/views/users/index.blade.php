@extends('layouts.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>إدارة المستخدمين<i class="fa-solid fa-users-gear"></i>
                <hr>
        <div class="float-end">
            <a class="btn btn-success" href="{{ route('users.create') }}"> إنشاء مستخدم جديد</a>
        </div>
        <br>
            </h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success my-2">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered table-hover table-striped">
 <tr>
    <th>#</th>
   <th>الإسم</th>
   <th> البريد الإلكتروني</th>
   <th>الوظيفه</th>
   <th width="280px">Actions</th>
 </tr>
 @php $i = 0; @endphp
 @foreach ($data as $key => $user)
 @php $i++; @endphp

  <tr>
    <td>{{ $i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>

      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-secondary text-dark">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i class="fa-solid fa-eye"></i></a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
        <a class="btn btn-danger" href="{{ route('users.destroy',$user->id) }}"> <i class="fa-solid fa-trash"></i></a>
    </td>
  </tr>
 @endforeach
</table>
<div class="d-flex justify-content-center">
    {{ $data->links('pagination::bootstrap-4') }}
</div>
@endsection
