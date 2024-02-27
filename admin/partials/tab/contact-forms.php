<h3 class="text-xl font-bold pb-3 text-gray-300">Contact Forms Usage Report</h3>

<?php
global $wpdb;


$contact_forms = new WP_Query([
    'post_type' => 'wpcf7_contact_form',
    'posts_per_page' => -1,
]);


// $query_to_retrieve_contact_form_acf_fields = "SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}posts p JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id WHERE pm.meta_key LIKE '_%' AND pm.meta_value LIKE '%[contact-form-7%' AND p.post_status <> 'inherit';";

// $query_to_retrieve_contact_form_pages = "SELECT ID, post_title, post_content FROM {$wpdb->prefix}posts WHERE post_content LIKE '%[contact-form-7%' AND post_status <> 'inherit';";

// $result_from_pages = $wpdb->get_results($query_to_retrieve_contact_form_pages);
// $result_from_pages_in_acf = $wpdb->get_results($query_to_retrieve_contact_form_acf_fields);

// $result_from_pages_length = count($result_from_pages);
// $result_from_pages_in_acf_length = count($result_from_pages_in_acf);


if ($contact_forms->posts) {
    foreach ($contact_forms->posts as $contact_form) {

        // while ($contact_forms->have_posts()) {
        //     $contact_form = $contact_forms->the_post();
        // echo '<pre>';
        // print_r($contact_form->ID);
        // print_r($contact_form->post_title);
        // print_r($contact_form);
        // echo '</pre>';
        // }

        // $form_id = '30'; // Replace '1234' with your form ID
        // $posts_query = new WP_Query([
        //     'post_type' => ['post', 'page'],
        //     's' => '[contact-form-7 id="' . $contact_form->ID . '"]',
        //     'posts_per_page' => -1,
        // ]);


        $query_to_retrieve_contact_form_acf_fields = "SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}posts p JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id WHERE pm.meta_key LIKE '_%' AND pm.meta_value LIKE '%[contact-form-7% id=\"" . $contact_form->ID . "\"' AND p.post_status <> 'inherit';";

        $query_to_retrieve_contact_form_pages = "SELECT ID, post_title, post_content FROM {$wpdb->prefix}posts WHERE post_content LIKE '%[contact-form-7 id=\"" . $contact_form->ID . "\"%' AND post_status <> 'inherit';";

        $result_from_pages = $wpdb->get_results($query_to_retrieve_contact_form_pages);
        $result_from_pages_in_acf = $wpdb->get_results($query_to_retrieve_contact_form_acf_fields);

        $result_from_pages_length = count($result_from_pages);
        $result_from_pages_in_acf_length = count($result_from_pages_in_acf);

        error_log("55 : " . print_r($query_to_retrieve_contact_form_acf_fields, true));
        error_log("55 : " . print_r($query_to_retrieve_contact_form_pages, true));


        error_log("55 : " . print_r($result_from_pages, true));
        error_log("56 : " . print_r($result_from_pages_in_acf, true));


        if ($result_from_pages_length > 0):
            echo "Pages and posts where the form " . $contact_form->post_title . " is used:<br>";
            // Process the results
            foreach ($result_from_pages as $result) {
                // Your processing code here
                // echo "Post ID: {$result->ID}, Title: {$result->post_title}, Meta Key: {$result->meta_key}, Meta Value: {$result->meta_value}<br>";

                echo '<a href="' . get_permalink($result->ID) . '">' . get_the_title($result->ID) . '</a><br>';
            }
        endif;

        if ($result_from_pages_in_acf_length > 0):
            echo "Pages and posts where the form " . $contact_form->post_title . " is used in acf field:<br>";

            foreach ($result_from_pages_in_acf as $result) {
                // Your processing code here
                // echo "Post ID: {$result->ID}, Title: {$result->post_title}, Meta Key: {$result->meta_key}, Meta Value: {$result->meta_value}<br>";

                echo '<a href="' . get_permalink($result->ID) . '">' . get_the_title($result->ID) . '</a><br>';
            }
            // if ($posts_query->have_posts()) {
            //     echo "Pages and posts where the form " . $contact_form->post_title . " is used:<br>";
            //     while ($posts_query->have_posts()) {
            //         $posts_query->the_post();
            //         echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a><br>';
            //     }
            //     wp_reset_postdata();
            // } else {
            //     // echo "No pages or posts found using this form.";
            // }
        endif;
    }
}

// global $wpdb;

$form_id = '30'; // Your Contact Form  7 form ID

// Start with a query that finds posts and pages containing the CF7 shortcode
$query = "
    SELECT p.ID, p.post_title, p.post_type
    FROM {$wpdb->posts} p
    WHERE p.post_type IN ('post', 'page')
    AND p.post_content LIKE '%[contact-form-7 id=\"{$form_id}\"]%'
";

$posts_with_form = $wpdb->get_results($query);

// Now, for each post or page found, check if it has any ACF fields
foreach ($posts_with_form as $post) {
    $acf_fields = get_fields($post->ID);
    if (!empty($acf_fields)) {
        // This post or page has ACF fields. You can process them as needed.
        echo "Post/Page ID: {$post->ID}, Title: {$post->post_title}, ACF Fields: " . print_r($acf_fields, true) . "<br>";
    }
}

?>

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
