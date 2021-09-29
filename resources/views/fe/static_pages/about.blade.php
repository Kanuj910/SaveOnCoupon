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
    <h1 class="text-center">About Us</h1>
<div class="col-md-10 col-md-offset-1">
<h2>About Us VoucherToPay UK</h2>
<p class="text-justify">VoucherToPay.co.uk is the subsidiary of CouponToPay.com based in the U.S. With its headquarters in Georgia, USA, VoucherToPay extends eCommerce services to shopaholics helping them enjoy the many benefits of shopping with awesome vouchers, discount codes, and deals.</p>
<h2>Mission &amp; Leadership</h2>
<p class="text-justify">Our mission statement is pretty straight forward – “bring smiles to hundreds of thousands of satisfied customers every day by augmenting their overall savings.” </p>
<p class="text-justify">Our creative teams and innovative leaders are constantly improving ways to optimize each user experience on our site. We work relentlessly with our merchants to provide them with the best of selling space and extend to our online shopping customers the best of discounts available.</p>
<p class="text-justify">Reaching out to thousands of new customers and merchants on a daily basis, VoucherToPay aims to constantly seek better ways to meet increasing expectations of the savvy shopper.</p>
<p class="text-justify">One of the values of VoucherToPay is to promote living standards. This is possible with the discounts you earned from promo codes which can be used to spend and enhance your happiness quotient among your social circles. At VoucherToPay, our thought leaders feel discounts and vouchers can significantly contribute to the overall saving of denizens and the resultant purchasing power of citizens, a win-win scenario.</p>
<h2>Derive Value through Vouchers &amp; Discount Codes</h2>
<p class="text-justify">VoucherToPay has been covering almost every product category with all top brands in the US and Canada. Our reputation of delivering great voucher codes and deals on a spectrum of products in the Americas prompted us to extend our services to the people of U.K.</p>
<p class="text-justify">Did you know that credit cards, debit cards and PayPal together constitute nearly 96% online payments in the U.K.? With all these online payment methods, we tend to lose out with the tax and service charges. But hey, with our promotional offers and codes you can not only offset the extra charges but also save big. </p>
<p class="text-justify">PS: be on the lookout for special deals, you never know when fortune knocks. </p>
<h2>Easy as 1, 2, 3</h2>
<p class="text-justify">All our vouchers are easily accessible and are grouped into search friendly categories, so you can effortlessly find your favorite products. Whether it is home and garden, health and beauty, or electronics, we are constantly adding new products with great vouchers and deals for all your shopping needs.</p>
<h2>Write to us to get more</h2>
<p class="text-justify">VoucherToPay provides a wide selection of discounts from retailers such as Amazon, Argos, Boots, House of Fraser, John Lewis, Mother care, Screw fix, ASOS, Matalan, B&amp;Q, Next, Clarks to name a few. We take a lot of care to provide you with the best deals out there on the web. However, if you are on the lookout for a voucher that is not in our system, then feel free to contact us through our social media channels and we promise to get back to you with something fulfilling.</p>
<h2>Blog</h2>
<p class="text-justify">If you enjoy shopping and love to read about shopping trends and others’ shopping experience, then our blog is the right medium for your product research. Our blog is updated frequently with great tips on a number of ways to save and enjoy life on a budget. Our expert writers are well versed with online shopping and will bring value to your online shopping experience.</p>
<h2>Shopping at VoucherToPay</h2>
<p class="text-justify">The entrenched online purchasing community has much to do with VoucherToPay. Shop and possess your favorite brands from online retail majors in the U.K. like Amazon, Tesco, Argos, John Lewis, Next, Asda, Sainbury's, Shop Direct, Ocado, Dixons, Carphone to name a few. Great savings await you at VoucherToPay. It is all about a shopping feast with surprises on the menu where you can literally save buckets and buckets of money.</p>
</div>

<style type="text/css">
    h1{
        font-weight: 700;
        font-size: 3em;
    }
    h2{
        line-height: 1.09091;
        font-size: 22px;
        font-weight: 700;
        margin-top: 65px;
    }
    p{
        font-family: "PT Sans",Helvetica,Arial,sans-serif;
        font-size: 16px;
        line-height: 1.5;
        margin-top: 25px;
    }
</style>
</div>
@endsection