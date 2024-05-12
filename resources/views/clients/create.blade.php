@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>إنشاء عميل جديد
                    <hr>
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('clients.index') }}"> رجوع</a>
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

    @if(session('error_message'))
    <div class="alert alert-danger">
        {{ session('error_message') }}
    </div>
@endif

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>الإسم الاول:</strong>
                    <input type="text" name="f_name" class="form-control" placeholder="الإسم الاول " >
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>الإسم الثاني:</strong>
                    <input type="text" name="m_name" class="form-control" placeholder="الإسم الثاني" >
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>إسم العائله:</strong>
                    <input type="text" name="l_name" class="form-control" placeholder="إسم العائله " >
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>رقم الجوال:</strong>
                    <input type="text" name="phone_number" class="form-control" placeholder="رقم الجوال ">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>رصيد الكاش باك :</strong>
                        <input type="number" name="cash_back" class="form-control" placeholder="رصيد الكاش باك " value="0">
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-start">
                <br>
                <button type="submit" class="btn btn-primary">إنشاء</button>
            </div>
        </div>
    </form>
@endsection
