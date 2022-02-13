<?php get_header(); ?>

<!-- html output -->
<div class="section-center single-page-banner">
    <img src="<?php the_post_thumbnail_url();  ?>" alt="">
</div>

<?php
while(have_posts()){
the_post(); ?>

<div class="section-center single-about-section">
    <!-- section title  -->
    <div class="single-page-title">
        <h2 class="single-about-title"><?php the_title();  ?></h2>
    </div>
    <!-- end of section title  -->
    <?php the_content(); ?>
</div>




<?php }

get_footer(); ?>