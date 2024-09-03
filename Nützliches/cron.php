function custom_post_status() {
    register_post_status('archive', array(
        'label'                     => _x('Archived', 'post status label', 'textdomain'),
        'public'                    => true,
        'exclude_from_search'       => true,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop('Archived <span class="count">(%s)</span>', 'Archived <span class="count">(%s)</span>', 'textdomain'),
    ));
}
add_action('init', 'custom_post_status');





// Cron-Job initialisieren
function schedule_archive_cron_job() {
    if (!wp_next_scheduled('archive_posts_cron_hook')) {
        wp_schedule_event(time(), 'daily', 'archive_posts_cron_hook');
    }
}
add_action('wp', 'schedule_archive_cron_job');



// Cron-Job ausführen
function archive_posts_function() {
    $args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'date_query'     => array(
            array(
                'before'    => '1 year ago',
                'inclusive' => true,
            ),
        ),
        'fields'         => 'ids',
        'nopaging'       => true,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        foreach ($query->posts as $post_id) {
            wp_update_post(array(
                'ID'          => $post_id,
                'post_status' => 'archive',
            ));
        }
    }
}
add_action('archive_posts_cron_hook', 'archive_posts_function');
