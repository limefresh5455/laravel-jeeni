@extends('front.layouts.master')

@section('page_title') Privacy - Jeeni @endsection

@section('content')
    <main>
        <!-- Body content -->
        <div class="container-xl py-5 body-content">

            @include('front.layouts.sub-header', ['page_heading' => 'PRIVACY'])

            <!-- Content after the title -->
                <div class="row pb-3 pb-md-5">
                    <!-- Content Wrapper -->
                    <div class="d-block">
                        <!-- Privacy Content -->
                        <h6 class="fw-bold text-danger mt-4">1. Introduction</h6>
                        <p>Thank you for choosing Jeeni.</p>
                        <p>Jeeni is a streaming service for digital content, including dedicated channels of original entertainment on demand and exclusive showcases. Jeeni provides a direct service between new artists, their iconic heroes and a global audience.</p>
                        <p>Your privacy and the security of your personal data is very important to us. In this Privacy Policy we aim to be transparent and outline our policies regarding the collection, use and disclosure of your personal information when you use our services.</p>

                        <h6 class="fw-bold text-danger mt-4">2. About our Privacy Policy</h6>
                        <p>The purpose of this Policy is to:</p>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>Inform you about the collection and use of certain information regarding your relationship with Jeeni.</p>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>Help you understand what personal data we collect about you.</p>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>Explain how we use your data to provide the optimum experience for you when using Jeeni.</p>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>Ensure you understand your rights, and how we protect the data we collect about you.</p>

                        <h6 class="fw-bold text-danger mt-4">3. Basic information collection and use</h6>
                        <p>In order to provide a better, customised experience when you use Jeeni, we may require you to provide us with certain personal identifiers (personal identifiable information). This includes, but is not limited to, your Jeeni platform username or email address. This information will be used to identify you on our platform, allowing you to use its features fluidly. We also may use this information to contact you regarding Jeeni, including updates of the Jeeni platform or issues and updates regarding your account.</p>

                        <h6 class="fw-bold text-danger mt-4">4. Additional information we collect</h6>
                        <p>Here is a list of other information we may collect when you visit the Jeeni platform, or use our platform.</p>
                        <p class="fw-bold">Log data</p>
                        <p>We may collect information called Log Data when you visit and use our services. This is data your browser sends us, and may include information such as your computers Internet Protocol (IP) address, browser version, certain pages of our services that you visit, the time and date you visit our pages and use our services, the time you spend on these particular pages and other statistics about your lists and interaction with Jeeni services.</p>
                        <p class="fw-bold">Cookies</p>
                        <p>A cookie is a small file which is placed in your device’s memory. It contains a tiny amount of data, most commonly used as an anonymous unique identifier.</p>
                        <p>Our Service may use cookies to collect information about your visit, and help improve our service. If you agree to have cookies stored on your device, the data is used to help analyse our web traffic or to recognise and welcome you. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes, and it does this by gathering and remembering information about your preferences.</p>
                        <p>If you choose to refuse cookies in general, and our cookies in particular, you may not be able to use certain elements of our services, but hey, that’s your choice.</p>

                        <h6 class="fw-bold text-danger mt-4">5. Third-party service providers</h6>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>We retain the right to employ third-party providers at any time. This will be done for the following reasons:</p>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>To aid the facilitation and delivery of our services</p>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>To provide the services on our behalf</p>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>To perform functions related to our services</p>
                        <p class="m-1"><i class="bi bi-check2 me-2"></i>To assist us in analysing how our users use our services</p>
                        <p class="mt-4">
                            These third-party providers may have access to your personal information and data, that you have provided by using our services, in ways detailed within this Privacy Policy. This information is only shared to perform the tasks assigned to them on our behalf, and these providers are obliged not to store, use, share or disclose this information for any other purpose.
                        </p>

                        <h6 class="fw-bold text-danger mt-4">6. Security</h6>
                        <p>We value your trust in providing us with your personal information, during the use of our services. We continually strive to find the best possible ways to secure your data, and we use commercially acceptable means of protecting it. However, please remember that no method of transmission over the internet or method of electronic storage can be 100% secure and reliable, and absolute security can  never be guaranteed, but we promise to commit to do our best in securing and protecting this data.</p>

                        <h6 class="fw-bold text-danger mt-4">7. Links to external sites</h6>
                        <p>Our services may contain links to other sites not under control of Jeeni. If you click on a third-party link, you will be directed to that site, so we strongly advise you to review the Privacy Policy of these websites, as it may differ from ours in the collection and handling of your data. We have no control over, and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>

                        <h6 class="fw-bold text-danger mt-4">8. Child privacy and use</h6>
                        <p>Our services are not intended for unsupervised users under the age of 13, and we ask that all users declare themselves to be over this age or have supervision of a responsible adult. We do not knowingly collect personal identifiers (Personal identifiable information) from users under the age of 13. In the case that we discover a user under this age had provided us with personal data and information, we will immediately remove that user, and any information concerning that user, from our servers and platform. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we can take the necessary actions.</p>

                        <h6 class="fw-bold text-danger mt-4">9. Thank you</h6>
                        <p>Thank you for reading our Privacy Policy.</p>
                        <p>We will not use or share your information with anyone not currently listed in the cases and uses within this Privacy Policy. We may offer and develop new services in the future, which may change the way we collect and process your personal data and information.</p>
                        <p>Because we may update this Privacy Policy.for example when releasing new features or changes, we advise you to review this page from time to time. We will notify you of any changes by posting any new Privacy Policy on this page. These changes will be effective immediately after they are posted on this page.</p>
                        <!-- // Privacy Content -->
                    </div>
                    <!-- // Content Wrapper -->
                </div>
                <!-- // Content after the title -->
        </div>
        <!-- // Body content -->

    </main>
@endsection
