@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row ">
        <h2>مرحبا {{ Auth::user()->name }}</h2>

    </div>

</div>
<br>

<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-dark panel-colorful">
                <div class="panel-body text-center">
                	<p class="text-uppercase mar-btm text-sm">المستخدمين</p>
                    <i class="fa-solid fa-user-gear fa-5x"></i>
                    <hr>
                	<p class="h2 text-thin">{{ $data['users_count'] }}</p>
                	{{-- <small><span class="text-semibold">7%</span> Higher than yesterday</small> --}}
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-danger panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">الفروع</p>
                    <i class="fa-solid fa-building fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin">{{ $data['branches_count'] }}</p>
        			{{-- <small><span class="text-semibold"><i class="fa fa-unlock-alt fa-fw"></i> 154</span> Unapproved comments</small> --}}
        		</div>
        	</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-primary panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">العملاء</p>
                	<i class="fa fa-users fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin">{{ $data['clients_count'] }}</p>
        			{{-- <small><span class="text-semibold"><i class="fa fa-shopping-cart fa-fw"></i> 954</span> Sales in this month</small> --}}
        		</div>
        	</div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
        	<div class="panel panel-info panel-colorful">
        		<div class="panel-body text-center">
        			<p class="text-uppercase mar-btm text-sm">الفواتير</p>
        			<i class="fa fa-dollar fa-5x"></i>
        			<hr>
        			<p class="h2 text-thin">{{ $data['invoices_count'] }}</p>
        			{{-- <small><span class="text-semibold"><i class="fa fa-dollar fa-fw"></i> 22,675</span> Total Earning</small> --}}
        		</div>
        	</div>
        </div>
	</div>
</div>

<br>
<br>
<br>
<div class="container">
    <div class="row ">
        <h3>العملاء</h3>
    </div>
</div>

<div class="container">
    <div class="row">
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>الإسم </th>
              <th>رقم الجوال	 </th>
              <th>	رصيد الكاش باك </th>
              <th>عدد زيارات العميل	 </th>
              <th>تاريخ </th>
            </tr>
          </thead>
          <tbody id="myTable">
            @php $i = 0; @endphp

            @foreach ($clients as $client)
            @php $i++; @endphp

            <tr>
              <td>{{ $i }}</td>
              <td>{{ $client->f_name . ' ' . $client->m_name . ' ' . $client->l_name }}</td>
              <td class="text-end" dir="ltr"> {{ $client->phone_number }}</td>
              <td>{{ $client->cash_back }} ر.س</td>
              <td>{{ $client->getNumberOfInvoicesAttribute() }}</td>
              <td>{{ $client->created_at->format(' j/n/Y') }}</td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
      </div>
	</div>
</div>





@endsection
