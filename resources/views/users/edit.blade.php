@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>تعديل بيانات المستخدم
                    <hr>
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> رجوع</a>
                    </div>
                    <br>
                </h2>
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


    <form action="{{ route('users.update', $user->id) }}" method="PATCH">
        @csrf
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:الإسم</strong>
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                        placeholder="الإسم" dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:البريد الإلكتروني</strong>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                    placeholder="البريد الإلكتروني" dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:كلمة المرور</strong>
                    <input type="password" name="password" class="form-control"
                    placeholder="كلمة المرور" dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:تأكيد كلمة المرور</strong>
                    <input type="password" name="confirm-password" class="form-control"
                    placeholder="تأكيد كلمة المرور" dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:الوظيفه</strong>
                    <select class="form-control multiple text-end" multiple name="roles[]">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-start">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>

@endsection
