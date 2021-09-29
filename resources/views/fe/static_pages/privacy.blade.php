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
    <h1 class="text-center">Privacy Policy</h1>
    <div class="col-md-10 col-md-offset-1">
        <h2>VoucherToPay UK, Privacy Policy</h2>
        <p class="text-justify">At VoucherToPay, we value all partnerships with our merchants and customers across United Kingdom.</p>
        <p class="text-justify">VoucherToPay is committed towards protecting your privacy. For transparency purposes, we explain our online information handling practices on our home page or at any checkpoint where personally identifiable information is requested. It is intended to inform our customers about the way we collect and use personal information, and usage of cookies. </p>
        <p class="text-justify">We are committed to serving you and treating your personal information with care, respect and dignity. This policy is effective since July 2013 and is modified periodically in accordance with government regulations and best practices. Any changes will be communicated to all our clients and customers.</p>
        <h2>By using our website you accept the terms of this Privacy Policy:</h2>
        <h3 class="text-dark-variant-3">a. The personal information we collect about you</h3>
        <p class="text-justify">We collect information from your registration on our site, blog, forum, social media channels and through your subscription to our newsletter. When registering to our site, you may be asked to enter your name, telephone number, e-mail address, or zip code. </p>
        <p class="text-justify">We do not sell, disseminate, disclose, transmit, transfer, share, lease, or rent any personally identifiable information to any third party not specifically authorized by you to receive your information except as we have disclosed to you in this Privacy Policy.</p>
        <h3 class="text-dark-variant-3">b. What do we do with the information we collect?</h3>
        <p class="text-justify">The information collected is intended to give you the best of deals available with us. </p>
        <p class="text-justify">Your submission of personal information is used to present you with the best deals from all top brands available with us in the online marketplace. We maintain a record of all such information required for the purposes of sending deals, promo codes, voucher codes, and newsletters. VoucherToPay uses your information to customize deals based on your search history and send personalized deals to your inbox. We may also use your information to reach you for our market research purposes. Our site will not provide your personal details to other companies for marketing purposes.</p>
        <p class="text-justify">When a user requests a page from VoucherToPay, our servers log the user's current IP address (an Internet Protocol (IP) address is a number that is automatically assigned to your computer every time you browse the Internet) tracking dates and times of access. This information is purely used to help diagnose problems with our servers, administer the site, analyze trends, track user movements and gather broad demographic information for company’s internal use. Any recorded IP addresses are not linked to personally identifiable information.</p>
        <h2>Electronic Newsletters and Site Notification</h2>
        <p class="text-justify">As a voucher site, we are constantly changing our website design, adding new features and offers. Therefore, we provide our registered members and email contacts with electronic newsletters and latest site notifications to keep them updated. Newsletters and website notifications can be subscribed to at any time by accessing our Signup Section, located on the VoucherToPay homepage.</p>
        <p class="text-justify">Consumers may unsubscribe from any mailing list by following the instructions contained at the end of every newsletter or website notification emailed.</p>
        <h2>How we use cookies?</h2>
        <p class="text-justify">Cookies are small amount of information stored on computer memory widely used to make your login simpler and browsing faster. </p>
        <p class="text-justify">Our system copies cookies when you log on to our site. When our website is accessed, a secured encrypted session cookie is sent by us for validating your access. This temporary cookie allows for tracking, thereby helping us understand the pages you find useful and those you do not. The traffic log cookies that are provided by Google help us identify and analyze which web pages are accessed more by our customers, thus helping us improve upon user interface and quality of services provided. On a subsequent visit to our website, we remember who you are and assist you with your browsing.</p>
        <h2>How do we protect your information?</h2>
        <h2>Security</h2>
        <p class="text-justify">We are committed to ensuring that your information is secure. We take utmost care to prevent unauthorized access or disclosure. We have in place suitable electronic, physical and other procedural restrictions which safeguard and secure all information we collect online. </p>
        <h2>Employee Access, Training and Expectations</h2>
        <p class="text-justify">Our ethical standards and employee policies and practices are committed towards protection of customer information. Our business practices limit employee access to confidential information, and limit the use and disclosure of such information to authorized persons, processes and transactions.</p>
        <h2>Children's Privacy</h2>
        <p class="text-justify">This site is totally intended to promote online shopping through deals, promo and voucher codes. A few of our merchants may promote the sale of adult related products. Therefore, parental control is advised to restrict children usage of our sites. VoucherToPay is not responsible for any Risks Associated with such usage.</p>
        <h2>Links to other websites</h2>
        <p class="text-justify">We provide links to other websites while promoting deals, voucher code or promo code information. These sites operate independent of www.vouchertopay.co.uk, and are not under our control. Such sites have their own privacy Notices/Policies in place. We strongly recommend that you review such information when you visit any linked website. </p>
        <p class="text-justify">We are not responsible for the content of these sites, any products or services that may be offered through these sites, or the privacy practices of these sites. We are also not responsible for any data collection practices of such linked sites, nor does our linking to third party websites or services constitute a sponsorship or endorsement of the content or business practices on these sites. By using vouchertopay.co.uk, you have agreed that you will use the hyperlinks to third party sites at your own risk.</p>
        <h2>Social Media Platforms</h2>
        <p class="text-justify">Social Media Platforms are our vehicles used for communication, engagement and for actions taken externally between our website and our site users. All users are under the terms and conditions as well as the privacy policies held with each social media platform, respectively.</p>
        <p class="text-justify">VoucherToPay.co.uk may use social sharing buttons which help share web content directly from web pages to the social media platform in question. Users are advised before using such social sharing button to do so at their own discretion and note that the social media platforms may track and save your request to share a web page respectively through your social media platform account.</p>
        <h2>Postings</h2>
        <p class="text-justify">We have no control over who reads your postings, or what other users may do with the information you voluntarily post, so please use caution when posting any personal information or comments on VoucherToPay social media pages, blog and forum sites.</p>
        <h2>Information to the Residents of Countries outside USA</h2>
        <p class="text-justify">VoucherToPay has its roots in Atlanta, Georgia, USA. Your personal information may be accessed by us or transferred to us within the United States, or to our affiliates, business partners, merchants, or service providers elsewhere in the world. By providing us with personal information, you consent to such access and transfers; you also acknowledge and agree that personal information may be subject to access requests from governments, courts, law enforcement officials, and national security authorities in the United States in accordance with United States laws. We will protect the privacy and security of Personal Information according to our Privacy Statement, regardless of where it is processed or stored.</p>
        <h2>Our Contact Information</h2>
        <p class="text-justify">You may wish to contact us from time to time through emails, social media pages or by filling in contact forms on our website. We will only utilize this information to respond to your query or suggestion. For customer service or technical questions, please complete the 'Contact Us' form. For questions regarding this Privacy Policy please write to us at support@vouchertopay.co.uk</p>
    </div>
</div>
@endsection
