<div class="wrap">
    <!-- <div class="wrap m-0 -mt-[32px] -ml-[20px] -mb-[65px] px-5 py-10 "> -->

    <?php
    // $current_tab = isset($_GET['tab']) ? $_GET['tab'] : 'dashboard';
    // $tabs = ['Shortcode Usage' => 'shortcode-search'];
    $tabs = ['Contact Forms' => 'contact-forms', 'Shortcode Search' => 'shortcode-search', 'Universal Search' => 'universal-search'];
    // $tabs = ['Page Templates' => 'page-templates', 'Contact Forms' => 'contact-forms', 'Shortcode Search' => 'shortcode-search', 'Universal Search' => 'universal-search'];
    // $tabs = ['Page Templates' => 'page-templates', 'Contact Forms' => 'contact-forms', 'Shortcode Search' => 'shortcode-search'];
    // $tabs = ['Page Templates' => 'page-templates', 'Contact Forms' => 'contact-forms', 'Dashboard' => 'dashboard', 'Settings' => 'settings'];

    ?>

    <div class="container mx-auto mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <?php $first_content = 0; ?>
            <?php foreach ($tabs as $tab_title => $tab) : ?>
                <li class="me-2" role="presentation">
                    <button class="capitalize inline-block p-4 <?php echo $first_content === 0 ? 'text-blue-600 border-b-2 border-blue-600 active' : ''; ?> hover:text-gray-300" id="<?php echo $tab; ?>-tab" data-tabs-target="#<?php echo $tab; ?>" type="button" role="tab" aria-controls="<?php echo $tab; ?>" aria-selected="<?php echo $first_content === 0 ? 'true' : 'false' ?>">
                        <?php echo $tab_title; ?>
                    </button>
                </li>
                <?php $first_content = 1; ?>
            <?php endforeach; ?>

        </ul>
    </div>

    <!-- Write tabbed navigateed block -->
    <div id="default-tab-content" class="container mx-auto">

        <?php $first_content = 0; ?>

        <?php foreach ($tabs as $tab_title => $tab) : ?>
            <div class="<?php echo $first_content === 0 ? '' : 'hidden' ?> tab-content" id="<?php echo $tab; ?>" role="tabpanel" aria-labelledby="<?php echo $tab; ?>-tab">
                <?php require_once plugin_dir_path(__FILE__) . 'tab/' . $tab . '.php'; ?>
            </div>
            <?php $first_content = 1; ?>
        <?php endforeach; ?>

    </div>
    <!-- Write tabbed navigateed block -->

</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelector('#default-tab').addEventListener('click', (event) => {
            // Check if the clicked element is a button
            if (event.target.tagName === 'BUTTON') {
                let targetTabId = event.target.getAttribute('data-tabs-target');
                let targetTabPanel = document.querySelector(targetTabId);

                // Hide all tab panels
                Array.from(document.querySelectorAll('#default-tab-content div.tab-content')).forEach((tabPanel) => {
                    tabPanel.setAttribute('aria-hidden', 'true');
                    tabPanel.classList.add('hidden');
                });

                if (targetTabPanel) {
                    // Show targeted tab panel
                    targetTabPanel.setAttribute('aria-hidden', 'false');
                    targetTabPanel.classList.remove('hidden');
                }

                // Update aria-selected attribute for all tab buttons
                // Reset all buttons
                Array.from(event.currentTarget.querySelectorAll('button')).forEach((button) => {
                    button.setAttribute('aria-selected', 'false');
                    button.classList.remove('text-blue-600', 'border-b-2', 'border-blue-600', 'active');
                });

                // Set aria-selected to true for the clicked tab button
                event.target.setAttribute('aria-selected', 'true');
                event.target.classList.add('text-blue-600', 'border-b-2', 'border-blue-600', 'active');
            }
        });
    });
</script>
