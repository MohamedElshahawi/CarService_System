
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>تعديل بيانات العميل</h2>
                <hr>
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('clients.index') }}">رجوع</a>
                </div>

            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:الإسم الاول</strong>
                    <input type="text" name="f_name" value="{{ $client->f_name }}" class="form-control" placeholder="الإسم الاول "  dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:الإسم الثاني</strong>
                    <input type="text" name="m_name" value="{{ $client->m_name }}" class="form-control" placeholder="الإسم الثاني" dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>  :إسم العائله    </strong>
                    <input type="text" name="l_name" value="{{ $client->l_name }}" class="form-control" placeholder="إسم العائله "  dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong> :رقم الجوال</strong>
                    <input type="text" name="phone_number" value="{{ $client->phone_number }}" class="form-control" placeholder="رقم الجوال "  dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>:رصيد الكاش باك </strong>
                    <input type="number" name="cash_back" value="{{ $client->cash_back}}" class="form-control" placeholder="رصيد الكاش باك " dir="rtl">
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-start">
                <br>

                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>
@endsection
