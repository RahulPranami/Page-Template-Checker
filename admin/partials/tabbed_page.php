<!-- Create a tailwindcss tabbed content switcher -->
<div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px">
        <?php
        foreach ($tabs as $tab) :
            $active_class = ($current_tab === $tab) ? 'text-blue-600 border-b-2 border-blue-600 active' : '';
        ?>
            <li class="me-2">
                <a href="?page=page-template-statistics&tab=<?php echo $tab ?>" class="capitalize inline-block p-4 rounded-t-lg  hover:text-gray-600 hover:border-gray-300<?php echo ' ' . $active_class; ?>">
                    <?php echo $tab; ?>
                </a>
            </li>
        <?php
        endforeach;
        ?>
    </ul>
</div>
<!-- End tabbed navigateed block -->
