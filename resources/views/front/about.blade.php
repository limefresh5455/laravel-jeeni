@extends('front.layouts.master')

@section('page_title') About - Jeeni @endsection

@section('content')
    <main>
    <!-- Body content -->
    <div class="container-xl py-5 body-content">

        @include('front.layouts.sub-header', [ 'page_heading' => 'About - <span class="fw-normal">Jeeni</span>'])

        <!-- Content after the title -->
        <div class="row pb-3 pb-md-5 mt-5">
            <!-- About Content Wrapper -->
            <div class="d-block">
                <!-- About Content -->
                <div class="mb-4">
                    <h6 class="fw-bolder mb-3"><span class="text-danger">JEENI</span> is a multi-channel platform for original entertainment on demand. We’re a direct service between creatives and the global audience.</h6>

                    <p class="mb-1"><i class="bi bi-check me-2"></i>We give creatives, independent artists and performers a showcase for their talent and services, and they keep 100% of everything they make.</p>
                    <p class="mb-1"><i class="bi bi-check me-2"></i>We empower our audience and reward them every step of the way.</p>
                    <p class="mb-1"><i class="bi bi-check me-2"></i>We promise to treat our members ethically, fairly, honestly and with respect.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">NO SCAMS</h6>
                    <p>Traditionally, the entertainment industry is full of rip-off merchants. Jeeni is completely different. Our promise is to treat our creat ive talent and our audiences ethically, fairly, honestly and with respect.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">NO ADVERTS</h6>
                    <p>Your listening pleasure isn’t ruined by jingles or adverts, you’re not force-fed anything you don’t want to hear, and your choices are never be manipulated by outside influences and unwanted pressures.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">NO FAKES</h6>
                    <p>Our charts can’t be faked, bought or influenced. They are completely genuine, they are based on individual positive votes, and they are truly democratic.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">NO RIP-OFFS</h6>
                    <p>We don’t insult our creatives with false promises or pitiful royalty payments that add up to next to nothing. 100% of Jeeni profits for creative talent, merchandising, goods and services go direct to our members.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">NO LOOKING AWAY</h6>
                    <p>Jeeni supports charitable projects, including Arms Around The Child, providing safe loving homes and support for orphaned children, vulnerable children and those at risk of exploitation.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">NO HYPOCRISY</h6>
                    <p>We will not accept partnerships or funding from any organisation or individual who we know to be involved with armaments, harming    the environment, political, religious or unethical organisations. We positively seek out corporate relationships with those who make a positive contribution to the wellbeing of people and the environment.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">NO EXPLOITATION</h6>
                    <p>We pledge to use our funds to create new jobs, new opportunities and genuine resources. We will not exploit students, interns or volunteers, but treat them as valued members of Team Jeeni and reward them to the best of our ability.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">NO TAX DODGING</h6>
                    <p>Unlike some entertainment platforms and content providers, we pledge to pay all our due taxes in full, because we choose to make a positive contribution to the health, welfare and education of the society in which we live.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger text-uppercase fw-bold">OUR BRAND</h6>
                    <p>The brand name Jeeni and all associated services, designs, logos, products, merchandise, and events are protected by national and international registered trademark and copyright, and all our top-level domain names are globally registered as company assets.</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-danger fw-normal text-uppercase fw-bold">OWNERSHIP AND MANAGEMENT</h6>
                    <p class="mb-2"><i class="bi bi-check me-2"></i>Jeeni is owned and managed by the founding directors Mel Croucher (Chairman, Jeeni) and Dr Shena Mitchell (CEO Jeeni).</p>
                    <p class="mb-2"><i class="bi bi-check me-2"></i>Jeeni is a limited company, registered in the United Kingdom.</p>
                    <p class="mb-2"><i class="bi bi-check me-2"></i>Jeeni Limited, Registered Office 71-75 Shelton Street, Covent Garden, London WC2H 9JQ England.</p>
                    <p class="mb-2"><i class="bi bi-check me-2"></i>Company Registration Number 11114945</p>
                    <p class="mb-2"><i class="bi bi-check me-2"></i>VAT Registration Number 342383215</p>
                    <p class="mb-2"><i class="bi bi-check me-2"></i>Our US operations are run by Kelli Richards (MD, Jeeni USA) 20660 Stevens Creek Boulevard, Suite 264, Cupertino, CA 95014</p>
                </div>
                <!-- // About content -->
            </div>
            <!-- // Content after About Content Wrapper -->
        </div>
        <!-- // Content after the title -->
    </div>
    <!-- // Body content -->
</main>
@endsection
