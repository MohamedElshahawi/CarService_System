
@extends('layouts.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>بيانات المستخدم</h2>
            <hr>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> رجوع</a>
            </div>
            <br>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 mb-3">
        <div class="form-group text-end">
            <strong>الإسم:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group text-end">
            <strong>البريد الإلكتروني: </strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group text-end">
            <strong>الوظيفه:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-secondary text-dark">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
