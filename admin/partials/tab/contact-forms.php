<h3 class="text-xl font-bold pb-3 text-gray-300">Contact Forms Usage Report</h3>

<?php
global $wpdb;


$contact_forms = new WP_Query([
    'post_type' => 'wpcf7_contact_form',
    'posts_per_page' => -1,
]);


$query_to_retrieve_contact_form_acf_fields = "SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}posts p JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id WHERE pm.meta_key LIKE '_%' AND pm.meta_value LIKE '%[contact-form-7%' AND p.post_status <> 'inherit';";

$query_to_retrieve_contact_form_pages = "SELECT ID, post_title, post_content FROM {$wpdb->prefix}posts WHERE post_content LIKE '%[contact-form-7%' AND post_status <> 'inherit';";

$result_from_pages = $wpdb->get_results($query_to_retrieve_contact_form_pages);
$result_from_pages_in_acf = $wpdb->get_results($query_to_retrieve_contact_form_acf_fields);

$result_from_pages_length = count($result_from_pages);
$result_from_pages_in_acf_length = count($result_from_pages_in_acf);


if ($contact_forms->posts):
    ?>
    <?php foreach ($contact_forms->posts as $contact_form): ?>
        <div class="rounded-md border border-slate-400 p-2 my-2 pb-4">

            <?php

            $query_to_retrieve_contact_form_acf_fields = "SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}posts p JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id WHERE pm.meta_key LIKE '_%' AND pm.meta_value LIKE '%[contact-form-7 id=\"" . $contact_form->ID . "\"%' AND p.post_status <> 'inherit';";

            $query_to_retrieve_contact_form_pages = "SELECT ID, post_title, post_content FROM {$wpdb->prefix}posts WHERE post_content LIKE '%[contact-form-7 id=\"" . $contact_form->ID . "\"%' AND post_status <> 'inherit';";

            $result_from_pages = $wpdb->get_results($query_to_retrieve_contact_form_pages);
            $result_from_pages_in_acf = $wpdb->get_results($query_to_retrieve_contact_form_acf_fields);

            $result_from_pages_length = count($result_from_pages);
            $result_from_pages_in_acf_length = count($result_from_pages_in_acf);

            ?>

            <?php if ($result_from_pages_length > 0): ?>
                <div class="flex justify-between container mx-auto p-2 mb-2 items-center">
                    <h4 class="float-left text-xl text-slate-300">
                        Pages that Have Contact Form (
                        <?php echo $contact_form->post_title; ?> ) In the Content
                    </h4>
                    <p class="float-right text-green-500">
                        <strong class="px-2">
                            ( <span class="px-2">
                                <?php echo $result_from_pages_length; ?>
                            </span> )
                        </strong>
                        pages are using this Contact Form
                    </p>
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
            <?php endif; ?>

            <?php if ($result_from_pages_in_acf_length > 0): ?>

                <div class="flex justify-between container mx-auto p-2 mb-2 items-center">
                    <h4 class="float-left text-xl text-slate-300">
                        Pages that Have Contact Form (
                        <?php echo $contact_form->post_title; ?> ) In the Content
                    </h4>
                    <p class="float-right text-green-500">
                        <strong class="px-2">
                            ( <span class="px-2">
                                <?php echo $result_from_pages_in_acf_length; ?>
                            </span> )
                        </strong>
                        pages are using this Contact Form
                    </p>
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
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="rounded-md border border-slate-400 p-2 my-2 pb-4">
    <div class="flex justify-between container mx-auto p-2 mb-2 items-center">
        <h4 class="float-left text-xl text-slate-300">
            Pages that Have Contact Form In the Content
        </h4>
        <p class="float-right text-green-500">
            <strong class="px-2">
                ( <span class="px-2">
                    <?php echo $result_from_pages_length; ?>
                </span> )
            </strong>
            pages are using this Contact Form
        </p>
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
        <h4 class="float-left text-xl text-slate-300">
            Pages that Have Contact Form In the ACF Field
        </h4>
        <p class="float-right text-green-500">
            <strong class="px-2">
                ( <span class="px-2">
                    <?php echo $result_from_pages_in_acf_length; ?>
                </span> )
            </strong>
            pages are using this Contact Form
        </p>
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
