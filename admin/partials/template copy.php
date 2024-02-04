<div class="wrap px-5 pt-4 pb-6 h-max bg-gray-800 text-gray-400"
    style="margin: 0; margin-left: -20px; margin-bottom: -65px">



    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <!-- Tab buttons -->
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
            </li>
            <!-- Add more tabs here -->
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="dashboard-tab" data-tabs-target="#dashboard"
                    type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
            </li>
        </ul>
    </div>
    <!-- Tab contents -->
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content for the Profile tab.
            </p>
        </div>
        <!-- Add more tab contents here -->
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content for the Dashboard tab.
            </p>
        </div>
    </div>

    <?php
    $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';

    // dark:text-blue-500 dark:border-blue-500

    $tabs = ['profile', 'dashboard', 'settings', 'contacts'];

    ?>

    <div
        class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px">
            <?php
            foreach ($tabs as $tab) {

                if (in_array($tab, $tabs)) {
                    $active_class = 'text-blue-600 border-b-2 border-blue-600 active';
                } else {
                    $active_class = '';
                }
                ?>
                <li class="me-2">
                    <a href="?page=page-template-statistics&tab=dashboard"
                        class="inline-block p-4 rounded-t-lg  hover:text-gray-600 hover:border-gray-300<?php echo $tab === 'dashboard' ? ' ' . $active_class : ''; ?>"
                        aria-current="page">Dashboard</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>

    <div
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
    </div>

    <?php
    //  require_once plugin_dir_path(__FILE__) . 'partials/' . $tab . '.php';
    require_once plugin_dir_path(__FILE__) . 'page.php';
    ?>

    <!-- Write tabbed navigateed block -->

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
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
    </div>
    <!-- Write tabbed navigateed block -->

</div>