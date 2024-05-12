@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>إنشاء وظيفه جديده
                    <hr>
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                    </div>
                    <br>
                </h2>
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













    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-end">
                    <strong>الإسم:</strong>
                    <input type="text" name="name" class="form-control" placeholder="الإسم" dir="rtl">
                </div>
                <br>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group text-end">
                    <strong>الصلاحيات:</strong>
                    <br>
                    @foreach ($permission as $value)
                        <label>
                            <input type="checkbox"   name="permission[]" value="{{ $value->id }}" class="name" >
                            {{ $value->name }}</label>

                        <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-start">
                <button type="submit" class="btn btn-primary">أنشاء</button>
            </div>
        </div>
    </form>
@endsection
