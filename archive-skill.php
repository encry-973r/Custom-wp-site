<?php get_header(); ?>

<div class="fixed-nav"></div>

<!-- html output -->
<div class="outer-container">
        <div class="single-page-title">
        <h2 class="single-about-title">We are professionals</h2>
    </div>
    <div class="underline"></div>
<?php
while(have_posts()){
the_post(); ?>
    <div class="inner-child">
        <h5 class="child-title"><?php the_title();  ?></h5>
        <div class="archive-icon-content">
            <span class="skill-icon archive-icon">
                <i class="<?php echo get_field('skill_icon_class'); ?>"></i>
            </span>
            <span class="child-content"><?php the_content(); ?></span>
        </div>
    </div>
    <!-- end of html output -->
    <?php } ?>
</div>

<?php get_footer(); ?>