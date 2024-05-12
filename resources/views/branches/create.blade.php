@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>أضافه فرع جديد
                    <hr>
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('branches.index') }}"> رجوع</a>
                    </div>
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

    <form action="{{ route('branches.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>المدينه:</strong>
                    <input type="text" name="town" class="form-control" placeholder="أسم المدينه" >
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:عنوان الفرع:</strong>
                        <input type="text" name="branch_name" class="form-control" placeholder="أسم الفرع">
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-start">
                <br>
                <button type="submit" class="btn btn-primary">أنشاء</button>
            </div>
        </div>
    </form>
@endsection
