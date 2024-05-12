@extends('layouts.master')

@section('content')



 <div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>إنشاء فاتورة جديد</h2>
            <hr>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('invoices.index') }}"> رجوع</a>
            </div>
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

<form action="{{ route('invoices.store') }}" method="POST">
    @csrf

    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>ادخل رقم الجوال:</strong>
            <input type="search" name="phone_number" class="form-control" placeholder="ابحث عن رقم الجوال"  autocomplete="off">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>بيانات العميل:</strong>
                <div id="client_result"></div>
                <div id="client_full_name"></div>
                <div id="client_cash_back"></div>
                <div id="client_phone_number"></div>
                <input type="hidden" name="client_id" id="client_id">
                <input type="hidden" name="client_full_name" id="client_full_name">
                <input type="hidden" name="client_cash_back" id="client_cash_back">
                <input type="hidden" name="client_phone_number" id="client_phone_number">
            </div>
        </div>
    </div>

    <div id="error_message" class="alert alert-danger" style="display:none;"></div>
<br>
<hr>

    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>رقم الفاتورة:</strong>
                <input type="number" name="invoice_number" class="form-control" placeholder="رقم الفاتورة">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group text-end">
                <strong>قيمه الفاتورة:</strong>
                <input type="number" name="invoice_amount" class="form-control" placeholder="قيمه الفاتورة">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group text-end">
                <strong>الفرع:</strong>
                <br>
                <select class="form-select" name="branch_id" aria-label="Default select example" >
                    <option selected>الفروع</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->town . ' - ' . ' فرع ' . $branch->branch_name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
        </div>

        <div class="col-xs-12 mb-3 text-start">
            <br>
            <button type="submit" class="btn btn-primary">إنشاء</button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $('input[name="phone_number"]').on('change', function() {
            var phoneNumber = $(this).val().trim();

            if (phoneNumber) {
                $.ajax({
                    url: '{{ url("dashboard/ajax/get-client-by-phone") }}/' + phoneNumber,
                    type: 'GET',
                    success: function(data) {
                        if (data) {
                            // Update client information on the same page
                            $('#client_full_name').text('الاسم كامل: ' + data.f_name + ' ' + data.m_name + ' ' + data.l_name);
                            $('#client_cash_back').text('رصيد الكاش بك: ' + data.cash_back);
                            // $('#client_phone_number').text('رقم الجوال: ' + data.phone_number);
                            $('#client_phone_number').html('رقم الجوال: ' + '<span dir="ltr">' + data.phone_number + '</span>');

                            $('#client_id').val(data.id); // Set client_id in the hidden input
                            $('#client_result').text(''); // Clear the error message
                            $('#error_message').hide(); // Hide error message if it was previously displayed
                        } else {
                            // Display error message and hide client information
                            $('#client_result').text('');
                            $('#client_full_name').text('');
                            $('#client_cash_back').text('');
                            $('#client_phone_number').text('');
                            $('#client_id').val(''); // Clear client_id in case of error
                            $('#error_message').text('رقم العميل غير متاح، الرجاء إنشاء عميل جديد.').show();
                        }
                    },
                    error: function() {
                        $('#client_result').text('');
                        $('#client_full_name').text('');
                        $('#client_cash_back').text('');
                        $('#client_phone_number').text('');
                        $('#client_id').val(''); // Clear client_id in case of error
                        $('#error_message').text('رقم العميل غير متاح، الرجاء إنشاء عميل جديد.').show();
                    }
                });
            } else {
                alert('Please enter a phone number.');
            }
        });
    });
</script>










@endsection
