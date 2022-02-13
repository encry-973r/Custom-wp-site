<?php get_header(); ?>

<div class="fixed-nav">
    <div class="search-nav js-search-trigger">
        <span class="search-icon floated-search-icon"><i class="fas fa-search"></i></span>
    </div>
</div>

<section class="section push-down" style="min-height:76vh;">
    <div class="section-center clearfix">
        
<?php
    while(have_posts()){
    the_post(); ?>

        <h3><?php the_title(); ?></h3>
        <div class="archive-product-content">
            <div class="archive-product-img">
                <?php the_post_thumbnail('img_352_264'); ?>
            </div>
            <span class="child-content"><?php the_content(); ?></span>
        </div>
        
        <?php } ?>
        <div class="section-rule"></div>
        <h4 class="btn"><a  href="<?php echo get_post_type_archive_link(get_post_type());?>">Go Back...</a></h4>
    </div>
</section>

<?php get_footer(); ?>