@extends('front.layouts.master')

@section('page_title') Invest - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl pt-5 body-content">

            @include('front.layouts.sub-header', [ 'page_heading' => 'FAQ'])

            <!-- Content after the title -->
            <div class="row pb-3 pb-md-5">
                <!-- About Content Wrapper -->
                <div class="d-block">
                    <!-- FAQs Content -->
                    <div class="accordion" id="accordionExample">
                        <!-- WHAT DO JEENI MEMBERS GET? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingOne">
                                <button class="accordion-button text-dark fw-bold bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    WHAT DO JEENI MEMBERS GET?
                                </button>
                            </h6>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>You don’t have to be a member to enjoy Jeeni, but if you’re not then you’ll miss out on everything Jeeni has to offer. There are two types of Members: <span class="text-red">JEENI VIEWERS</span> to enjoy all our channels and get special deals. <span class="text-red">JEENI ARTISTS</span> to showcase your creative work and keep 100% of all your revenues.</p>
                                    <p><span class="text-red">JEENI VIEWERS MEMBERSHIP</span> is for you if you want to be in the Jeeni audience and not on the Jeeni stage. Here’s what you get:</p>
                                    <p> @include('front.partials.tick-icon') ALL CHANNELS. There are a huge number of entertainment channels on Jeeni, covering music, spoken word, dance and a whole load of services. And if we don’t already have a channel that caters for you – tell us and we’ll create it!</p>
                                    <p> @include('front.partials.tick-icon') STARMAKER VOTER. You control the Jeeni charts! Vote for a track to help your favourite artists move up the charts and gain star status.</p>
                                    <p> @include('front.partials.tick-icon') EXCLUSIVES. Jeeni puts you in direct contact with your favourite creatives and artists. Just +Add them to your very own list for their latest news and special offers on releases, tickets, deals and merchandise.</p>
                                    <p><span class="text-red">JEENI ARTISTS MEMBERSHIP</span> is for creatives and artists to get in the spotlight and market your work to the world. Artist Membership to market your talent to the world carries a small charge of $10. Hey, we have to eat! Here’s what Jeeni Artists get:</p>
                                    <p> @include('front.partials.tick-icon') YOUR OWN SHOWCASE. Upload your creative work for the world to enjoy, select the best channels to attract the biggest audience, harness your social media to publicise your work even more, and build your fanbase.</p>
                                    <p> @include('front.partials.tick-icon') PERSONAL JEENI ADDRESS. Use it in your own emails, on YouTube, or anywhere you like, and deliver an even bigger audience straight to your Showcase.</p>
                                    <p> @include('front.partials.tick-icon') JEENI NEWSFEED. Send your own messages, news and offers, not only to your Jeeni fans, but to the entire Jeeni audience. Your Jeeni Newsfeed will send out your announcements to the masses, and they’ll appear automatically on their little screens, even when they’re not logged-in.</p>
                                    <p> @include('front.partials.tick-icon') DONATIONS. Link your PayPal account to your Showcase at the touch of a button, and receive 100% of all donations sent direct by fans and well-wishers who want to show their appreciation of your work. You’ve done all the work, so you deserve all the rewards.</p>
                                    <p> @include('front.partials.tick-icon') JEENI RIGHTS PACKAGE. Keep all the copyrights and 100% of income that results from the tracks you upload to your Jeeni showcase, making them eligible for Airtime, Facetime, Remix Rights and commercial use on third-party Advertising and Soundtracks.</p>
                                    <p> @include('front.partials.tick-icon') 100% OF ALL YOUR OFFERS & SERVICES. This Jeeni feature is completely optional for you to join as a Pro. Anyone can order customised productions from you, including dedications, greetings, and bespoke tracks, you agree the price direct with them and keep everything you earn.</p>
                                    <p> @include('front.partials.tick-icon') 100% OF ALL SALES INCOME. You’re paying us a modest fee to use our marketing suite, so you deserve to keep everything you make, and we want absolutely nothing more. Sales from your releases, ticketing, merchandise, specials, whatever – the rewards are all yours.</p>
                                    <p> @include('front.partials.tick-icon') JEENI PRO MARKETING. Your inclusive, automated marketing service, along with full reports on each campaign you launch.</p>
                                    <p> @include('front.partials.tick-icon') JEENI FESTIVALS & AWARDS. As a Jeeni Pro, you are automatically eligible for inclusion in Jeeni Live, and Jeeni Première streamed festivals. You are also automatically eligible for inclusion in the Jeeni Awards nominations for every track you upload.</p>
                                </div>
                            </div>
                        </div>
                        <!-- //WHAT DO JEENI MEMBERS GET? -->

                        <!-- HOW DO I MAKE MONEY ON JEENI? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingTwo">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    HOW DO I MAKE MONEY ON JEENI?
                                </button>
                            </h6>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p><span class="text-red">JEENI Artists</span> get rewarded in lots of ways:</p>
                                    <p> @include('front.partials.tick-icon') MAKE MONEY FROM SALES – keep 100% of all revenues generated through the Jeeni platform from your creative work, professional services, productions, releases, merchandise, goods and services.</p>
                                    <p> @include('front.partials.tick-icon') KEEP ALL DONATIONS – keep 100% of everything your fans and audience send to your PayPal account via the Donate button below each of your videos.</p>
                                    <p> @include('front.partials.tick-icon') KEEP 100% FROM PERSONALISED PRODUCTIONS. This Jeeni feature is completely optional for you to join as a Pro. Anyone can order customised productions from you, including dedications, greetings, and bespoke tracks, you agree the price direct with them and keep everything you earn.</p>
                                    <p> @include('front.partials.tick-icon') KEEP 100% FROM JEENI PRO MARKETING. Your inclusive, automated marketing service, along with full reports on each campaign you launch.</p>
                                    <p> @include('front.partials.tick-icon') JEENI FESTIVALS & AWARDS. As a Jeeni Pro, you are automatically eligible for inclusion in Jeeni streamed festivals. You are also automatically eligible for inclusion in the Jeeni Awards nominations for every track you upload. And as ever you keep 100% of all fees, commissions and sales you are entitled to as a result.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // HOW DO I MAKE MONEY ON JEENI? -->

                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingThree">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    HOW DO I CREATE MY PROFILE?
                                </button>
                            </h6>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-red">HOW TO CREATE YOUR JEENI USER PROFILE</p>
                                    <p> @include('front.partials.tick-icon') Your Jeeni Profile is where you tell the world all about yourself.</p>
                                    <p class="text-red">Step 1: upload your banner image</p>
                                    <p> @include('front.partials.tick-icon') This is the large image you want to display to the world.</p>
                                    <p> @include('front.partials.tick-icon') Your image can be a .png or .jpg graphic file.</p>
                                    <p> @include('front.partials.tick-icon') The maximum file size is 10MB.</p>
                                    <p> @include('front.partials.tick-icon') Your image should be in “landscape” or “letterbox” format.</p>
                                    <p> @include('front.partials.tick-icon') The minimum width should be 640 pixels.</p>
                                    <p> @include('front.partials.tick-icon') The maximum width should be 2560 pixels.</p>
                                    <p> @include('front.partials.tick-icon') You can crop your image to look best on mobiles and desktops.</p>
                                    <p> @include('front.partials.tick-icon') You can change your image as often as you like.</p>
                                    <p> @include('front.partials.tick-icon') To change your image go to the main menu MY JEENI > My Profile.</p>
                                    <p> @include('front.partials.tick-icon') Just roll over the image to reveal the selection box.</p>
                                    <p> @include('front.partials.tick-icon') Select a new image of the right size.</p>
                                    <p> @include('front.partials.tick-icon') As soon as it uploads it will be saved automatically.</p>
                                    <p class="text-red">Step 2: add your personal “gravatar” image</p>
                                    <p> @include('front.partials.tick-icon') This is the small square image that represents you.</p>
                                    <p> @include('front.partials.tick-icon') It is like a passport identity, an avatar or an icon.</p>
                                    <p> @include('front.partials.tick-icon') It can be a .png or .jpg graphic file.</p>
                                    <p> @include('front.partials.tick-icon') The maximum file size is 2MB.</p>
                                    <p> @include('front.partials.tick-icon') The minimum size should be 150 pixels square.</p>
                                    <p> @include('front.partials.tick-icon') The maximum size should be 512 pixels square.</p>
                                    <p> @include('front.partials.tick-icon') You can crop your “gravatar” image once it’s uploaded.</p>
                                    <p> @include('front.partials.tick-icon') You can change your image as often as you like</p>
                                    <p> @include('front.partials.tick-icon') To change your image go to the main menu MY JEENI > My Profile.</p>
                                    <p> @include('front.partials.tick-icon') Just roll over the “gravatar” to reveal the selection box.</p>
                                    <p> @include('front.partials.tick-icon') Select a new image of the right size.</p>
                                    <p> @include('front.partials.tick-icon') As soon as it uploads it will be saved automatically.</p>
                                    <p class="text-red">Step 3: add text for About Me</p>
                                    <p> @include('front.partials.tick-icon') Use the edit icon next to About Me to call up the edit box.</p>
                                    <p> @include('front.partials.tick-icon') Type in your Title – a name or nickname identity.</p>
                                    <p> @include('front.partials.tick-icon') This is the title that will appear on your banner image.</p>
                                    <p> @include('front.partials.tick-icon') My Jeeni URL is the name of the link to share your own Jeeni page.</p>
                                    <p> @include('front.partials.tick-icon') About Me is where you tell the world about yourself.</p>
                                    <p> @include('front.partials.tick-icon') Hit the SAVE button when you’ve finished.</p>
                                    <p> @include('front.partials.tick-icon') You can change your Title and About Me text as often as you like.</p>
                                    <p> @include('front.partials.tick-icon') To change your text go to the main menu MY JEENI > My Profile.</p>
                                    <p> @include('front.partials.tick-icon') Click on the edit icon for About Me to reveal the editing box.</p>
                                    <p> @include('front.partials.tick-icon') Hit the SAVE button again when you’ve finished.</p>
                                    <p class="text-red">Step 4: pick a colour for your Title</p>
                                    <p> @include('front.partials.tick-icon') This is to make your title name or nickname stand out.</p>
                                    <p> @include('front.partials.tick-icon') The default colour is white, to show up against your banner image.</p>
                                    <p> @include('front.partials.tick-icon') Hover over your title to reveal the colour selector.</p>
                                    <p> @include('front.partials.tick-icon') Pick a text colour and hit the Submit button.</p>
                                    <p> @include('front.partials.tick-icon') You can change the colour of your title as often as you like.</p>
                                    <p class="text-red">Step 5: Add your Social Networks</p>
                                    <p> @include('front.partials.tick-icon') This is if you want to share your social networks with others.</p>
                                    <p> @include('front.partials.tick-icon') Click on the edit icon just below your title.</p>
                                    <p> @include('front.partials.tick-icon') Fill in as many social media address links as you like.</p>
                                    <p> @include('front.partials.tick-icon') Don’t forget to Save the links you have created.</p>
                                    <p> @include('front.partials.tick-icon') Your social network icons will appear on your profile page.</p>
                                    <p class="text-red">Step 6: Your unique Profile Page Address</p>
                                    <p> @include('front.partials.tick-icon') Your Jeeni Profile Page has a unique address.</p>
                                    <p> @include('front.partials.tick-icon') You can share this address via social media.</p>
                                    <p> @include('front.partials.tick-icon') You can copy this address using the Copy Link button.</p>
                                    <p> @include('front.partials.tick-icon') Now paste it into an email or blog or newsfeed to tell the world</p>
                                    <p>about your Jeeni Profile.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // HOW DO I CREATE MY PROFILE? -->

                        <!--  HOW DO I CREATE MY SHOWCASE? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingFour">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    HOW DO I CREATE MY SHOWCASE?
                                </button>
                            </h6>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-red">SHOWCASES FOR JEENI ARTISTS</p>
                                    <p> @include('front.partials.tick-icon') Your Showcase is where you put your creative talent in the spotlight.</p>
                                    <p> @include('front.partials.tick-icon') Showcases are for Jeeni Artists only.</p>
                                    <p> @include('front.partials.tick-icon') The step-by-step process is Profile > Images > Social > Showcase > Video</p>
                                    <p> @include('front.partials.tick-icon') You can come back to the process at any time via MY JEENI > My Showcase</p>
                                    <p class="text-red">Step 1: My Profile</p>
                                    <p> @include('front.partials.tick-icon') Type in your Title – which is your name, nickname or professional identity.</p>
                                    <p> @include('front.partials.tick-icon') This is the title that appears on your banner image.</p>
                                    <p> @include('front.partials.tick-icon') You can change the colour of your title for better contrast.</p>
                                    <p> @include('front.partials.tick-icon') Roll over your title to reveal the colour selector.</p>
                                    <p> @include('front.partials.tick-icon') My Jeeni URL is the name of the link for your own Jeeni page, for sharing and publicity.</p>
                                    <p> @include('front.partials.tick-icon') About Me is where you tell the world about yourself.</p>
                                    <p> @include('front.partials.tick-icon') Hit the SAVE & NEXT STEP button when you’ve finished.</p>
                                    <p> @include('front.partials.tick-icon') You will be taken to the next step automatically.</p>
                                    <p class="text-red">Step 2: Images</p>
                                    <p> @include('front.partials.tick-icon') Upload your banner image.</p>
                                    <p> @include('front.partials.tick-icon') This is the large branding image you want to display to the world.</p>
                                    <p> @include('front.partials.tick-icon') Your image can be a .png or .jpg graphic file.</p>
                                    <p> @include('front.partials.tick-icon') The maximum file size is 10MB.</p>
                                    <p> @include('front.partials.tick-icon') Your image should be in “landscape” or “letterbox” format.</p>
                                    <p> @include('front.partials.tick-icon') The minimum width should be 640 pixels.</p>
                                    <p> @include('front.partials.tick-icon') The maximum width should be 2560 pixels.</p>
                                    <p> @include('front.partials.tick-icon') You can crop your image to look best on mobiles and desktops.</p>
                                    <p> @include('front.partials.tick-icon') You can change your banner branding image as often as you like.</p>
                                    <p> @include('front.partials.tick-icon') To change your image go to the main menu MY JEENI > My Profile.</p>
                                    <p> @include('front.partials.tick-icon') Just roll over the image to reveal the selection box.</p>
                                    <p> @include('front.partials.tick-icon') Select a new image of the right size.</p>
                                    <p> @include('front.partials.tick-icon') As soon as it uploads it will be saved automatically.</p>
                                    <p> @include('front.partials.tick-icon') Add your personal “gravatar” image.</p>
                                    <p> @include('front.partials.tick-icon') This is the small square image that represents you.</p>
                                    <p> @include('front.partials.tick-icon') It is like a passport identity, an avatar or an icon.</p>
                                    <p> @include('front.partials.tick-icon') It can be a .png or .jpg graphic file.</p>
                                    <p> @include('front.partials.tick-icon') The maximum file size is 2MB.</p>
                                    <p> @include('front.partials.tick-icon') The minimum size should be 150 pixels square.</p>
                                    <p> @include('front.partials.tick-icon') The maximum size should be 512 pixels square.</p>
                                    <p> @include('front.partials.tick-icon') You can crop your “gravatar” image once it’s uploaded.</p>
                                    <p> @include('front.partials.tick-icon') You can change this graphic as often as you like.</p>
                                    <p> @include('front.partials.tick-icon') Hit the SAVE & NEXT STEP button when you’ve finished.</p>
                                    <p> @include('front.partials.tick-icon') You will be taken to the next step automatically.</p>
                                    <p class="text-red">Step 3: Social Networks and Online Links</p>
                                    <p> @include('front.partials.tick-icon') This is where you publicise your online presence to fans.</p>
                                    <p> @include('front.partials.tick-icon') Fill in as many social media and other address links as you like.</p>
                                    <p> @include('front.partials.tick-icon') Your social network icons will be integrated with the graphics on your profile page automatically.</p>
                                    <p> @include('front.partials.tick-icon') Hit the SAVE & NEXT STEP button when you’ve finished.</p>
                                    <p> @include('front.partials.tick-icon') You will be taken to the next step automatically.</p>
                                    <p class="text-red">Step 4: Brand My Showcase</p>
                                    <p> @include('front.partials.tick-icon') This is where you add important text to attract new fans, make yourself easy to find, and harness search engines like Google.</p>
                                    <p> @include('front.partials.tick-icon') Name your showcase, either with your own name, your artist name, the name of your latest project, whatever it is you want to publicise most.</p>
                                    <p> @include('front.partials.tick-icon') You can change the name of your Showcase as often as you like.</p>
                                    <p> @include('front.partials.tick-icon') Now type in the most important aspects about your Showcase in less than 500 characters.</p>
                                    <p> @include('front.partials.tick-icon') Use keywords to include your creative work, your location, your influences, collaborators, instrumentation, goods, services, and whatever you think potential fans will be searching for.</p>
                                    <p> @include('front.partials.tick-icon') Hit the SAVE & NEXT STEP button when you’ve finished.</p>
                                    <p> @include('front.partials.tick-icon') You will be taken to the next step automatically.</p>
                                    <p class="text-red">Step 5: Upload My First Track</p>
                                    <p> @include('front.partials.tick-icon') Everything you need to know about uploading audios and videos and showcasing your creative work is in the next section – HOW TO UPLOAD TRACKS.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // HOW DO I CREATE MY SHOWCASE? -->

                        <!-- WHAT ARE THE BEST SIZES FOR MY IMAGES? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingFive">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    WHAT ARE THE BEST SIZES FOR MY IMAGES?
                                </button>
                            </h6>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-red">Banner Image</p>
                                    <p> @include('front.partials.tick-icon') This is the large branding image you want to display to the world.</p>
                                    <p> @include('front.partials.tick-icon') Your image can be a .png or .jpg graphic file.</p>
                                    <p> @include('front.partials.tick-icon') The maximum file size is 10MB.</p>
                                    <p> @include('front.partials.tick-icon') Your image should be in “landscape” or “letterbox” format.</p>
                                    <p> @include('front.partials.tick-icon') The minimum width should be 640 pixels.</p>
                                    <p> @include('front.partials.tick-icon') The maximum width should be 2560 pixels.</p>
                                    <p> @include('front.partials.tick-icon') You can crop your image to look best on mobiles and desktops.</p>
                                    <p> @include('front.partials.tick-icon') You can change your banner branding image as often as you like.</p>
                                    <p> @include('front.partials.tick-icon') To change your image go to the main menu MY JEENI > My Profile.</p>
                                    <p> @include('front.partials.tick-icon') Just roll over the image to reveal the selection box.</p>
                                    <p> @include('front.partials.tick-icon') Select a new image of the right size.</p>
                                    <p> @include('front.partials.tick-icon') As soon as it uploads it will be saved automatically.</p>
                                    <p class="text-red">Gravatar image</p>
                                    <p> @include('front.partials.tick-icon') Add your personal “gravatar” image.</p>
                                    <p> @include('front.partials.tick-icon') This is the small square image that represents you.</p>
                                    <p> @include('front.partials.tick-icon') It is like a passport identity, an avatar or an icon.</p>
                                    <p> @include('front.partials.tick-icon') It can be a .png or .jpg graphic file.</p>
                                    <p> @include('front.partials.tick-icon') The maximum file size is 2MB.</p>
                                    <p> @include('front.partials.tick-icon') The minimum size should be 150 pixels square.</p>
                                    <p> @include('front.partials.tick-icon') The maximum size should be 512 pixels square.</p>
                                    <p> @include('front.partials.tick-icon') You can crop your “gravatar” image once it’s uploaded.</p>
                                    <p> @include('front.partials.tick-icon') You can change this graphic as often as you like.</p>
                                    <p> @include('front.partials.tick-icon') Hit the SAVE & NEXT STEP button when you’ve finished.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // WHAT ARE THE BEST SIZES FOR MY IMAGES? -->

                        <!-- HOW DO I UPLOAD MY TRACKS? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingSix">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    HOW DO I UPLOAD MY TRACKS?
                                </button>
                            </h6>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>This section is a step-by-step guide on how to upload audio and video tracks. It’s for Jeeni Artists. Jeeni Audience members can’t upload tracks.</p>
                                    <p class="text-red">Step 1: Your Track Content</p>
                                    <p> @include('front.partials.tick-icon') Videos of your work, goods or services must be in MP4 format.</p>
                                    <p> @include('front.partials.tick-icon') Audio-only tracks must be in MP3 format.</p>
                                    <p> @include('front.partials.tick-icon') Track files should be no more than 50MB each.</p>
                                    <p> @include('front.partials.tick-icon') Your track content should contain original material. No covers please.</p>
                                    <p> @include('front.partials.tick-icon') Your content should be either your own copyright, or you must have permission from the copyright-holder to upload it.</p>
                                    <p> @include('front.partials.tick-icon') You cannot submit or upload any content that is obscene, illegal, threatening, defamatory, racist, sexist, phobic or otherwise offensive.</p>
                                    <p> @include('front.partials.tick-icon') You cannot upload any content to Jeeni that invades privacy or infringes the intellectual property of any other person, group or organisation.</p>
                                    <p> @include('front.partials.tick-icon') You cannot submit or upload any content to Jeeni that contains software viruses, mass mailings, spam, fake news or upsetting images.</p>
                                    <p> @include('front.partials.tick-icon') You cannot impersonate any other artist, performer, producer, studio, brand, person or entity, in such a way as to mislead other users of Jeeni as to your identity and the origin of your material.</p>
                                    <p class="text-red">Step 2: Your Video and Audio Rights</p>
                                    <p> @include('front.partials.tick-icon') All of your legal rights, or the copyright-owner’s legal rights remain protected.</p>
                                    <p> @include('front.partials.tick-icon') Jeeni has no claim on copyright or legal ownership of the video or audio files or accompanying details you upload.</p>
                                    <p> @include('front.partials.tick-icon') You can change, delete or replace your track content as much as you like, as often as you like.</p>
                                    <p class="text-red">Step 3: Uploading Tracks</p>
                                    <p> @include('front.partials.tick-icon') Type in the title of your track.</p>
                                    <p> @include('front.partials.tick-icon') Now select up to 6 most appropriate channels where your track should be listed. You can leave this to later or change your mind at any time.</p>
                                    <p> @include('front.partials.tick-icon') Next, select the track you want to upload from wherever you have stored it, using the Browse button.</p>
                                    <p> @include('front.partials.tick-icon') You can also Browse and upload a thumbnail image to publicise your track, or simply let the system select one for you.</p>
                                    <p> @include('front.partials.tick-icon') When your file or files have uploaded, hit UPLOAD and wait.</p>
                                    <p>Your track will appear in your Showcase, but only you can see it. It will be viewed and approved by a real live human being, then go live.</p>
                                    <p>IMPORTANT: JEENI WILL PUBLICISE YOUR TRACK AUTOMATICALLY. You want to make extra sure that a whole new audience can find your work, so PLEASE give your fans and search engines like Google something to chew on. For any of your tracks, simply hit the Edit icon and get the following elements right.</p>
                                    <p><span class="text-red">Title</span> – the title of your track and the name of the performer(s).</p>
                                    <p><span class="text-red">Summary</span> – use key words and phrases to attract a new audience using smart searches. For example, production credits, instrumentation, contact and publicity details, the names of your inspirations and influences, greatest hits, awards, bios.</p>
                                    <p><span class="text-red">Description</span> – these are the words and phrases that will appear in the listings, and you can format them using the tools provided. Think of them like a publicity poster for your work.</p>
                                    <p><span class="text-red">Categories</span> – this is where you can select or change up to 6 appropriate categories of Jeeni Channels where your video appears. Your track is automatically included in the ALL CHANNELS category, but you can change that if you want.</p>
                                    <p><span class="text-red">Tags</span> – specifically for search engines like Google.</p>
                                    <p><span class="text-red">Showcase</span> – displays the name of the Showcase that your video will appear in.</p>
                                    <p> @include('front.partials.tick-icon') Hit the red button to Save Changes, and that’s it.</p>
                                    <p class="text-red">Step 4: Additional Tracks</p>
                                    <p> @include('front.partials.tick-icon') Jeeni Artists can upload up to 6 tracks to their Showcase.</p>
                                    <p> @include('front.partials.tick-icon') A running total of your tracks is clearly displayed.</p>
                                    <p> @include('front.partials.tick-icon') You can delete, update, change or add new tracks at any time.</p>
                                    <p> @include('front.partials.tick-icon') If you run out of room for new tracks, delete one or more existing tracks.</p>
                                    <p> @include('front.partials.tick-icon') To remove a track, activate the delete icon to put it in the Trash.</p>
                                    <p> @include('front.partials.tick-icon') It will stay in the Trash so you can reload it later, or delete it permanently.</p>
                                    <p> @include('front.partials.tick-icon') To make room for new tracks, empty the Trash by rolling over the video thumbnail image and hitting the Bin icon.</p>
                                    <p> @include('front.partials.tick-icon') A dialogue box will appear asking you to confirm.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // HOW DO I UPLOAD MY TRACKS? -->

                        <!-- WHAT ARE THE BUTTONS UNDER EACH TRACK? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingSeven">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    WHAT ARE THE BUTTONS UNDER EACH TRACK?
                                </button>
                            </h6>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-red">AUDIO/VIDEO BUTTONS</p>
                                    <p>There’s a range of very useful buttons under every audio/video track on Jeeni. Here’s what they do:</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">VOTE</span> – hit the Vote button to help push this track up the Charts and get rewarded.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">ADD</span> – add the artist/performer of this track to your personal list, and get their latest news and special offers direct.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">SHARE</span> – share this track with one click, to send its link to your friends and networks via email or your social media.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">WATCH LATER</span> – add this track to your personal Playlist so you can enjoy it any time you like.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">VIEW SHOWCASE</span> – go straight to the Showcase of the artist or performer of this track to find more tracks and discover more about them.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">DONATE</span> – show your appreciation by sending a donation direct to this artist or performer. It’s entirely up to the artist or performer if they want to take advantage of your generosity, and Jeeni guarantees that whatever you decide they’ll receive 100% of your donation.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">OFFERS & SERVICES</span> – our great opt-in service for artists and performers, and as ever they will receive 100% of everything agreed. Anyone can order goods, services, release, merchandise and customised productions from participating artists, including dedications, greetings, and bespoke tracks. Prices are agreed direct between the artist and the buyer, and Jeeni acts as a matchmaker to bring happiness to all involved.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">REPORT THIS </span>– tell Team Jeeni if you think a track should be removed. If you click on this button then a special screen appears to help you with your report.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">PREVIOUS</span> – play the previous track.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">NEXT</span> – play the next track.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">MORE</span> – reveal more tracks.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">AUTO NEXT</span> – toggle ON/OFF to enjoy the next track automatically.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">VOLUME</span> – adjust the volume or mute the sound.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">SCREEN SIZE</span> – toggle between standard and full-screen track display.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">PLAY/PAUSE</span> – standard play/pause button with the track time-elapse shown in minutes and seconds.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // WHAT ARE THE BUTTONS UNDER EACH TRACK? -->

                        <!-- WHAT ARE THE SIZE LIMITS FOR AUDIO AND VIDEO FILES? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingEight">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    WHAT ARE THE SIZE LIMITS FOR AUDIO AND VIDEO FILES?
                                </button>
                            </h6>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p> @include('front.partials.tick-icon') The size limit for any file to upload to Jeeni is 50MB.</p>
                                    <p> @include('front.partials.tick-icon') Videos of your work, goods or services must be in MP4 format.</p>
                                    <p> @include('front.partials.tick-icon') Audio-only tracks must be in MP3 format.</p>
                                    <p> @include('front.partials.tick-icon') Jeeni Artists can upload up to 6 audio/video files to their Showcase.</p>
                                    <p> @include('front.partials.tick-icon') If you need to upload additional files, please contact our technical support desk for details and costs.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // WHAT ARE THE SIZE LIMITS FOR AUDIO AND VIDEO FILES? -->

                        <!-- WHAT IF I NEED MORE THAN 6 TRACKS IN MY SHOWCASE? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingNine">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    WHAT IF I NEED MORE THAN 6 TRACKS IN MY SHOWCASE?
                                </button>
                            </h6>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We limit the number of tracks in your showcase to 6 or we’d go broke if we let everyone upload as many files as they want and eat up our server space and management costs.</p>
                                    <p>Some of our celebrities, Ambassadors, partners and special artists have way more than 6 videos in their showcase. That’s because they give us support in terms of publicity, fan outreach and sometimes even money!</p>
                                    <p>If you want a load more tracks in your showcase, and you think you can offer us something in return, then contact our business helpdesk on <a class="text-red" href="">jeeni.com/support/</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- // WHAT IF I NEED MORE THAN 6 TRACKS IN MY SHOWCASE? -->

                        <!-- WHAT'S IN THE JEENI MENUS? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingTen">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    WHAT'S IN THE JEENI MENUS?
                                </button>
                            </h6>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>We don’t want to insult your intelligence by explaining how navigation works on a website or app, but we’re doing it anyway. Here goes.</p>
                                    <p class="text-red">TOP MENU</p>
                                    <p>On any connected device, the top menu is really simple.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">JEENI logo</span> – this takes you to the Jeeni Home Page wherever you are.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">Select Channel</span> – reveal all the Jeeni channels to select your favourite.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">Search Jeeni</span> – type in whatever you’re looking for, to find artists, titles, goods, services, blogs, features, anything and everything.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">Login</span> – and enjoy everything that JEENI has to offer. If you haven’t joined Jeeni yet, then the <span class="text-red">JOIN TODAY</span> button is ready when you are.</p>
                                    <p class="text-red">My Jeeni</p>
                                    <p>This menu always sits near the top-right of your screen. Everything in My Jeeni  is available when you join as a Jeeni Artist, and some features are available for Jeeni Audience members:</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">Short-cut buttons</span> – to go straight to your Showcase or Upload a new track.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Profile</span> – this is where you strut your stuff and take control.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">View My Profile</span> – for an instant overview</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Edit My Profile</span> – and keep everyone up to date</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Social Links</span> – spread the love</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My PayPal.me</span> – get set to make money via Jeeni</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Services</span> – all ready and set up for you to market to the masses.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Invites</span> – invite others to join Jeeni, and get rewarded for your success.</p>
                                    <p class="ps-4"><span class="text-red">My Showcase</span> – go straight to your Showcase and put what you have to offer in the spotlight.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">View My Showcase</span> – check out how others see your Showcase.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Showcase</span> – edit what’s in your Showcase.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Upload a Track</span> – upload a video or audio track for the public to enjoy.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Newsfeed</span> – tell the public all about what’s going on in your world.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Marketing</span> – your unique fully-automated artist marketing package.</p>
                                    <p class="ps-4"><span class="text-red">My Artists</span> – your direct line to Jeeni Artists, including performers, creatives and experts.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Artists</span> – the place where you monitor your list of all the artists, performers, creatives and suppliers who you want to send you updates and offers.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">My Artist Offers</span> – this is where your personalised artist offers appear, all in one place.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">My Playlist</span> – all the tracks you select for enjoying any time are kept here.</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">My Feedback</span> – have your say, and help make Jeeni even better.</p>
                                    <p class="ps-4"><span class="text-red">My Account</span> – here’s where you control all aspects of your relationship with Jeeni.</p>
                                    <p class="text-red ps-4"> @include('front.partials.tick-icon') My Password & Account Details</p>
                                    <p class="text-red ps-4"> @include('front.partials.tick-icon') Deactivate My Account</p>
                                    <p> @include('front.partials.tick-icon') <span class="text-red">Logout</span> – we have absolutely no idea what this option is for … only kidding.</p>
                                    <p class="text-red">BOTTOM/FOOTER MENU</p>
                                    <p>The following options are available at the bottom of every Jeeni page:</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Facebook</span> – go to the Jeeni Facebook Group for Independent Artists And Performers (IMAP).</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Instagram</span> – go to the Jeeni Instagram page.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Twitter</span> – go to the Jeeni Twitter feed.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">YouTube</span> – go to the Jeeni YouTube channel.</p>
                                    <p class="text-red">MEMBERSHIP</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Join Jeeni Audience</span> – join Jeeni as a member of the audience.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Join Jeeni Artists</span> – join Jeeni as an artist, performer, service provider or creative member.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Terms and Conditions</span> – all the small print in one place.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Privacy Policy</span> – how we protect your data.</p>
                                    <p class="text-red">RESOURCES</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Buy Jeeni PCs</span> – invest your hard-earned money in our bespoke range of award-winning computers for artists, performers, producers and videographers.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Support helpdesk</span> – where you can contact our legal, tecjnoical and business help-desks.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Blogs</span> – catch up on the latest thoughts, features and words of wisdom from members of the team and special guests.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">FAQs</span> – visit the page you’re on right now.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Newsletter</span> – if you don’t want to join Jeeni you can still sign up to our free Jeeni Newsletter service, and read the latest edition here.</p>
                                    <p class="text-red">COMPANY</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">About</span> – what Jeeni Limited is and what it’s for.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Team</span> – what we look like and who we are: meet the Jeeni team, our celebrity ambassadors and mentors.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Partners</span> – the companies and organisations we’re in partnership with.</p>
                                    <p class="ps-4"> @include('front.partials.tick-icon') <span class="text-red">Invest in Jeeni</span> – own a part of the action and view the latest Jeeni stats.</p>
                                </div>
                            </div>
                        </div>
                        <!--  // WHAT'S IN THE JEENI MENUS? -->

                        <!-- WHAT IS JEENI ARTIST MARKETING? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingEleven">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                    WHAT IS JEENI ARTIST MARKETING?
                                </button>
                            </h6>
                            <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-red">JEENI ARTIST MARKETING – INTRODUCTION</p>
                                    <p>You’re a creative artist, musician or performer, right?</p>
                                    <p>You want to be rewarded for what you do, correct?</p>
                                    <p>You want to grow your fanbase, OK?</p>
                                    <p>You want recognition, applause and success, true?</p>
                                    <p>You don’t want to pay other people for empty promises of help, agreed?</p>
                                    <p>You’ve got a Jeeni Showcase, and now you want to put it to work, yes?</p>
                                    <p>Congratulations! JEENI ARTIST MARKETING is here to handle all of this for you, no sweat. Well, maybe just a bead of sweat, but you’ve done all the hard work already, so here’s how to put it in the spotlight, centre-stage.</p>
                                    <p>EENI ARTIST MARKETING is an exclusive service for Jeeni artists. It reaches out, promotes and markets your creative talent, simply and effectively. It handles your releases, your merchandise, your events and your news, all at the touch of a button. Best of all, JEENI ARTIST MARKETING delivers precise results and clear stats with ongoing reports about your campaign, so you can see what works and what doesn’t, to make it even better next time round.</p>
                                    <p class="text-red">Your Target Audience</p>
                                    <p>JEENI ARTIST MARKETING allows you to reach out to 3 sectors of your target audience:</p>
                                    <p>1. Your existing fanbase, who are already part of your network.</p>
                                    <p>2. Brand new fans who have voted for your tracks and opted-in to receive your promotions.</p>
                                    <p>3. The mass of Jeeni users who allow push-notifications; in other words potential fans who are not yet aware of your work.</p>
                                    <p>So the good news is that even if you haven’t got any views, votes or fans yet, you can still get your marketing campaigns in front of a new global audience.</p>
                                    <p class="text-red">Your Marketing Methods</p>
                                    <p>There are two types of marketing methods.</p>
                                    <p>1. email marketing</p>
                                    <p>2. push-marketing</p>
                                    <p>Email marketing only reaches your existing fanbase, but push-marketing reaches everyone who allows notifications on their mobile, laptop or desktop devices. Push notifications have a great advantage because users do not need to have their browser open on their device, if they have allowed notifications. JEENI ARTIST MARKETING lets you use both methods.</p>
                                    <p class="text-red">Your Backlinks</p>
                                    <p>A backlink is a link from somewhere on the web to a target somewhere else on the web. Think of a backlink as a sort of citation. Search engines love citations.</p>
                                    <p>When you create a campaign with JEENI ARTIST MARKETING, you send an email to your fanbase and a push-notification to all website visitors and mobile users who allow notifications. Your campaign generates an automatic backlink to your Showcase to lead fans by the nose straight to your work. You also get a whole load of URLs (website page addresses) to use as backlinks on social networks.</p>
                                    <p>JEENI ARTIST MARKETING backlinks are carefully created to be effective. They tie in to your campaign to track, trace and measure the number of people who respond to it.</p>
                                    <p>A backlink that has been responded to is added to your campaign report and a reward is added to your account up to the maximum for your campaign allowance. After all, the more successful your campaign is for you, the more traffic we get on Jeeni and the better we like it. Everybody wins.</p>
                                    <p class="text-red">Some Patronising & Possibly Irritating Advice</p>
                                    <p>Before releasing a JEENI ARTIST MARKETING campaign into the wild, it’s a really good idea to make sure of the following six things:</p>
                                    <p>1. Your Profile and Showcase information is up to date.</p>
                                    <p>2. Your images are the ones you want to display to the world.</p>
                                    <p>3. Your audio or video tracks have been uploaded.</p>
                                    <p>4. You have chosen the most suitable ready-made template to attract the masses.</p>
                                    <p>5. You have set the best date and time to kick off your campaign to tie in with any other promotions you are doing.</p>
                                    <p>6. You have set a suitable date and time to close your campaign so you don’t bore the pants off people.</p>
                                    <p class="text-red">Creating Your Campaign</p>
                                    <p>Ready? OK, here we go. To create a campaign, follow these steps:</p>
                                    <p class="text-red">Step 1:</p>
                                    <p>Login as a Jeeni Artist</p>
                                    <p class="text-red">Step 2:</p>
                                    <p>Click on the Marketing option from your Profile page. You will be whisked off to your personal My Marketing page.</p>
                                    <p class="text-red">Step 3:</p>
                                    <p>The campaign builder panel is towards the left of your screen. You can select NEW CAMPAIGN to start over, My Marketing to monitor the progress and results of your campaigns, or My Marketing Documents to access your resources. To start, hit the red button that says NEW CAMPAIGN. A panel of tools is revealed that says Create My Campaign, and it does exactly that.</p>
                                    <p class="text-red">Step 4:</p>
                                    <p>Write the words</p>
                                    <p>Hit the top icon to write the words you want to communicate for your new marketing campaign.</p>
                                    <p>The Campaign Title is for your own use to identify your campaign and the reports that come with it, so give it a clear, unique title. Remember, you may well create dozens of marketing campaigns, so you’ll want to recognise each one for future reference.</p>
                                    <p>The Campaign Subject is the all-important subject header you want the world to see, so make it clear, relevant, punchy, and something that encourages the world to open it and read it.</p>
                                    <p>The white text panel is where you write your Campaign body text. This is the message you want to communicate to your audience, excite them and get them involved. There’s a standard set of formatting tools to make it look good, including any links you want to include.</p>
                                    <p class="text-red">Step 5:</p>
                                    <p>Add the images</p>
                                    <p>This tab is where you set an individual thumbnail icon and larger marketing banner image. They are used in the push-notifications as well as your email campaign.</p>
                                    <p>The Icon will be displayed alone on desktop web-push notifications, and both the Icon and Banner will be used on mobile push notifications, such as hand-held devices. Your Banner can also be used as part of the email message, depending on the email template you select. This is explained a little later.</p>
                                    <p>If you don’t select any images at all during this step, then your Jeeni profile “gravatar” icon and showcase/profile banner will be used automatically. If your marketing banner is the same as your showcase banner, then only your showcase banner will be used.</p>
                                    <p class="text-red">Step 6:</p>
                                    <p>Choose your email template</p>
                                    <p>This tab saves you a huge amount of work. There’s a load of ready-made templates for your email marketing campaigns. The purpose of these ready-mades is that they can be used immediately, without any programming skills or technical knowledge. Just select the one that suits you best and JEENI ARTIST MARKETING will deliver your entire campaign ready-made.</p>
                                    <p>Templates include simple layouts and more complex ones, and they feature a mixture of elements, placings and priorities.</p>
                                    <p>The elements can include your campaign title, dates, showcase image, marketing banner, campaign message, latest videos, one or more newsfeeds and the key to world peace and happiness.</p>
                                    <p class="text-red">Step 7:</p>
                                    <p>Target your audience</p>
                                    <p>This tab allows you to select where in the world you want your push marketing campaigns to appear.</p>
                                    <p>For example you may want to target North American audiences in one campaign and Europeans in another parallel campaign, and compare how they respond.</p>
                                    <p>Similarly you may want to run a separate campaign in Spanish aimed at South America, or include the whole world apart from Oceania under because you once had an unhappy experience playing cricket in Australia. Please note that we include Antarctica, because we believe penguins deserve a break.</p>
                                    <p>If you do not make any selection at all, then your marketing campaign will be sent to every location on the planet. Including the penguins.</p>
                                    <p class="text-red">Step 8:</p>
                                    <p>Schedule your campaign</p>
                                    <p>This tab allows you to schedule a start date and exact start time for the campaign, as well as a closing date and time for the campaign. If you leave this blank, then the send date will be scheduled for the next immediate slot available.</p>
                                    <p>Jeeni is set up to launch the queue of data for marketing campaigns in carefully controlled batches to avoid bottlenecks in our services, so there may be a slight delay before your campaign gets squirted into the pipeline of hope. This only relates to when your push-message campaigns get sent out, and currently does not affect email communications which will normally be delivered immediately.</p>
                                    <p class="text-red">Step 9:</p>
                                    <p>Send and launch your campaign</p>
                                    <p>When you are satisfied that your new marketing campaign is ready to go, simply hit the red button that says Send Push Notification and it will be launched.</p>
                                    <p>Please remember, once your campaign is sent there is no way to unsend it, so make sure you are completely happy with everything before you release it!</p>
                                    <p class="text-red">My Marketing Reports</p>
                                    <p>The My Marketing button sits below the NEW CAMPAIGN button on your screen, and this is where you reveal the ongoing results of the marketing campaigns that you have sent out. It also displays some really useful links to click and copy for posting on your own social networks. We’ll get to them a little later.</p>
                                    <p>Click on My Marketing to reveal the data, stats and results for your marketing campaigns. If you have launched several campaigns then the most recent campaign is displayed with a darker background.</p>
                                    <p>At the top of each campaign marketing report you will see:</p>
                                    <p> @include('front.partials.tick-icon') the Campaign Title for your own use</p>
                                    <p> @include('front.partials.tick-icon') the Subject of the campaign that your audience sees</p>
                                    <p> @include('front.partials.tick-icon') a Campaign Code that relates to Google Analytics</p>
                                    <p> @include('front.partials.tick-icon') the Start and End dates of your campaign</p>
                                    <p> @include('front.partials.tick-icon') your Campaign Status, shown in green.</p>
                                    <p>Your Campaign Status can display one of the following messages:</p>
                                    <p> @include('front.partials.tick-icon') Campaign creation in progress – copying subscriptions = your campaign is still being created</p>
                                    <p> @include('front.partials.tick-icon') New campaign = your new campaign is ready to send</p>
                                    <p> @include('front.partials.tick-icon') Pending = your campaign is waiting in the queue to be sent</p>
                                    <p> @include('front.partials.tick-icon') In progress = campaign sending is in progress</p>
                                    <p> @include('front.partials.tick-icon') Sent = your campaign has been sent</p>
                                    <p> @include('front.partials.tick-icon') Cancelled by user = you decided to cancel your campaign before it had time to be sent</p>
                                    <p> @include('front.partials.tick-icon') Has Ended = the campaign expiry date/time has passed and your campaign has ended</p>
                                    <p> @include('front.partials.tick-icon') No active recipients = you don’t have any active fans at the moment</p>
                                    <p> @include('front.partials.tick-icon') Error = there was a problem when the campaign was sent out</p>
                                    <p> @include('front.partials.tick-icon') Test campaign sent = this is for our techies if they need to test your account</p>
                                    <p> @include('front.partials.tick-icon') Campaign awaiting results of A/B testing = this is also one for our techies</p>
                                    <p> @include('front.partials.tick-icon') Archived = another one for the Jeeni nerds to keep a record</p>
                                    <p>Below your Campaign Status is where your Push Stats appear, with values in numbers and graphics, as follows:</p>
                                    <p> @include('front.partials.tick-icon') the number of targets Sent to</p>
                                    <p> @include('front.partials.tick-icon') the number safely Delivered</p>
                                    <p> @include('front.partials.tick-icon') the number that have been Clicked On to view</p>
                                    <p> @include('front.partials.tick-icon') the number that Failed to be delivered</p>
                                    <p class="text-red">Harnessing your social networks.</p>
                                    <p>A very effective way of growing your fanbase and attracting more people to your Jeeni Showcase is to harness your existing and future social networks.</p>
                                    <p>JEENI ARTIST MARKETING does this automatically for you, without the bother of having to duplicate everything time after time.</p>
                                    <p>At the bottom of your report panel are your Other Hits. These show the Social Network Stats for your campaign, and this is a real bonus service from JEENI ARTIST MARKETING.</p>
                                    <p>For example, if you have an existing Twitter account, Facebook account and your own fan database of email addresses, then hit the relevant social network icon to automatically generate a link code for each one.</p>
                                    <p>Click on one of the social media icons to copy the URL (web page address) of your campaign, and paste it in to your relevant social media post. Then send out the post and anyone who clicks on the link will land on your JEENI ARTIST MARKETING campaign.</p>
                                    <p>The number of successful hits you achieve for your campaign via each social network is displayed at the bottom of your marketing report panel, like the one above.</p>
                                    <p>At time of writing, this works with the following social media platforms, but by the time you read this we may well have added more.</p>
                                    <p> @include('front.partials.tick-icon') your own email list</p>
                                    <p> @include('front.partials.tick-icon') Facebook</p>
                                    <p> @include('front.partials.tick-icon') Twitter</p>
                                    <p> @include('front.partials.tick-icon') Google</p>
                                    <p> @include('front.partials.tick-icon') LinkedIn</p>
                                    <p> @include('front.partials.tick-icon') Pinterest</p>
                                    <p> @include('front.partials.tick-icon') YouTube</p>
                                    <p>As an additional service for Jeeni artists, you will automatically receive a regular email containing your latest marketing report and stats.</p>
                                    <p class="text-red">My Marketing Documents</p>
                                    <p>My Marketing Documents is the lower button of your Marketing group, and is where the library of detailed marketing resources and guides sit. It will be updated and added to as Jeeni evolves.</p>
                                    <p class="text-red">Newsfeeds</p>
                                    <p>Jeeni marketing uses a multi-doodah approach when it comes to connecting with your existing audience and growing your fan-base. This is because if one strategy doesn’t work too well, then chances are that an alternative one will.</p>
                                    <p>As well as the automated marketing suite that Jeeni offers, there is a built-in newsfeed service. When any Jeeni user opts-in to follow you, they are instantly added to your communications list and will receive updates from your newsfeed as well as your email campaigns.</p>
                                    <p>Exploiting newsfeeds is dealt with in the next section.</p>
                                    <p class="text-red">Marketing Campaign Checklist</p>
                                    <p>Please don’t launch a marketing campaign until you have updated your showcase with the relevant audio/video tracks and your latest information. Here’s a campaign checklist to remind yourself of what needs to be done before you hit that big red button.</p>
                                    <p> @include('front.partials.tick-icon') I have an email where I can be reached</p>
                                    <p> @include('front.partials.tick-icon') I have added my social media links to my profile</p>
                                    <p> @include('front.partials.tick-icon') I have uploaded an image for my thumbnail or logo</p>
                                    <p> @include('front.partials.tick-icon') I have uploaded a banner image</p>
                                    <p> @include('front.partials.tick-icon') I have written a description about what it is I am trying to market</p>
                                    <p> @include('front.partials.tick-icon') I have uploaded at least three audio/video tracks</p>
                                    <p> @include('front.partials.tick-icon') I have written at least three newsfeeds</p>
                                    <p>And before you say that you only want to promote one audio/video and one newsfeed, here’s what we recommend.</p>
                                    <p>By all means promote your latest release as a stand-alone if that’s what you insist, but you will do far better to exploit the triple approach of:</p>
                                    <p>1. a short trailer audio/video leading to your full offering</p>
                                    <p>2. a call-to-action like a special offer or exclusive</p>
                                    <p>3. an overview or showreel of your work</p>
                                    <p>Remember, many fans may not be aware of the range of your work, and they may not even like what you are currently marketing, but they could absolutely love something else in your range.</p>
                                    <p>The same goes for newsfeeds, where we recommend a similar triple approach of:</p>
                                    <p>1. a teaser leading to your latest offering</p>
                                    <p>2. a call-to-action like a special offer or exclusive</p>
                                    <p>3. an overview about your work</p>
                                    <p>Thank you for using JEENI ARTIST MARKETING. May you be successful and add to the happiness of the species.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // WHAT IS JEENI ARTIST MARKETING? -->

                        <!-- WHAT IS THE JEENI PROMISE? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingTwelve">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                    WHAT IS THE JEENI PROMISE?
                                </button>
                            </h6>
                            <div id="collapseTwelve" class="accordion-collapse collapse" aria-labelledby="headingTwelve" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-red">NO SCAMS</p>
                                    <p>The music industry has been plagued by profiteers, charlatans and rip-off merchants. Jeeni is completely different. Our promise is to to treat our listening audience and our creative talent ethically, fairly, honestly and with respect.</p>
                                    <p class="text-red">NO ADVERTS</p>
                                    <p>On Jeeni your listening and viewing pleasure will never be ruined by jingles or adverts, you won’t be force-fed anything you don’t want to see or hear, and your choices will never be manipulated by outside influences and unwanted pressures.</p>
                                    <p class="text-red">NO FAKES</p>
                                    <p>Jeeni content is for original creative work, so no covers please. What you see is what you get. Our charts cannot be bought or influenced. They are based on individual positive votes, and they are truly democratic.</p>
                                    <p class="text-red">NO RIP-OFFS</p>
                                    <p>We do not insult our artists with false promises or pitiful royalty payments that add up to next to nothing. 100% of Jeeni artist merchandising profits go direct to our artists. If your work is used in productions because of Jeeni, that’s great, you keep 100% of everything due to you from soundtracks, jingles, titles, incidental music, whatever. And profits on streamed concerts and masterclasses are shared with our celebrity artists, mentors and Award Winners.</p>
                                    <p class="text-red">NO LOOKING AWAY</p>
                                    <p>Jeeni supports charitable projects, including Arms Around The Child, providing safe loving homes and support for orphaned children, vulnerable children and those at risk of exploitation.</p>
                                    <p class="text-red">NO HYPOCRISY</p>
                                    <p>We will not accept partnerships or funding from any organisation or individual who we know to be involved with armaments, harming the environment, political, religious or unethical organisations. We positively seek out corporate relationships with those who make a positive contribution to the wellbeing of people and the environment.</p>
                                    <p class="text-red">NO EXPLOITATION</p>
                                    <p>We pledge to use available funds to create local jobs, new opportunities and genuine resources. We will not exploit students, interns or volunteers, but treat them as valued members of Team Jeeni and reward them to the best of our ability.</p>
                                    <p class="text-red">NO TAX DODGING</p>
                                    <p>Unlike certain other entertainment platforms and content providers, we pledge to pay all our due taxes in full, because we choose to make a positive contribution to the health, welfare and education of the society in which we live.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // WHAT IS THE JEENI PROMISE? -->

                        <!-- HOW DOES VOTING WORK WITH THE JEENI CHARTS? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingThirteen">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                    HOW DOES VOTING WORK WITH THE JEENI CHARTS?
                                </button>
                            </h6>
                            <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-red">THE JEENI CHARTS</p>
                                    <p>Every Jeeni channel has its own set of popularity charts. First use the Select Channel service at the top of every page, and then display the chart that suits you best:</p>
                                    <p> @include('front.partials.tick-icon') <b>Latest</b> presents all the new contents of that channel, starting with the most recent upload.</p>
                                    <p> @include('front.partials.tick-icon') <b>Votes</b> presents the contents of that channel in order of popularity, starting with the most votes.</p>
                                    <p> @include('front.partials.tick-icon') <b>Archive</b> presents the historic contents of that channel, starting with the oldest upload.</p>
                                    <p> @include('front.partials.tick-icon') <b>Random</b> presents all the contents of that channel in completely random order, if you fancy taking a chance and being presented with some surprises.</p>
                                    <p class="text-red">HOW TO VOTE</p>
                                    <p>To boost a track up the charts, you have to be logged in as a Jeeni member. There’s only one vote per member per track.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // HOW DOES VOTING WORK WITH THE JEENI CHARTS? -->

                        <!-- DO VIEWS COUNT TOWARDS VOTES? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingFourteen">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                    DO VIEWS COUNT TOWARDS VOTES?
                                </button>
                            </h6>
                            <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>In a word, “No.” You have to be logged in as a Jeeni audience or artist member to vote.</p>
                                    <p>Anyone or any thing can view the contents of Jeeni, whether they’re a member or not, and the Jeeni system knows every time a track is viewed, on a mobile, a pad, a desktop, a smart TV, a console, or any other device. But views are not a very democratic way of judging the popularity of creative content, because views can be faked.</p>
                                    <p>We don’t take any notice of views from robots or click-farms or multiple identities from the same address, or any of the other hazards that some other services fall victim to. That’s why we stick to votes and not views.</p>
                                </div>
                            </div>
                        </div>
                        <!-- // DO VIEWS COUNT TOWARDS VOTES? -->

                        <!-- CAN I VOTE FOR MY OWN TRACK? -->
                        <div class="accordion-item mb-2 rounded-2 border">
                            <h6 class="accordion-header" id="headingFifteen">
                                <button class="accordion-button text-dark fw-bold bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                    CAN I VOTE FOR MY OWN TRACK?
                                </button>
                            </h6>
                            <div id="collapseFifteen" class="accordion-collapse collapse" aria-labelledby="headingFifteen" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="text-red">DEMOCRATIC VOTING</p>
                                    <p>Yes, of course you can vote for your own tracks, just like all politicians vote for themselves at elections. And they encourage all their supporters, friends and families to vote for them too.</p>
                                    <p class="text-red">ONE MEMBER ONE VOTE</p>
                                    <p>Remember, to vote for a track you have to be logged in as a Jeeni member, and there’s only one vote per member per track. </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // CAN I VOTE FOR MY OWN TRACK? -->
                    <!-- // FAQs Content -->
                </div>
                <!-- // Content after About Content Wrapper -->
            </div>
            <!-- // Content after the title -->
        </div>
    </main>
@endsection
