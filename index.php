<?php get_header(); ?>
      
      <!-- header -->
    <header class="header" style='background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
    url("<?php echo get_theme_file_uri("/images/main-bcg.jpeg"); ?>") center/cover no-repeat fixed;'>
      <div class="banner">
        <h2>Over one hundred flavors of</h2>
        <h1>
          specially <br />
          crafted tea
        </h1>
        <a href="<?php echo site_url('/skills'); ?>" class="btn banner-btn">explore</a>
      </div>
    </header>
    <!-- end of header -->
    <div class="content-divider"></div>

    <!-- skills section -->
    <section class="skills clearfix">
      <!-- section title  -->
      <div class="section-title">
        <h3>Our Skills</h3>
        <!-- <h2>tea station</h2> -->
      </div>
      <!-- end of section title  -->
    <?php 
    // get the most recent skills for display
      $skillsQuery = new WP_Query(array(
        'posts_per_page' => 4,
        'post_type' => 'skill'
      ));

      while($skillsQuery->have_posts()){
        $skillsQuery->the_post(); ?>
      <!-- single skill -->
      <article class="skill">
        <span class="skill-icon">
          <i class="<?php echo get_field('skill_icon_class'); ?>"></i>
        </span>
        <h4 class="skill-title"><?php the_title(); ?></h4>
        <p class="skill-text"><?php echo wp_trim_words(get_the_content(), 11); ?></p>
      </article>
      <!-- end of single skill -->
      <?php }  wp_reset_postdata();
    ?>
    </section>
    <!-- end skills section -->

            <!-- about -->
    <section>
      <div class="section-center clearfix">
        
        <?php

        // about-us has a page_id of 5.
          $aboutQuery = new WP_Query(array(
            'page_id' => '5'
          ));

          //  print_r($aboutQuery);
            while($aboutQuery->have_posts()){
              $aboutQuery->the_post(); ?>
                      <!-- about-img -->
              <article class="about-img">
                <div class="about-picture-container">
                  <!-- <img
                    src="<?php echo the_post_thumbnail_url('img_465_310'); ?>"
                    alt="tea kettle"
                    class="about-picture"
                  /> -->
                  <div class='about-picture'><?php the_post_thumbnail('img_465_310'); ?></div>
                </div>
              </article>
              <!-- about-info -->
              <article class="about-info">
                <!-- section title  -->
                <div class="section-title">
                  <h3>about our</h3>
                  <h2>tea station</h2>
                </div>
                <!-- end of section title  -->
                <p class="about-text"><?php echo wp_trim_words(get_the_content(), 20 ); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn">learn more</a>
              </article>
              
            <?php }  wp_reset_postdata();
        ?>
      </div>
    </section>
    <!-- end of about -->

     <!-- products -->
    <section class="products">
      <div class="section-center clearfix">

        <!-- products info -->
        <article class="products-info">
          <!-- section title  -->
          <div class="section-title">
            <h3>check out</h3>
            <h2>our products</h2>
          </div>
          <!-- end of section title  -->
          <?php
          // query the our-products page to get an excerptof the content.
            $ourProductPageQuery = new WP_Query(array(
              'page_id' => '40'
            ));

              while( $ourProductPageQuery->have_posts()){
                $ourProductPageQuery->the_post(); ?> 
                <p class="product-text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                <?php } wp_reset_postdata(); ?>
                <a href="<?php echo site_url('/products'); ?>" class="btn">inventory</a>
          <!-- ?> -->
        </article>
        <!-- end of products info -->

        <!-- products inventory -->
        <article class="products-inventory clearfix">
          <!-- single product -->
          <?php
              // query the our-products page to get an excerpt of it content.
            $productsQuery = new WP_Query(array(
              'post_type' => 'product',
              'posts_per_page' => 3,
              'order' => 'DESC',
            ));
            
            while($productsQuery->have_posts()){
              $productsQuery->the_post(); ?>
              <div class="product">
                <!-- <img
                  src="<?php echo the_post_thumbnail_url(); ?>"
                  alt="single product"
                  class="product-img"
                /> -->
                <div class="product-img"><?php the_post_thumbnail('img_328_272'); ?></div>
                <h4 class="product-title"><?php the_title(); ?></h4>
                <h4 class="product-price"><?php echo '$'.get_field("product_price"); ?></h4>
              </div>
              <?php } wp_reset_postdata();

          ?>
          <!-- end of single product -->       
        </article>
        <!-- end of products inventory -->
      </div>
    </section>
    <!-- end of products -->


    <!-- services -->
    <section class="services">
      <!-- section title  -->
      <div class="section-title services-title">
        <h3>explore</h3>
        <h2>our services</h2>
      </div>
      <!-- end of section title  -->

      <div class="section-center clearfix">
        <!-- single card -->
        <?php 
          $servicesQuery = new WP_Query(array(
            'post_type' => 'service',
            'posts_per_page' => 4,
            'order' => 'ASC',
          ));

          while($servicesQuery->have_posts()){
            $servicesQuery->the_post(); ?>
            <!-- HTML -->
            <article class="service-card">
              <!-- img container -->
              <div class="service-img-container">
                <!-- <img
                  src="<?php echo the_post_thumbnail_url(); ?>"
                  alt="singl service"
                  class="service-img"
                /> -->
                <div class="service-img"><?php the_post_thumbnail('img_341_272'); ?></div>
                <!-- service icon -->
                <span class="service-icon">
                  <i class="<?php echo get_field('service_icon_class'); ?>"></i>
                </span>
              </div>
              <!-- service info -->
              <div class="service-info">
                <h4><?php the_title(); ?></h4>
                <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                <a href="<?php echo site_url('/services'); ?>" class="btn service-btn">read more</a>
              </div>
            </article>
            <!-- END OF HTML -->
          <?php } wp_reset_postdata();
        ?>
        <!-- end of single card -->
      </div>
    </section>
    <!-- end of services -->
    

     <!-- contact -->
    <section class="contact" id="contact">
      <div class="section-center clearfix">
        <!-- contact info -->
        <article class="contact-info">
          <!-- contact item -->
          <div class="contact-item">
            <h4 class="contact-title">
              <span class="contact-icon">
                <i class="fas fa-location-arrow"></i>
              </span>
              address
            </h4>
            <h4 class="contact-text">
              523 N Fairfax Ave <br />
              Los Angeles, CA 90048
            </h4>
          </div>
          <!-- end of contact item -->
          <!-- contact item -->
          <div class="contact-item">
            <h4 class="contact-title">
              <span class="contact-icon">
                <i class="fas fa-envelope"></i>
              </span>
              email
            </h4>
            <h4 class="contact-text">davidjoshua0001@gmail.com</h4>
          </div>
          <!-- end of contact item -->
          <!-- contact item -->
          <div class="contact-item">
            <h4 class="contact-title">
              <span class="contact-icon">
                <i class="fas fa-phone"></i>
              </span>
              telephone
            </h4>
            <h4 class="contact-text">+ 234 816 9103 459</h4>
          </div>
          <!-- end of contact item -->
        </article>
        <!-- contact form -->
        <article class="contact-form">
          <h3>contact us</h3>
          <form action="https://formspree.io/f/mknyojoy" method="POST">
            <div class="form-group">
              <!-- inputs -->
              <input
                type="text"
                placeholder="name"
                class="form-control"
                name="name"
              />
              <input
                type="email"
                placeholder="email"
                class="form-control"
                name="email"
              />
              <textarea
                name="message"
                placeholder="email me for your next web-project"
                class="form-control"
                rows="5"
              ></textarea>
            </div>
            <!-- button -->
            <button type="submit" class="btn submit-btn">Send email</button>
          </form>
        </article>
      </div>
    </section>
    <!-- end contact -->

 

<?php get_footer(); ?>