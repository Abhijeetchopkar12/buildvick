@extends('frontend.layouts.app')

@section('content')
<div class="bg-page">
    <!-- Page Header Start -->
    <header class="page-banner-header blank-page-banner-header gradient-bg position-relative">
        <div class="section-overlay">
            <div class="blank-page-banner-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="page-banner-content text-center">
                                <h3 class="page-banner-heading color-heading pb-15">{{ __('Checkout') }}</h3>

                                <!-- Breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item font-14"><a href="{{ url('/') }}">{{ __('Home')
                                                }}</a></li>
                                        <li class="breadcrumb-item font-14 active" aria-current="page">
                                            {{ __('Checkout') }}</li>
                                    </ol>
                                </nav>
                                <!-- Breadcrumb End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Page Header End -->

    <!-- Cart Page Area Start -->

    <section class="checkout-page">
        <div class="container">
            <form action="{{ route('store') }}" method="POST" name="laravel9-cashfree-integration">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-page-left-part">
                            <div class="billing-address-box bg-white">

                                <h6 class="font-16 font-medium color-heading mb-30">{{ __('Billing Address') }}
                                </h6>
                                <div class="row">
                                    <div class="col-md-6 mb-30">
                                        <label class="label-text-title color-heading font-medium font-16 mb-3">{{
                                            __('First Name') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" id="first_name"
                                            value="{{ $student->first_name }}" required class="form-control"
                                            placeholder="{{ __('First Name') }}">
                                        @if ($errors->has('first_name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-30">
                                        <label class="label-text-title color-heading font-medium font-16 mb-3">{{
                                            __('Last Name') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" id="last_name"
                                            value="{{ $student->last_name }}" required class="form-control"
                                            placeholder="{{ __('Last Name') }}">
                                        @if ($errors->has('last_name'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-30">
                                        <label class="label-text-title color-heading font-medium font-16 mb-3">{{
                                            __('Email Address') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ $student->user->email }}" id="email"
                                            required class="form-control" placeholder="{{ __('Email Address') }}">
                                        @if ($errors->has('email'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 mb-30">
                                        <label class="label-text-title color-heading font-medium font-16 mb-3">{{
                                            __('Mobile Number') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="tel" name="mobile" value="{{ $student->user->mobile_number  }}" id="mobile"
                                            required class="form-control" placeholder="{{ __('Email Address') }}">
                                        @if ($errors->has('mobile'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-30">
                                        <label class="label-text-title color-heading font-medium font-16 mb-3">{{
                                            __('Address') }}
                                            <span class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" value="{{ $student->address }}"
                                            class="form-control" required placeholder="{{ __('Address') }}">
                                        @if ($errors->has('street_address'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                            {{ $errors->first('street_address') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="price" id="address" value="{{ $student->address }}"
                                            class="form-control" required placeholder="{{ __('Address') }}">



                            </div>
                            <div class="payment-method-box bg-white">
                                <h6 class="font-16 font-medium color-heading mb-30">{{ __('Payment Method') }}
                                </h6>
                                @if (get_option('cashfree_status') == 1)
                                <div class="form-check payment-method-card-box other-payment-box pb-0 mt-30">
                                    <input class="form-check-input" type="radio" name="payment_method" value="cashfree"
                                        {{ old('payment_method')=='cashfree' ? 'checked' : '' }} id="cashfreePayment"
                                        checked>
                                    <label class="form-check-label mb-0" for="cashfreePayment">
                                        <span class="font-16 color-heading font-medium">CashFree</span>
                                    </label>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-page-right-part sticky-top">
                            <div class="checkout-right-side-box checkout-order-review-box">
                                <div class="accordion" id="accordionExample1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                {{ __('Order Review') }}
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
                                            <div class="accordion-body">
                                                <div class="checkout-items-count font-13 color-heading mb-2">
                                                    {{ $carts->count() }} {{ __('Items In Card') }}</div>
                                                <div class="table-responsive mb-20">
                                                    <table class="table bg-white checkout-table mb-0">
                                                        <tbody>
                                                            @foreach ($carts as $cart)
                                                            <tr>
                                                                <td class="checkout-course-item">
                                                                    <div
                                                                        class="card course-item wishlist-item border-0 d-flex align-items-center">
                                                                        <div
                                                                            class="course-img-wrap overflow-hidden flex-shrink-0">
                                                                            @if($cart->course_id)
                                                                            @if(@$cart->course)
                                                                            <a href="{{ route('course-details', @$cart->course->slug) }}"
                                                                                target="_blank"><img
                                                                                    src="{{ getImageFile(@$cart->course->image_path) }}"
                                                                                    alt="course" class="img-fluid"></a>
                                                                            @endif
                                                                            @elseif($cart->bundle_id)
                                                                            @if(@$cart->bundle)
                                                                            <a href="{{ route('bundle-details', [@$cart->bundle->slug]) }}"
                                                                                target="_blank"><img
                                                                                    src="{{ getImageFile(@$cart->bundle->image) }}"
                                                                                    alt="bundle course"
                                                                                    class="img-fluid"></a>
                                                                            @endif
                                                                            @elseif($cart->consultation_slot_id)
                                                                            @if(@$cart->consultationSlot)
                                                                            <a href="{{ route('userProfile', [@$cart->consultationSlot->user->id]) }}"
                                                                                target="_blank"><img
                                                                                    src="{{ getImageFile(@$cart->consultationSlot->user->image) }}"
                                                                                    alt="bundle course"
                                                                                    class="img-fluid"></a>
                                                                            @endif
                                                                            @endif
                                                                        </div>
                                                                        <div class="card-body flex-grow-1">
                                                                            <h5 class="card-title course-title">
                                                                                @if($cart->course_id)
                                                                                @if(@$cart->course)
                                                                                <a href="{{ route('course-details', @$cart->course->slug) }}"
                                                                                    target="_blank">
                                                                                    {{ @$cart->course->title }}</a>
                                                                                @endif
                                                                                @elseif($cart->bundle_id)
                                                                                @if(@$cart->bundle)
                                                                                <a href="{{ route('bundle-details', [@$cart->bundle->slug]) }}"
                                                                                    target="_blank">{{
                                                                                    @$cart->bundle->name }}</a>
                                                                                @endif
                                                                                @elseif($cart->consultation_slot_id)
                                                                                @if(@$cart->consultationSlot)
                                                                                <a href="{{ route('userProfile', [@$cart->consultationSlot->user->id]) }}"
                                                                                    target="_blank">{{
                                                                                    $cart->consultationSlot->user->name
                                                                                    }}</a>
                                                                                @endif
                                                                                @endif
                                                                            </h5>

                                                                            @if ($cart->course &&
                                                                            $cart->course->instructor)
                                                                            <p
                                                                                class="card-text instructor-name-certificate font-medium">
                                                                                {{ $cart->course->instructor->name }}
                                                                            </p>
                                                                            @elseif($cart->bundle &&
                                                                            $cart->bundle->user->instructor)
                                                                            <p
                                                                                class="card-text instructor-name-certificate font-medium">
                                                                                {{ $cart->bundle->user->instructor->name
                                                                                }}
                                                                            </p>
                                                                            @elseif($cart->consultation_slot_id)
                                                                            <p
                                                                                class="card-text instructor-name-certificate font-medium">
                                                                                (Consultation)
                                                                            </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td
                                                                    class="wishlist-price font-13 color-heading text-end">
                                                                    <div class="wishlist-remove font-13">
                                                                        @if (get_currency_placement() == 'after')
                                                                        {{ get_number_format(@$cart->price, 2) }}
                                                                        {{ get_currency_symbol() }}
                                                                        @else
                                                                        {{ get_currency_symbol() }}
                                                                        {{ get_number_format(@$cart->price, 2) }}
                                                                        @endif
                                                                    </div>
                                                                    <div>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="checkout-right-side-box checkout-billing-summary-box">
                                <div class="accordion" id="accordionExample3">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-expanded="true"
                                                aria-controls="collapseThree">
                                                {{ __('Billing Summary') }}
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse show"
                                            aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
                                            <div class="accordion-body">
                                                <!-- <table class="table billing-summary-table">
                                                    
                                                </table> -->
                                                <div class="row mb-30">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="flexCheckChecked" checked>
                                                                <label class="form-check-label mb-0"
                                                                    for="flexCheckChecked">
                                                                    Please check to acknowledge our <a
                                                                        href="{{ route('privacy-policy') }}"
                                                                        class="color-hover text-decoration-underline">Privacy
                                                                        & Terms Policy</a>
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="regular-btn">
                                                    <button class="w-100 btn btn-lg btn-success" type="submit">Place
                                                        Order
                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

            </form>


        </div>
    </section>

    <form action="{{ route('store') }}" method="POST" name="laravel9-cashfree-integration">
        @csrf
        <div class="form-floating py-2">
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="name">
            <label for="name">Full Name</label>
        </div>
        <div class="form-floating py-2">
            <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}"
                placeholder="email">
            <label for="email">Email Address</label>
        </div>
        <div class="form-floating py-2">
            <input type="text" class="form-control" name="mobile" id="mobile" value="{{ old('mobile') }}"
                placeholder="mobile">
            <label for="mobile">Mobile Number</label>
        </div>
        <div class="form-floating py-2">
            <input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount') }}"
                placeholder="amount">
            <label for="amount">Amount</label>
        </div>
        <button class="w-100 btn btn-lg btn-success" type="submit">Place Order</button>
    </form>



    <!-- Cart Page Area End -->
</div>



<!-- <input type="hidden" class="paypal_currency" value="{{ get_option('paypal_currency') }}">
<input type="hidden" class="paypal_conversion_rate" value="{{ get_option('paypal_conversion_rate') }}">

<input type="hidden" class="bank_currency" value="{{ get_option('bank_currency') }}">
<input type="hidden" class="bank_conversion_rate" value="{{ get_option('bank_conversion_rate') }}">

<input type="hidden" class="stripe_currency" value="{{ get_option('stripe_currency') }}">
<input type="hidden" class="stripe_conversion_rate" value="{{ get_option('stripe_conversion_rate') }}">

<input type="hidden" class="razorpay_currency" value="{{ get_option('razorpay_currency') }}">
<input type="hidden" class="razorpay_conversion_rate" value="{{ get_option('razorpay_conversion_rate') }}">

<input type="hidden" class="instamojo_currency" value="{{ get_option('im_currency') }}">
<input type="hidden" class="instamojo_conversion_rate" value="{{ get_option('im_conversion_rate') }}">

<input type="hidden" class="mollie_currency" value="{{ get_option('mollie_currency') }}">
<input type="hidden" class="mollie_conversion_rate" value="{{ get_option('mollie_conversion_rate') }}">

<input type="hidden" class="sslcommerz_currency" value="{{ get_option('sslcommerz_currency') }}">
<input type="hidden" class="sslcommerz_conversion_rate" value="{{ get_option('sslcommerz_conversion_rate') }}">

<input type="hidden" class="mercado_currency" value="{{ get_option('mercado_currency') }}">
<input type="hidden" class="mercado_conversion_rate" value="{{ get_option('mercado_conversion_rate') }}">

<input type="hidden" class="flutterwave_currency" value="{{ get_option('flutterwave_currency') }}">
<input type="hidden" class="flutterwave_conversion_rate" value="{{ get_option('flutterwave_conversion_rate') }}">

<input type="hidden" class="paystack_currency" value="{{ get_option('paystack_currency') }}">
<input type="hidden" class="paystack_conversion_rate" value="{{ get_option('paystack_conversion_rate') }}">

<input type="hidden" class="coinbase_currency" value="{{ get_option('coinbase_currency') }}">
<input type="hidden" class="coinbase_conversion_rate" value="{{ get_option('coinbase_conversion_rate') }}">

<input type="hidden" class="zitopay_currency" value="{{ get_option('zitopay_currency') }}">
<input type="hidden" class="zitopay_conversion_rate" value="{{ get_option('zitopay_conversion_rate') }}">

<input type="hidden" class="iyzipay_currency" value="{{ get_option('iyzipay_currency') }}">
<input type="hidden" class="iyzipay_conversion_rate" value="{{ get_option('iyzipay_conversion_rate') }}">

<input type="hidden" class="bitpay_currency" value="{{ get_option('bitpay_currency') }}">
<input type="hidden" class="bitpay_conversion_rate" value="{{ get_option('bitpay_conversion_rate') }}">

<input type="hidden" class="braintree_currency" value="{{ get_option('braintree_currency') }}">
<input type="hidden" class="braintree_conversion_rate" value="{{ get_option('braintree_conversion_rate') }}">

<input type="hidden" class="fetchBankRoute" value="{{ route('student.fetchBank') }}"> -->
@endsection

@push('script')

<!-- @if (get_option('sslcommerz_mode') == 'live')
<script>
var obj = {};
obj.cus_name = $('#first_name').val() + $('#last_name').val();
obj.cus_phone = $('#phone_number').val();
obj.cus_email = $('#email').val();
obj.cus_addr1 = $('#address').val();
obj.postal_code = $('#postal_code').val();

$('#sslczPayBtn').prop('postdata', obj);
(function(window, document) {
    var loader = function() {
        var script = document.createElement("script"),
            tag = document.getElementsByTagName("script")[0];
        script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36)
            .substring(7); // USE THIS FOR LIVE
        tag.parentNode.insertBefore(script, tag);
    };
    window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
        loader);
})(window, document);
</script>
@else
<script>
var obj = {};
obj.cus_name = $('#first_name').val() + $('#last_name').val();
obj.cus_phone = $('#phone_number').val();
obj.cus_email = $('#email').val();
obj.cus_addr1 = $('#address').val();
obj.postal_code = $('#postal_code').val();
obj.country_name = $('#country_name').val();

// $('#sslczPayBtn').prop('postdata', obj);
// (function(window, document) {
//     var loader = function() {
//         var script = document.createElement("script"),
//             tag = document.getElementsByTagName("script")[0];
//         script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
//             7); // USE THIS FOR SANDBOX
//         tag.parentNode.insertBefore(script, tag);
//     };
//     console.log(loader);
//     window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
//         loader);
// })(window, document);
</script>
@endif -->

<script src="{{ asset('frontend/assets/js/custom/student-profile.js') }}"></script>
<script src="https://js.stripe.com/v2/"></script>
<script src="{{ asset('frontend/assets/js/custom/checkout.js') }}"></script>
@endpush