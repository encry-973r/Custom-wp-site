<?php get_header(); ?>

<?php
while(have_posts()){
the_post(); ?>

<section class="section push-down">
    <div class="section-center clearfix">
        <!-- html output -->
        <!-- <h3><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h3> -->
        <h3><?php the_title();  ?></h3>
        <p><?php the_content(); ?></p>
        <!-- end of html output -->
    </div>
</section>

<?php }

get_footer(); ?>