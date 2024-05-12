@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>بيانات العميل</h2>
                <hr>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('clients.index') }}">رجوع</a>
            </div>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong> الإسم:</strong>
                <td>{{ $client->f_name . ' ' . $client->m_name . ' ' . $client->l_name }}</td>
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group ">
                <strong>رقم الجوال:</strong>
                <a dir="ltr">   {{ $client->phone_number }}  </a>
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>رصيد الكاش باك:</strong>
                {{ $client->cash_back }} ر.س
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>عدد الزيارات:</strong>
                {{ $client->getNumberOfInvoicesAttribute() }}
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>تاريخ إنشاء حساب العميل:</strong>
                {{ $client->created_at->format(' j/n/Y') }}
            </div>
        </div>
    </div>



        <!-- Invoices List -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="pull-left">
                    <h2>الفواتير المتعلقة بالعميل</h2>
                </div>
                <br>

                @if($client->invoices->isEmpty())
                    <div>لا توجد فواتير مرتبطة بهذا العميل.</div>
                @else
                    <table class="table table-bordered">
                        <tr>
                            <th>رقم الفاتورة</th>
                            <th>مبلغ الفاتورة</th>
                            <th>الخصم</th>
                            <th>الفرع</th>
                            <th>تاريخ الفاتورة</th>
                        </tr>
                        @foreach ($client->invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->invoice_amount }}</td>
                                <td>{{ $invoice->discount }}</td>
                                <td>{{ $invoice->branch->branch_name ?? 'N/A' }}</td>
                                <td>{{ $invoice->created_at->format('j/n/Y') }}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
@endsection
