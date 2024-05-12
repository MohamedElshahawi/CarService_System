@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>بيانات الفاتورة</h2>
                <hr>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('invoices.index') }}">رجوع</a>
            </div>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong> الإسم:</strong>
                <td>{{ $invoice->getClientFullName() }}</td>
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>رقم الجوال:</strong>
          <span dir="ltr"> {{ $invoice->getClientPhoneNumber() }}</span>
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong> رقم الفاتورة:</strong>
                {{ $invoice->invoice_number }}
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>رصيد الكاش باك:</strong>
                {{ $invoice->getClientCashBack() }} ر.س
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>القيمة الإجمالية قبل التطبيق الخصم:</strong>
                {{ $invoice->invoice_amount + $invoice->discount }} ر.س
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong> الخصم:</strong>
                <td>{{ $invoice->discount }}  ر.س</td>
            </div>
        </div>



        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>    إجمالي الفاتورة:</strong>
                {{ $invoice->invoice_amount }} ر.س
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong> الفرع:</strong>
                {{ $invoice->getBranchInfoAttribute() }}
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>تاريخ إنشاء الفاتوره :</strong>
                {{ $invoice->created_at->format('j/n/Y ' ) }}

            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>توقيت إنشاء الفاتوره :</strong>
                {{ $invoice->created_at->format(' g:i A ' ) }}
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <label class="label btn-sm btn-secondary btn-rounded">  <i class="faj fa-clock">{{ $invoice->created_at->diffForHumans()}}</i></label>
            </div>
        </div>

    </div>



</div>
@endsection
