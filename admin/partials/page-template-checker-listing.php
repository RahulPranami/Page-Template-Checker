<?php


// Method 1 :
$templates = wp_get_theme()->get_page_templates();
$report = array();

// echo '<pre>';
// print_r($templates);
// echo '</pre>';

echo '<div class="wrap">';

echo '<div id="icon-themes" class="icon32"></div>';

if (isset($_GET)) {
    if (isset($_GET['tab'])) {
        $active_tab = $_GET['tab'];
    } else {
        $active_tab = 'page-template-usage-listing';
    }
}


echo '<h2 class="nav-tab-wrapper">';

echo '<a href="?page=' . $_GET['page'] . '&tab=page-template-usage-listing" class="nav-tab ';
echo $active_tab == 'page-template-usage-listing' ? 'nav-tab-active' : '';
echo '"> Page Template Usage Listing </a>';
// echo '<a href="?page=' . $_GET['page'] . '&tab=email_settings" class="nav-tab "> Email Settings </a>' ;

echo '</h2>';


echo '<h1>Page Template Usage Report</h1>';
echo "<p>This report will show you any pages in your WordPress site that are using one of your theme's custom templates.</p>";

foreach ($templates as $file => $name) {
    $q = new WP_Query(array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_query' => array(array(
            'key' => '_wp_page_template',
            'value' => $file
        ))
    ));

    $page_count = sizeof($q->posts);

    if ($page_count > 0) {
        // echo '<p style="color:green">' . $file . ': <strong>' . sizeof($q->posts) . '</strong> pages are using this template:</p>';
        // echo "<ul>";
        // foreach ($q->posts as $p) {
        // 	echo '<li><a href="' . get_permalink($p, false) . '">' . $p->post_title . '</a></li>';
        // }
        // echo "</ul>";
    } else {
        echo '<p style="color:red">' . $file . ': <strong>0</strong> pages are using this template, you should be able to safely delete it from your theme.</p>';
    }

    foreach ($q->posts as $p) {
        $report[$file][$p->ID] = $p->post_title;
    }
}

foreach ($templates as $file => $name) {
    $q = new WP_Query(array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_query' => array(array(
            'key' => '_wp_page_template',
            'value' => $file
        ))
    ));

    $page_count = sizeof($q->posts);

    if ($page_count > 0) {
        echo '<p style="color:green">' . $file . ': <strong>' . sizeof($q->posts) . '</strong> pages are using this template:</p>';
        echo "<ul>";
        foreach ($q->posts as $p) {
            echo '<li><a href="' . get_permalink($p, false) . '">' . $p->post_title . '</a></li>';
        }
        echo "</ul>";
    } else {
        // echo '<p style="color:red">' . $file . ': <strong>0</strong> pages are using this template, you should be able to safely delete it from your theme.</p>';
    }

    foreach ($q->posts as $p) {
        $report[$file][$p->ID] = $p->post_title;
    }
}

echo '</div>';

// Method 2 :

// Get available templates within active theme
$available_templates = get_page_templates();

// Get used templates from database
global $wpdb;

$query = "SELECT DISTINCT( meta.meta_value ) FROM {$wpdb->prefix}postmeta as meta JOIN {$wpdb->prefix}posts as posts ON posts.ID = meta.post_id WHERE meta.meta_key LIKE '_wp_page_template' AND posts.post_type = 'page';";
$query_with_count = "SELECT meta.meta_value, COUNT(*) as count FROM {$wpdb->prefix}postmeta as meta JOIN {$wpdb->prefix}posts as posts ON posts.ID = meta.post_id WHERE meta.meta_key LIKE '_wp_page_template' AND posts.post_type = 'page' GROUP BY meta.meta_value;";

$query_to_retrieve_contact_form_acf_fields = "SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM {$wpdb->prefix}posts p JOIN {$wpdb->prefix}postmeta pm ON p.ID = pm.post_id WHERE pm.meta_key LIKE '_%' AND pm.meta_value LIKE '%[contact-form-7%' AND p.post_status <> 'inherit';";

$query_to_retrieve_contact_form_pages = "SELECT ID, post_title, post_content FROM {$wpdb->prefix}posts WHERE post_content LIKE '%[contact-form-7%' AND post_status <> 'inherit';";

$result = $wpdb->get_results($query);

$used_templates = array();
foreach ($result as $template) {
    $used_templates[] = $template->meta_value;
}

/**
 * Compare available templates against used templates
 * Result is an array with the unused templates
 */
$unused_templates = array_diff($available_templates, $used_templates);

// Draw page to show unused templates
?>
<div class="wrap">
    <h1>Page Template Statistics</h1>
    The following templates are not being used:
    <table>
        <tr>
            <th>Template name</th>
            <th>Filename</th>
        </tr>
        <?php foreach ($unused_templates as $name => $file) : ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $file; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
