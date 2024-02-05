<h3 class="text-xl font-bold pb-3 text-gray-300">Contact Forms Usage Report</h3>

<?php
global $wpdb;

// wpcf7_contact_form

$query_to_retrieve_contact_form_acf_fields = "SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}posts p JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id WHERE pm.meta_key LIKE '_%' AND pm.meta_value LIKE '%[contact-form-7%' AND p.post_status <> 'inherit';";

$query_to_retrieve_contact_form_pages = "SELECT ID, post_title, post_content FROM {$wpdb->prefix}posts WHERE post_content LIKE '%[contact-form-7%' AND post_status <> 'inherit';";

$result_from_pages = $wpdb->get_results($query_to_retrieve_contact_form_pages);
$result_from_pages_in_acf = $wpdb->get_results($query_to_retrieve_contact_form_acf_fields);

?>

<div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
    <div class="flex justify-between container mx-auto p-2 mb-2 items-center">
        <h4 class="text-xl text-slate-300">
            Pages that Have Contact Form In the Content
        </h4>
    </div>

    <ul class="list-none pl-5">
        <?php foreach ($result_from_pages as $page): ?>
            <li>
                <a href="<?php echo get_permalink($page->ID, false); ?>"
                    class="text-base text-blue-300 hover:text-blue-500">
                    <?php echo $page->post_title; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


<div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
    <div class="flex justify-between container mx-auto p-2 mb-2 items-center">
        <h4 class="text-xl text-slate-300">
            Pages that Have Contact Form In the ACF Field
        </h4>
    </div>

    <ul class="list-none pl-5">
        <?php foreach ($result_from_pages_in_acf as $page): ?>
            <li>
                <a href="<?php echo get_permalink($page->ID, false); ?>"
                    class="text-base text-blue-300 hover:text-blue-500">
                    <?php echo $page->post_title; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>