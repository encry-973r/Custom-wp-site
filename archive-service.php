<?php get_header(); ?>

<div class="fixed-nav"></div>

<!-- html output -->
<div class="outer-container">
        <div class="single-page-title">
        <h2 class="single-about-title">Checkout Our Amazing Services</h2>
    </div>
    <div class="underline"></div>
<?php
while(have_posts()){
the_post(); ?>
    <div class="inner-child">
        <h5 class="child-title"><?php the_title();  ?></h5>
        <div class="archive-product-content">
            <div class="archive-product-img">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('img_300_200'); ?></a>
            </div>
            <span class="child-content"><?php the_content(); ?></span>
        </div>
         
    </div>
<?php } ?>
</div>

<?php get_footer(); ?>