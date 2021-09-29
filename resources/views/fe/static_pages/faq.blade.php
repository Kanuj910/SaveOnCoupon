@extends('layouts.master') 

@section('meta_title') {{ $data['meta']->meta_title }} @endsection
@section('meta_description') {{ $data['meta']->meta_description }} @endsection
@section('meta_keywords') {{ $data['meta']->meta_keywords }} @endsection
@section("robots")
	@if($data['meta']->robots==1)
		<meta name="robots" content="index, follow">
	@else
		<meta name="robots" content="noindex, nofollow">
	@endif
@endsection


@section('content')
<div class="container-fluid">
    <h1 class="text-center">FAQ</h1>
    <div class="col-md-10 col-md-offset-1">
        <h2>1. What are Voucher Codes?</h2>
        <p class="text-justify">Voucher codes and promo codes are designed to provide an avenue for shoppers to save a significant amount of money on a spectrum of top brands while shopping online. These codes usually consist of a combination of numbers and letters that vendors apply to your purchases during checkout!</p>
        <h2>2. How to utilize these codes on VoucherToPay.co.uk?</h2>
        <ul>
            <li>
                <p class="text-justify">Locate the product you would like to purchase</p>
            </li>
            <li>
                <p class="text-justify">Search VoucherToPay for discount codes or voucher codes</p>
            </li>
            <li>
                <p class="text-justify">Select the code for the product and store you are looking for</p>
            </li>
            <li>
                <p class="text-justify">Apply voucher code during checkout process to receive big savings!</p>
            </li>
        </ul>
        <h2>3. Why choose VoucherToPay?</h2>
        <p class="text-justify">VoucherToPay provides a wide selection of discounts from stores such Amazon, Tesco, Argos, John Lewis, Next, Asda, Sainbury's, Shop Direct, Ocado, Dixons, Carphone to name a few. Our creative teams and innovative leaders are constantly improving ways to provide you with great discount deals. With all of these discounts at VoucherToPay, you are guaranteed to have the best online shopping experience.</p>
        <h2>4. How to locate the best vouchers on VoucherToPay.co.uk?</h2>
        <p class="text-justify">By utilizing menu key at the top of our page, you will have access to browse a vast array of discounts and savings such as free shipping vouchers, clearance vouchers, discount deals, and seasonal discounts.</p>
        <p class="text-justify">Ps: keep following our social media pages, blog posts and forum discussions to request, get and discuss about special deals. Get tips on fashion trends, best vouchers, and great gift ideas for special occasions, including travel discounts.</p>
        <h2>5. What if the selected voucher code isn't working?</h2>
        <p class="text-justify">Please make sure you check the expiration date on voucher before usage. If a code is invalid, then it means that the particular merchant may have cancelled the code. It is advisable to check voucher before any purchase as we and our merchants are not responsible for any change.</p>
        <h2>6. What else can I find at VoucherToPay.co.uk ?</h2>
        <p class="text-justify">Our team members are constantly broadening our services and social sites to provide you with the best deals online. Please like us and subscribe to us on Facebook, Pinterest, Google plus, Twitter and YouTube to receive promotional codes.</p>
        <h2>7. Looking for something specific?</h2>
        <p class="text-justify">If you are on the lookout for something specific related to a store or a product, you can write to us directly on our social media pages. We promise to get back to you with something exciting.</p>
        <h2>8. How can I contact VoucherToPay?</h2>
        <p class="text-justify">You can contact VoucherToPay by visiting us on our contact page and leaving us an email in the message box. You can also reach us through our social media pages. Our support team is always available to assist you with your shopping needs.</p>
    </div>
</div>
@endsection
