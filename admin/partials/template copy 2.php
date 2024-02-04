<div class="wrap px-5 pt-4 pb-6 min-h-screen h-max bg-gray-800 text-gray-400"
    style="margin: 0; margin-left: -20px; margin-bottom: -65px">

    <?php
    $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';
    $tabs = ['profile', 'dashboard', 'settings', 'contacts'];
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

            <!-- <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Dashboard</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                    aria-selected="false">Settings</button>
            </li>
            <li role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                    aria-selected="false">Contacts</button>
            </li> -->
        </ul>
    </div>




    <!-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Dashboard</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                    aria-selected="false">Settings</button>
            </li>
            <li role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                    aria-selected="false">Contacts</button>
            </li>
        </ul>
    </div> -->


    <!-- <ul class="flex flex-wrap border-b border-gray-200 dark:border-gray-700">
        <li class="mr-2">
            <a href="#" aria-current="page"
                class="inline-block bg-gray-100 text-blue-600 rounded-t-lg py-4 px-4 text-sm font-medium text-center active dark:bg-gray-800 dark:text-blue-500">Profile</a>
        </li>
        <li class="mr-2">
            <a href="#"
                class="inline-block text-gray-500 hover:text-gray-600 hover:bg-gray-50 rounded-t-lg py-4 px-4 text-sm font-medium text-center dark:text-gray-400  dark:hover:bg-gray-800 dark:hover:text-gray-300">Dashboard</a>
        </li>
    </ul> -->


    <?php
    $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';
    $tabs = ['profile', 'dashboard', 'settings', 'contacts'];
    ?>

    <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <?php
            foreach ($tabs as $tab):
                // $active_class = ($current_tab === $tab) ? 'text-blue-600 border-b-2 border-blue-600 active' : '';
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
    </div>


    <div id="default-tab-content">
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
            aria-labelledby="settings-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
            aria-labelledby="contacts-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                classes to control the content visibility and styling.</p>
        </div>
    </div>

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




    <!-- <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
                <a href="?page=page-template-statistics&tab=profile"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300<?php echo $tab === 'profile' ? ' ' . $active_class : ''; ?>">Profile</a>
            </li>
            <li class="me-2">
                <a href="?page=page-template-statistics&tab=dashboard"
                    class="inline-block p-4 rounded-t-lg  hover:text-gray-600 hover:border-gray-300<?php echo $tab === 'dashboard' ? ' ' . $active_class : ''; ?>"
                    aria-current="page">Dashboard</a>
            </li>
            <li class="me-2">
                <a href="?page=page-template-statistics&tab=settings"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300<?php echo $tab === 'settings' ? ' ' . $active_class : ''; ?>">Settings</a>
            </li>
            <li class="me-2">
                <a href="?page=page-template-statistics&tab=contacts"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:border-gray-300<?php echo $tab === 'contacts' ? ' ' . $active_class : ''; ?>">Contacts</a>
            </li>
        </ul>
    </div> -->

    <!-- Write tabbed navigateed block -->

    <!-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Dashboard</button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings"
                    aria-selected="false">Settings</button>
            </li>
            <li role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                    id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts"
                    aria-selected="false">Contacts</button>
            </li>
        </ul>
    </div>
    <div id="default-tab-content">
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                control
                the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                control
                the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
            aria-labelledby="settings-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                control
                the content visibility and styling.</p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
            aria-labelledby="contacts-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                    class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                Clicking
                another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                control
                the content visibility and styling.</p>
        </div>
    </div> -->
    <!-- Write tabbed navigateed block -->

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

                // Show targeted tab panel
                targetTabPanel.setAttribute('aria-hidden', 'false');
                targetTabPanel.classList.remove('hidden');

                // Update aria-selected attribute for all tab buttons
                tabButtons.forEach((button) => {
                    button.setAttribute('aria-selected', 'false');
                    button.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600', 'active');
                });

                // Set aria-selected to true for the clicked tab button
                event.currentTarget.setAttribute('aria-selected', 'true');
                event.currentTarget.classList.add('text-blue-600', 'border-b-2', 'border-blue-600', 'active');
                // event.currentTarget.classList.add('text-blue-600');
                // event.currentTarget.classList.add('border-b-2');
                // event.currentTarget.classList.add('border-blue-600');
                // event.currentTarget.classList.add('active');

            });
        });
    });

</script>