@extends('website.master')

@section('content')




{{-- <!-- content-->
<section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <i class="far fa-eye fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-5">اطلاع علي رصيد الكاش باك</h2>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <form class="form-signup" id="contactForm" action="/search" method="post">
                    @csrf <!-- Ensure CSRF token is included for Laravel to handle POST requests -->
                    <!-- Phone number input-->
                    <div class="row input-group-newsletter">
                        <div class="col">
                            <input type="search" name="phone_number" class="form-control" placeholder="ابحث ب رقم الجوال"  autocomplete="off" style="letter-spacing: -1px; font-size: 16px;">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" id="submitButton" type="submit" style="background-color: OrangeRed; letter-spacing: -1px; font-size: 16px;">بحث</button>
                        </div>
                    </div>
                    <div class="invalid-feedback mt-2" data-sb-feedback="phoneNumber:required">A phone number is required.</div>
                    <div class="invalid-feedback mt-2" data-sb-feedback="phoneNumber:pattern">Phone number is not valid.</div>
                </form>
                <!-- Result section -->
                <div id="searchResult" class="mt-3 text-black"></div> <!-- Placeholder for displaying the cash back or error message -->
            </div>
        </div>
    </div>
</section> --}}


<section class="signup-section" id="signup">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <i class="far fa-eye fa-2x mb-2 text-white"></i>
                <h2 class="text-white mb-5">اطلاع علي رصيد الكاش باك</h2>


                <!-- Result section -->
                <div id="searchResult" class="text-white mb-5" style="background: darkorange">
                    @if(!empty($cash_back))
                    <h2>رصيد الكاش باك: {{ $cash_back }} ر.س</h2>
                    @else
                    <h2 style="display: none;">رقم العميل غير متاح.</h2>
                    @endif
                </div>


                <!-- Form section -->
                <form class="form-signup" id="contactForm" action="{{ route('home') }}" method="post">
                    @csrf <!-- Ensure CSRF token is included for Laravel to handle POST requests -->
                    <!-- Phone number input-->
                    <div class="row input-group-newsletter">
                        <div class="col">
                            <input type="search" name="phone_number" id="phone_number" class="form-control" placeholder="ابحث ب رقم الجوال" autocomplete="off" style="letter-spacing: -1px; font-size: 16px;">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary" id="submitButton" type="submit" style="background-color: OrangeRed; letter-spacing: -1px; font-size: 16px;">بحث</button>
                        </div>
                    </div>
                    <div class="invalid-feedback mt-2" data-sb-feedback="phoneNumber:required">A phone number is required.</div>
                    <div class="invalid-feedback mt-2" data-sb-feedback="phoneNumber:pattern">Phone number is not valid.</div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
