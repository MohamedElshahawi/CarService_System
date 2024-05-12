
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>إدارة الفواتير <i class="fa-solid fa-file-invoice-dollar"></i>

         <hr>           <div class="float-end">
              @can('invoice-create')
              <a class="btn btn-success" href="{{ route('invoices.create') }}">إنشاء فاتورة جديد </a>
              @endcan
          </div>
        <br>
        </h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route('invoices.index') }}" method="GET" class="row g-3 align-items-center mb-3">
        <div class="col-auto">
            <label for="search" class="visually-hidden">بحث برقم الفاتورة</label>
            <input type="text" name="search" class="form-control" placeholder="ابحث عن الفواتير" value="{{ request()->input('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">بحث</button>
        </div>
    </form>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>#</th>
            <th>رقم الفاتورة</th>
            <th>قيمه الفاتورة</th>
            <th> العميل</th>

            <th width="280px">Actions</th>
        </tr>
        @php $i = 0; @endphp

     @foreach ($data as $invoice)
     @php $i++; @endphp

     <tr>
        <td>{{ $i }}</td>
         <td>{{ $invoice->invoice_number}}</td>
         <td> {{ $invoice->invoice_amount }} ر.س</td>
         <td>{{ $invoice->getClientFullName() }}</td>
         {{-- <td>{{ $client->town }}</td> --}}

         <td>
                <form action="{{ route('invoices.destroy',$invoice->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('invoices.show',$invoice->id) }}"><i class="fa-solid fa-eye"></i></a>
                    @can('client-edit')
                    <a class="btn btn-primary" href="{{ route('invoices.edit',$invoice->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('invoice-delete')
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    @endcan
                </form>
         </td>
     </tr>
     @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>

@endsection
