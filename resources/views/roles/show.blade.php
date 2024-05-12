@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2> صلاحيات الوظيفه
<hr>
                    <div class="float-end">

                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> رجوع</a>
                      </div>

               <br>     </h2>
            </div>
        </div>
    </div>


    <div class="row" dir="rtl">
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>الإسم:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>الصلاحيات:</strong>
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                        <label class="label label-secondary text-dark">{{ $v->name }},</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
