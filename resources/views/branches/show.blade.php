@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>تفاصيل المنطقة</h2>
                <hr>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('branches.index') }}">رجوع</a>
            </div>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>المدينه:</strong>
                {{ $branch->town }}
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>الفرع:</strong>
                {{ $branch->branch_name }}
            </div>
        </div>
    </div>
@endsection
