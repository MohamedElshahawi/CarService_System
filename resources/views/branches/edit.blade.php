
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>تعديل المنطقة</h2>
                <hr>
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('branches.index') }}">رجوع</a>
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

    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong> المدينه:</strong>
                    <input type="text" name="town" value="{{ $branch->town }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group text-end">
                    <strong>عنوان الفرع:</strong>
                    <input type="text" name="branch_name" value="{{ $branch->branch_name }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-start">
                <br>

                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </div>
    </form>
@endsection
