<div class="wrap m-0 -ml-[20px] -mb-[65px] px-5 pt-4 pb-10 min-h-screen h-max bg-gray-800 text-gray-400">

    <?php
    // $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';
    $tabs = ['page-templates', 'profile', 'dashboard', 'settings', 'contacts'];
    ?>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <?php foreach ($tabs as $key => $tab): ?>
                <li class="me-2" role="presentation">
                    <button
                        class="capitalize inline-block p-4 <?php echo $key === 0 ? 'text-blue-600 border-b-2 border-blue-600 active' : ''; ?> hover:text-gray-300"
                        id="<?php echo $tab; ?>-tab" data-tabs-target="#<?php echo $tab; ?>" type="button" role="tab"
                        aria-controls="<?php echo $tab; ?>" aria-selected="<?php echo $key == 0 ? 'true' : 'false' ?>">
                        <?php echo $tab; ?>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


    <!-- <div id="default-tab-content">
        <?php foreach ($tabs as $key => $tab): ?>
            <div class="<?php echo $key === 0 ? '' : 'hidden' ?> p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                id="<?php echo $tab ?>" role="tabpanel" aria-labelledby="<?php echo $tab ?>-tab">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    This is some placeholder content the
                    <strong class="font-medium text-gray-800 dark:text-white">
                        <span class="capitalize">
                            <?php echo $tab; ?>
                        </span>
                    </strong>
                    tab's associated content.
                    Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                    classes to control the content visibility and styling.
                </p>
            </div>
        <?php endforeach; ?>
    </div> -->


    <?php
    // $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';
    // $tabs = ['profile', 'dashboard', 'settings', 'contacts'];
    ?>

    <!-- <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <?php foreach ($tabs as $tab): ?>
                <?php $active_class = ($current_tab === $tab) ? 'text-blue-600 border-b-2 border-blue-600 active' : ''; ?>
                <li class="me-2">
                    <a href="?page=page-template-statistics&tab=<?php echo $tab ?>"
                        class="capitalize inline-block p-4 rounded-t-lg  hover:text-gray-600 hover:border-gray-300<?php echo ' ' . $active_class; ?>">
                        <?php echo $tab; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div> -->


    <!-- Write tabbed navigateed block -->
    <div id="default-tab-content">
        <div class="px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="page-templates" role="tabpanel"
            aria-labelledby="page-templates-tab">

            <div class="container mx-auto">
                <h3 class="text-xl font-bold pb-3 text-gray-300">Page Template Usage Report</h3>

                <div class="rounded-md border border-slate-400 p-4">
                    <h4 class="text-xl text-slate-500 mb-4">Page Template Usage Report</h4>
                    <ul class="list-none pl-5">
                        <li><a href="/template1" class="text-blue-300 hover:text-blue-500">Template 1</a></li>
                        <li><a href="/template2" class="text-blue-300 hover:text-blue-500">Template 2</a></li>
                        <!-- Add more templates as needed -->
                    </ul>

                    <div class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white container mx-auto px-4 py-4">
                        <ul class="list-disc pl-5">
                            <li><a href="https://block.biztechcs.local/partners-with-biztech/"
                                    class="hover:text-green-500 dark:hover:text-green-300">Partners</a></li>
                        </ul>
                        <p>views/ppc-page-template.blade.php: <strong>1</strong> pages are using this template:</p>
                        <ul class="list-disc pl-5">
                            <li><a href="https://block.biztechcs.local/odoo-development-premium/"
                                    class="hover:text-green-500 dark:hover:text-green-300">Odoo Development Premium</a>
                            </li>
                        </ul>
                        <p>views/template-about-us.blade.php: <strong>1</strong> pages are using this template:</p>
                        <ul class="list-disc pl-5">
                            <li><a href="https://block.biztechcs.local/about-us/"
                                    class="hover:text-green-500 dark:hover:text-green-300">About us</a></li>
                        </ul>
                        <p>views/template-blog-listing-page.blade.php: <strong>1</strong> pages are using this template:
                        </p>
                        <ul class="list-disc pl-5">
                            <li><a href="https://block.biztechcs.local/blog/"
                                    class="hover:text-green-500 dark:hover:text-green-300">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="container mx-auto px-4">
                    <ul class="list-disc pl-5">
                        <li><a href="https://block.biztechcs.local/partners-with-biztech/"
                                class="text-blue-500 hover:underline">Partners</a></li>
                    </ul>
                    <p class="text-green-500">views/ppc-page-template.blade.php: <strong>1</strong> pages are using this
                        template:</p>
                    <ul class="list-disc pl-5">
                        <li><a href="https://block.biztechcs.local/odoo-development-premium/"
                                class="text-blue-500 hover:underline">Odoo Development Premium</a></li>
                    </ul>
                    <p class="text-green-500">views/template-about-us.blade.php: <strong>1</strong> pages are using this
                        template:</p>
                    <ul class="list-disc pl-5">
                        <li><a href="https://block.biztechcs.local/about-us/"
                                class="text-blue-500 hover:underline">About us</a></li>
                    </ul>
                    <p class="text-green-500">views/template-blog-listing-page.blade.php: <strong>1</strong> pages are
                        using this template:</p>
                    <ul class="list-disc pl-5">
                        <li><a href="https://block.biztechcs.local/blog/" class="text-blue-500 hover:underline">Blog</a>
                        </li>
                    </ul>
                </div>

                <div class="container mx-auto px-4 py-4">
                    <p class="text-red-500">views/template-solution.blade.php: <strong>0</strong> pages are using this
                        template, you should be able to safely delete it from your theme.</p>

                    <p class="text-green-500">views/partner-page-template.blade.php: <strong>1</strong> pages are using
                        this template:</p>

                    <ul class="list-disc pl-5">
                        <li><a href="https://block.biztechcs.local/partners-with-biztech/"
                                class="text-green-500 hover:text-green-700">Partners</a></li>
                    </ul>
                    <p class="text-green-500">views/ppc-page-template.blade.php: <strong>1</strong> pages are using this
                        template:</p>
                    <ul class="list-disc pl-5">
                        <li><a href="https://block.biztechcs.local/odoo-development-premium/"
                                class="text-green-500 hover:text-green-700">Odoo Development Premium</a></li>
                    </ul>
                    <p class="text-green-500">views/template-about-us.blade.php: <strong>1</strong> pages are using this
                        template:</p>
                    <ul class="list-disc pl-5">
                        <li><a href="https://block.biztechcs.local/about-us/"
                                class="text-green-500 hover:text-green-700">About us</a></li>
                    </ul>
                    <p class="text-green-500">views/template-blog-listing-page.blade.php: <strong>1</strong> pages are
                        using this template:</p>
                    <ul class="list-disc pl-5">
                        <li><a href="https://block.biztechcs.local/blog/"
                                class="text-green-500 hover:text-green-700">Blog</a></li>
                    </ul>
                </div>
            </div>

            <p>This report will show you any pages in your WordPress site that are using one of your theme's custom
                templates.</p>
            <p style="color:red">views/casestudy-listing-page-template.blade.php: <strong>0</strong> pages are using
                this template,
                you should be able to safely delete it from your theme.</p>
            <p style="color:red">views/template-blog-listing.blade.php: <strong>0</strong> pages are using this
                template, you should
                be able to safely delete it from your theme.</p>
            <p style="color:red">views/template-casestudy-listing.blade.php: <strong>0</strong> pages are using this
                template, you
                should be able to safely delete it from your theme.</p>
            <p style="color:red">views/template-custom.blade.php: <strong>0</strong> pages are using this template, you
                should be
                able to safely delete it from your theme.</p>
            <p style="color:red">views/template-home-page.blade.php: <strong>0</strong> pages are using this template,
                you should be
                able to safely delete it from your theme.</p>
            <p style="color:red">views/template-solution.blade.php: <strong>0</strong> pages are using this template,
                you should be
                able to safely delete it from your theme.</p>
            <p style="color:red">views/template-testimonial.blade.php: <strong>0</strong> pages are using this template,
                you should
                be able to safely delete it from your theme.</p>
            <p style="color:green">views/partner-page-template.blade.php: <strong>1</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/partners-with-biztech/">Partners</a></li>
            </ul>
            <p style="color:green">views/ppc-page-template.blade.php: <strong>1</strong> pages are using this template:
            </p>
            <ul>
                <li><a href="https://block.biztechcs.local/odoo-development-premium/">Odoo Development Premium</a></li>
            </ul>
            <p style="color:green">views/template-about-us.blade.php: <strong>1</strong> pages are using this template:
            </p>
            <ul>
                <li><a href="https://block.biztechcs.local/about-us/">About us</a></li>
            </ul>
            <p style="color:green">views/template-blog-listing-page.blade.php: <strong>1</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/blog/">Blog</a></li>
            </ul>
            <p style="color:green">views/template-cms.blade.php: <strong>40</strong> pages are using this template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/help-desk-management-software/">Build Better Customer
                        Relationships with
                        the Best Help Desk Management Software</a></li>
                <li><a href="https://block.biztechcs.local/web-to-print-solutions/">Web to Print Solutions 101: To
                        Empower Your
                        Online Business</a></li>
                <li><a href="https://block.biztechcs.local/all-about-customer-portal-solutions/">Portal Solutions: A
                        Step Towards
                        Digital Transformation</a></li>
                <li><a href="https://block.biztechcs.local/how-to-customize-hubspot-website/">A Guide on How to
                        Customize HubSpot
                        Website</a></li>
                <li><a href="https://block.biztechcs.local/how-to-customize-wix-website/">How to Customize Wix Website:
                        A Complete
                        Guide</a></li>
                <li><a href="https://block.biztechcs.local/how-to-customize-squarespace-template/">How to Customize
                        Squarespace
                        Website</a></li>
                <li><a href="https://block.biztechcs.local/how-to-create-location-based-app/">How to Create a Location
                        based App - A
                        Complete Guide</a></li>
                <li><a href="https://block.biztechcs.local/how-to-build-event-planning-application/">How to Build Event
                        Planning
                        Application (A Complete Guide)</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=12837">How to Build Event Planning Application (A
                        Complete
                        Guide)</a></li>
                <li><a href="https://block.biztechcs.local/augmented-reality-interior-design-app/">When Augmented
                        Reality Meets
                        Interior Design: An Enriching Union for Your Business</a></li>
                <li><a href="https://block.biztechcs.local/marketing-augmented-reality/">Marketing with Augmented
                        Reality: A
                        Complete Guide</a></li>
                <li><a href="https://block.biztechcs.local/virtual-reality-in-sports-industry/">VR in Sports Industry:
                        An Extensive
                        Makeover</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=14362">Reshape Your Retail Game with Augmented
                        Reality
                        Shopping</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=14363">Reshape Your Retail Game with Augmented
                        Reality
                        Shopping</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=14365">Reshape Your Retail Game with Augmented
                        Reality
                        Shopping</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=14631">Reshape Your Retail Game with Augmented
                        Reality
                        Shopping</a></li>
                <li><a href="https://block.biztechcs.local/reshape-retail-game-augmented-reality-shopping/">Reshape Your
                        Retail Game
                        with Augmented Reality Shopping</a></li>
                <li><a href="https://block.biztechcs.local/complete-guide-build-diet-application/">A Complete Guide to
                        Build Diet
                        Application in 2021</a></li>
                <li><a href="https://block.biztechcs.local/how-to-build-a-wedding-planning-app/">Go Big With a Wedding
                        Planning
                        Business app: An Extensive Guide</a></li>
                <li><a href="https://block.biztechcs.local/vr-in-education/">How VR in Education is Changing the Way We
                        Learn and
                        Teach</a></li>
                <li><a href="https://block.biztechcs.local/how-to-make-vr-app/">How to Create a Virtual Reality App</a>
                </li>
                <li><a href="https://block.biztechcs.local/?page_id=15129">How to Build a Social Media App: A Complete
                        Guide</a>
                </li>
                <li><a href="https://block.biztechcs.local/?page_id=15130">How to Build a Social Media App: A Complete
                        Guide</a>
                </li>
                <li><a href="https://block.biztechcs.local/?page_id=15264">How to Build a Social Media App: A Complete
                        Guide</a>
                </li>
                <li><a href="https://block.biztechcs.local/how-to-build-social-media-app/">How to Build a Social Media
                        App: A
                        Complete Guide</a></li>
                <li><a href="https://block.biztechcs.local/augmented-reality-gps-app/">How to Build an Augmented Reality
                        GPS App</a>
                </li>
                <li><a href="https://block.biztechcs.local/how-to-make-a-fitness-app/">How to Make a Fitness App from
                        Scratch</a>
                </li>
                <li><a href="https://block.biztechcs.local/augmented-reality-in-education/">Augmented Reality in
                        Education</a></li>
                <li><a href="https://block.biztechcs.local/iot-for-smart-cities/">How IoT is Building Smart Cities- 6
                        Popular Use
                        Cases For A Smarter World</a></li>
                <li><a href="https://block.biztechcs.local/on-demand-delivery-app/">On-Demand Delivery</a></li>
                <li><a href="https://block.biztechcs.local/start-ecommerce-business/">How to Start an eCommerce
                        Business</a></li>
                <li><a href="https://block.biztechcs.local/asset-management-using-iot/">IoT Asset Management</a></li>
                <li><a href="https://block.biztechcs.local/e-learning-solutions/">Education Mobile App Development: The
                        Complete
                        Guide</a></li>
                <li><a href="https://block.biztechcs.local/online-booking-app/">[Free Guide] Getting Started with Online
                        Booking
                        App</a></li>
                <li><a href="https://block.biztechcs.local/thank-you/">Thank you</a></li>
                <li><a href="https://block.biztechcs.local/thank-you-2/">Thank you</a></li>
                <li><a href="https://block.biztechcs.local/terms-of-use/">Terms of Use</a></li>
                <li><a href="https://block.biztechcs.local/section-79-compliance/">Intermediary Compliance</a></li>
                <li><a href="https://block.biztechcs.local/disclaimer/">Disclaimer</a></li>
                <li><a href="https://block.biztechcs.local/privacy-policy/">Privacy Policy</a></li>
            </ul>
            <p style="color:green">views/template-hire-developer.blade.php: <strong>2</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/digital-product-engineering/">Digital Product Engineering</a>
                </li>
                <li><a href="https://block.biztechcs.local/hire-dedicated-developers/">Hire Dedicated Developers</a>
                </li>
            </ul>
            <p style="color:green">views/template-homepage.blade.php: <strong>1</strong> pages are using this template:
            </p>
            <ul>
                <li><a href="https://block.biztechcs.local/">Home</a></li>
            </ul>
            <p style="color:green">views/template-industry-page.blade.php: <strong>9</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/human-resource-management/">Human Resource</a></li>
                <li><a href="https://block.biztechcs.local/travel-hospitality/">Travel &amp; Hospitality</a></li>
                <li><a href="https://block.biztechcs.local/real-estate/">Real Estate</a></li>
                <li><a href="https://block.biztechcs.local/media-entertainment/">Media &amp; Entertainment</a></li>
                <li><a href="https://block.biztechcs.local/education/">Education</a></li>
                <li><a href="https://block.biztechcs.local/retail/">Retail</a></li>
                <li><a href="https://block.biztechcs.local/finance-insurance/">Finance &amp; Insurance</a></li>
                <li><a href="https://block.biztechcs.local/healthcare/">Healthcare</a></li>
                <li><a href="https://block.biztechcs.local/manufacturing/">Manufacturing</a></li>
            </ul>
            <p style="color:green">views/template-life-at-biztech.blade.php: <strong>1</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/life-biztech/">Life At Biztech</a></li>
            </ul>
            <p style="color:green">views/template-marketing-service-page.blade.php: <strong>1</strong> pages are using
                this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/ecommerce-solutions/">Ecommerce Development</a></li>
            </ul>
            <p style="color:green">views/template-odoo-experience.blade.php: <strong>1</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/media/events/odoo-experience-2023/">Odoo experience</a></li>
            </ul>
            <p style="color:green">views/template-portfolio-listing.blade.php: <strong>1</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/portfolio/">Portfolio</a></li>
            </ul>
            <p style="color:green">views/template-product-page.blade.php: <strong>1</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/dynamics-365-products/">Dynamics 365 Products</a></li>
            </ul>
            <p style="color:green">views/template-salesforce-development.blade.php: <strong>17</strong> pages are using
                this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/salesforce-migration-services/">Salesforce Migration
                        Services</a></li>
                <li><a href="https://block.biztechcs.local/woocommerce-development-services/">WooCommerce Development
                        Services</a>
                </li>
                <li><a href="https://block.biztechcs.local/magento-development-services/">Magento Development
                        Services</a></li>
                <li><a href="https://block.biztechcs.local/custom-lms-development/">Custom LMS Development Services</a>
                </li>
                <li><a href="https://block.biztechcs.local/shopify-app-development/">Shopify App Development Company</a>
                </li>
                <li><a href="https://block.biztechcs.local/salesforce-support-maintenance-service/">Salesforce Support
                        and
                        Maintenance Services</a></li>
                <li><a href="https://block.biztechcs.local/ar-app-development/">Hire Augmented Reality Developers</a>
                </li>
                <li><a href="https://block.biztechcs.local/php-development/">PHP Web Development Services</a></li>
                <li><a href="https://block.biztechcs.local/cms-development/">Bespoke CMS Development Services</a></li>
                <li><a href="https://block.biztechcs.local/salesforce-development-services/">Salesforce Development
                        Services</a>
                </li>
                <li><a href="https://block.biztechcs.local/salesforce-integration-services/">Salesforce Integration
                        Services</a>
                </li>
                <li><a href="https://block.biztechcs.local/salesforce-app-development-services/">Salesforce Application
                        Development
                        Services</a></li>
                <li><a href="https://block.biztechcs.local/salesforce-customization-services/">Salesforce Customization
                        Services</a>
                </li>
                <li><a href="https://block.biztechcs.local/shopify-development/">Shopify Development Services</a></li>
                <li><a href="https://block.biztechcs.local/odoo-development/">Odoo Development Company</a></li>
                <li><a href="https://block.biztechcs.local/enterprise-application-development/">Enterprise Application
                        Development</a></li>
                <li><a href="https://block.biztechcs.local/dynamics-365-development/">Microsoft Dynamics 365 Development
                        Services</a></li>
            </ul>
            <p style="color:green">views/template-salesforce-page.blade.php: <strong>30</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/hire-shopify-developer/">Hire Dedicated Shopify
                        Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-full-stack-developers/">Hire Full Stack Developers</a>
                </li>
                <li><a href="https://block.biztechcs.local/hire-mean-stack-developers/">Mean Stack Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-flutter-developer-2/">Hire Flutter Developer 2</a></li>
                <li><a href="https://block.biztechcs.local/hire-opencart-developer/">Hire Professional OpenCart
                        Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-wordpress-developer/">Hire WordPress Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-django-developer/">Hire Django Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-fabricjs-developer/">Hire FabricJS Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-drupal-developer/">Hire Drupal Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-react-native-developer/">Hire Dedicated React Native
                        Developer</a>
                </li>
                <li><a href="https://block.biztechcs.local/hire-nodejs-developer/">Hire NodeJS Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-flutter-developer/">Hire Flutter Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-reactjs-developer/">Hire ReactJS Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-vuejs-developer/">Vue.JS Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-laravel-developer/">Hire Laravel Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-salesforce-developers/">Salesforce</a></li>
                <li><a href="https://block.biztechcs.local/flutter-upgrade-services/">Flutter Upgrade Services</a></li>
                <li><a href="https://block.biztechcs.local/hire-angularjs-developer/">Hire AngularJS Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-odoo-developers/">Hire Odoo Developers</a></li>
                <li><a href="https://block.biztechcs.local/hire-ios-developer/">Hire Ios App Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-python-developer/">Hire Python Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-kotlin-developer/">Hire Kotlin Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-swift-developer/">Hire Swift Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-asp-net-developer/">Hire Asp .NET Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-magento-2-developer/">Hire Magento 2 Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-android-developer/">Hire Android Developer</a></li>
                <li><a href="https://block.biztechcs.local/hire-dot-net-core-developer/">Hire .NET core developer</a>
                </li>
                <li><a href="https://block.biztechcs.local/hire-ionic-developer/">Hire ionic Developer</a></li>
                <li><a href="https://block.biztechcs.local/salesforce-implementation-services/">Salesforce
                        Implementation
                        Services</a></li>
                <li><a href="https://block.biztechcs.local/salesforce-consulting-services/">Salesforce Consulting
                        Services</a></li>
            </ul>
            <p style="color:green">views/template-service-page.blade.php: <strong>13</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/ai-ml-development/">AI/ML Development</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=514">Frontend Development</a></li>
                <li><a href="https://block.biztechcs.local/enterprise-mobile-app-development/">Enterprise Mobile App
                        Development</a>
                </li>
                <li><a href="https://block.biztechcs.local/?page_id=518">Branding Services</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=519">API Integration &amp; Development Services</a>
                </li>
                <li><a href="https://block.biztechcs.local/marketing-strategy-consultants/">Dedicated Marketing &amp;
                        Strategy
                        Consultants</a></li>
                <li><a href="https://block.biztechcs.local/dedicated-development-team/">Dedicated Development Team</a>
                </li>
                <li><a href="https://block.biztechcs.local/quality-engineering/">Quality Engineering Services</a></li>
                <li><a href="https://block.biztechcs.local/dummy-service-page/">Dummy service page</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=8063">UI/UX Development</a></li>
                <li><a href="https://block.biztechcs.local/devops-services/">DevOps</a></li>
                <li><a href="https://block.biztechcs.local/cloud-applications-services/">Cloud Application</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=12986">Dedicated Marketing &amp; Strategy
                        Consultants</a></li>
            </ul>
            <p style="color:green">views/template-services-development.blade.php: <strong>5</strong> pages are using
                this template:
            </p>
            <ul>
                <li><a href="https://block.biztechcs.local/?page_id=17506">Mobile Application Development Services</a>
                </li>
                <li><a href="https://block.biztechcs.local/ecommerce-development-services/">Ecommerce Development
                        services</a></li>
                <li><a href="https://block.biztechcs.local/software-product-engineering/">Product Engineering</a></li>
                <li><a href="https://block.biztechcs.local/erp-services/">Custom ERP Services at Your Disposal</a></li>
                <li><a href="https://block.biztechcs.local/crm-services/">CRM Services</a></li>
            </ul>
            <p style="color:green">views/template-shopify-page.blade.php: <strong>1</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/?page_id=9802">Custom Module Development</a></li>
            </ul>
            <p style="color:green">views/template-solutions.blade.php: <strong>1</strong> pages are using this template:
            </p>
            <ul>
                <li><a href="https://block.biztechcs.local/solutions/">Solutions</a></li>
            </ul>
            <p style="color:green">views/template-technology-page.blade.php: <strong>5</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/aws-managed-service-provider/">AWS Services</a></li>
                <li><a href="https://block.biztechcs.local/ppc-services/">PPC Services</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=12979">PPC Services</a></li>
                <li><a href="https://block.biztechcs.local/?page_id=12981">PPC Services</a></li>
                <li><a href="https://block.biztechcs.local/ecommerce-mobile-app-development/">eCommerce App Development
                        Services</a>
                </li>
            </ul>
            <p style="color:green">views/template-testimonials-listing.blade.php: <strong>1</strong> pages are using
                this template:
            </p>
            <ul>
                <li><a href="https://block.biztechcs.local/testimonials/">Testimonials</a></li>
            </ul>
            <p style="color:green">views/template-ventures-page.blade.php: <strong>1</strong> pages are using this
                template:</p>
            <ul>
                <li><a href="https://block.biztechcs.local/our-ventures/">Ventures</a></li>
            </ul>

            <!-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p> -->
        </div>
        <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>

            <form class="text-lg text-gray-500 p-2" hx-post="<?php echo admin_url('admin-ajax.php'); ?>"
                hx-vals='{"action": "my_custom_action"}' hx-trigger="submit" hx-target="#output">
                <!-- form fields go here -->
                <input class="rounded-t-lg border-gray-300" type="submit" value="Submit">
            </form>
            <div id="output"></div>
        </div>
        <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">

            <div class="container mx-auto px-4">
                <h4 class="text-xl text-slate-500 font-bold mb-4">Template Names</h4>
                <ul class="list-disc pl-5">
                    <li><a href="/template1" class="text-blue-300 hover:text-blue-500">Template 1</a></li>
                    <li><a href="/template2" class="text-blue-300 hover:text-blue-500">Template 2</a></li>
                    <!-- Add more templates as needed -->
                </ul>
            </div>
            <!-- <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p> -->
        </div>
        <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
            aria-labelledby="settings-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
            aria-labelledby="contacts-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
    </div>
    <!-- Write tabbed navigateed block -->

    <!-- <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <?php
            foreach ($tabs as $tab):
                $active_class = ($current_tab === $tab) ? 'text-blue-600 border-b-2 border-blue-600 active' : '';
                ?>
                <li class="me-2">
                    <a href="?page=page-template-statistics&tab=<?php echo $tab ?>"
                        class="capitalize inline-block p-4 rounded-t-lg  hover:text-gray-600 hover:border-gray-300<?php echo ' ' . $active_class; ?>">
                        <?php echo $tab; ?>
                    </a>
                </li>
                <?php
            endforeach;
            ?>
        </ul>
    </div> -->



</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Get all tab buttons
        let tabButtons = Array.from(document.querySelectorAll('#default-tab button'));

        // Add click event listener to each tab button
        tabButtons.forEach((tabButton) => {
            tabButton.addEventListener('click', (event) => {
                let targetTabId = event.currentTarget.getAttribute('data-tabs-target');
                let targetTabPanel = document.querySelector(targetTabId);

                // Hide all tab panels
                let tabPanels = Array.from(document.querySelectorAll('#default-tab-content div'));
                tabPanels.forEach((tabPanel) => {
                    tabPanel.setAttribute('aria-hidden', 'true');
                    tabPanel.classList.add('hidden');
                });

                if (targetTabPanel) {
                    // Show targeted tab panel
                    targetTabPanel.setAttribute('aria-hidden', 'false');
                    targetTabPanel.classList.remove('hidden');

                    // Function to recursively remove 'hidden' class from child elements
                    const removeHiddenClassFromChildren = (element) => {
                        element.classList.remove('hidden');
                        for (let i = 0; i < element.children.length; i++) {
                            removeHiddenClassFromChildren(element.children[i]);
                        }
                    };

                    // Call the function on the target tab panel
                    removeHiddenClassFromChildren(targetTabPanel);
                }

                // Update aria-selected attribute for all tab buttons
                tabButtons.forEach((button) => {
                    button.setAttribute('aria-selected', 'false');
                    button.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600', 'active');
                });

                // Set aria-selected to true for the clicked tab button
                event.currentTarget.setAttribute('aria-selected', 'true');
                event.currentTarget.classList.add('text-blue-600', 'border-b-2', 'border-blue-600', 'active');

            });
        });
    });

</script>