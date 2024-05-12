
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>إدارة العملاء<i class="fa-solid fa-users"></i>

         <hr>           <div class="float-end">
              @can('client-create')
              <a class="btn btn-success" href="{{ route('clients.create') }}">إنشاء عميل جديد </a>
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
    <form action="{{ route('clients.index') }}" method="GET" class="row g-3 align-items-center mb-3">
        <div class="col-auto">
            <label for="search" class="visually-hidden">بحث بالاسم او الجوال</label>
            <input type="text" id="search" name="search" class="form-control" placeholder="أسم العميل او الجوال" value="{{ request()->input('search') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">بحث</button>
        </div>
    </form>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>#</th>
            <th>الإسم</th>
            <th>رقم الجوال</th>
            <th>رصيد الكاش باك</th>
            <th>عدد  زيارات العميل</th>
            <th width="280px">Actions</th>
        </tr>
        @php $i = 0; @endphp


     @foreach ($data as $client)
     @php $i++; @endphp

     <tr>
        <td>{{ $i }}</td>
         <td>{{ $client->f_name . ' ' . $client->m_name . ' ' . $client->l_name }}</td>
         <td class="text-end" dir="ltr"> {{ $client->phone_number }}</td>
         <td>{{ $client->cash_back }} ر.س</td>
         <td>{{ $client->getNumberOfInvoicesAttribute() }}</td>
         <td>
                <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}"><i class="fa-solid fa-eye"></i></a>
                    @can('client-edit')
                    <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('client-delete')
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










