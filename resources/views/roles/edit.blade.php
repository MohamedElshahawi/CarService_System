@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل صلاحيات الوظيفه
                  <hr>  <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                    </div>
              <br>  </h2><br>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="PATCH">
        @csrf
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:الإسم</strong>
                    <input type="text" value="{{ $role->name }}" name="name" class="form-control" dir="rtl"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:الصلاحيات</strong>
                    <br />
                    @foreach ($permission as $value)
                        <label>
                            <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif name="permission[]"
                                value="{{ $value->id }}" class="name">
                            {{ $value->name }}</label>
                        <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-start">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>


@endsection