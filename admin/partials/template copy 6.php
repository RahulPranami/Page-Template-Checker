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


                <!-- Loop Start -->
                <div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
                    <div class="flex justify-between container mx-auto p-2 mb-2 items-center">
                        <h4 class="float-left text-xl text-slate-300">
                            views/ppc-page-template.blade.php
                        </h4>
                        <p class="float-right text-green-500">
                            <strong class="px-2">
                                ( <span class="px-2"> 1 </span> )
                            </strong>
                            pages are using this template
                        </p>
                    </div>
                    <ul class="list-none pl-5">
                        <li><a href="/template1" class="text-base text-blue-300 hover:text-blue-500">Template 1</a></li>
                        <li><a href="/template2" class="text-base text-blue-300 hover:text-blue-500">Template 2</a></li>
                        <!-- Add more templates as needed -->
                    </ul>
                </div>

                <div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
                    <div class="flex justify-between container mx-auto p-2">
                        <h4 class="float-left text-xl text-slate-300 mb-2">views/ppc-page-template.blade.php</h4>
                        <p class="float-right text-green-500">
                            <strong class="px-2">
                                ( <span class="px-2"> 1 </span> )
                            </strong>
                            pages are using this template
                        </p>
                    </div>
                    <ul class="list-none pl-5 text-base text-blue-300">
                        <li><a href="/template1" class="hover:text-blue-500">Template 1</a></li>
                        <li><a href="/template2" class="hover:text-blue-500">Template 2</a></li>
                        <!-- Add more templates as needed -->
                    </ul>
                </div>

                <div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
                    <div class="flex justify-between container mx-auto p-2">
                        <h4 class="float-left text-xl text-slate-300 mb-2">views/ppc-page-template.blade.php</h4>
                        <p class="float-right text-green-500">
                            <strong class="px-2">
                                ( <span class="px-2"> 1 </span> )
                            </strong>
                            pages are using this template
                        </p>
                    </div>
                    <div class="pl-5 text-base text-red-400">
                        There Are No Pages Using This Template, you should be able to safely delete it from your theme.
                    </div>
                </div>
                <!-- Loop End -->


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

                        // // Function to recursively remove 'hidden' class from child elements
                        // const removeHiddenClassFromChildren = (element) => {
                        //     element.classList.remove('hidden');
                        //     for (let i = 0; i < element.children.length; i++) {
                        //         removeHiddenClassFromChildren(element.children[i]);
                        //     }
                        // };

                        // // Call the function on the target tab panel
                        // removeHiddenClassFromChildren(targetTabPanel);
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