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