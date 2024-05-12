@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>أنشاء مستخدم جديد
                    <hr>
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('users.index') }}"> رجوع</a>
                    </div>
                </h2>
                <br>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> يوجد مشاكل في البيانات التي أدخلتها.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>الإسم</strong>
                    <input type="text" name="name" class="form-control" placeholder="الإسم" >
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>البريد الإلكتروني:</strong>
                    <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" >
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>كلمة المرور:</strong>
                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور" >
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>تأكيد كلمة المرور:</strong>
                    <input type="password" name="confirm-password" class="form-control" placeholder="تأكيد كلمة المرور">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>الوظيفه:</strong>
                    <select class="form-control multiple text-end" multiple name="roles[]" >
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-start">
                <br>
                <button type="submit" class="btn btn-primary">أنشاء</button>
            </div>
        </div>
    </form>

@endsection
