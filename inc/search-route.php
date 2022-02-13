<?php

// ============================================
// custom search
// ============================================

function teaRegisterSearch(){
    register_rest_route('tea/v1', 'search', array(
        'methods' => WP_REST_Server::READABLE,    //GET request.
        'callback' => 'teaSearchResults'
    ));
}

function teaSearchResults($data){
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'page', 'skill', 'product', 'service'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'generalInfo' => array(),
        'skills' => array(),
        'products' => array(),
        'services' => array()
    );

    while($mainQuery->have_posts()){
        $mainQuery->the_post();

        if(get_post_type() == 'post' or get_post_type() == 'page'){
         array_push($results['generalInfo'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'post_type' => get_post_type(),
            'authorName' => get_author_name()
        ));
        }

        if(get_post_type() == 'product'){
         array_push($results['products'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'post_type' => get_post_type(),
            'archive' => get_post_type_archive_link(get_post_type())
        ));
        }

        if(get_post_type() == 'skill'){
         array_push($results['skills'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'post_type' => get_post_type(),
            'archive' => get_post_type_archive_link(get_post_type())
        ));
        }

        if(get_post_type() == 'service'){
         array_push($results['services'], array(
            'title' => get_the_title(),
            'permalink' => get_the_permalink(),
            'post_type' => get_post_type(),
            'archive' => get_post_type_archive_link(get_post_type())
        ));
        }

    }
    return $results;
}
add_action('rest_api_init', 'teaRegisterSearch');
// ============================================
// end of custom search
// ============================================