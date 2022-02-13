<!DOCTYPE html>
<html lang="en">
  <head>
  <?php wp_head(); ?>
  </head>
  <body>
    <!-- main-nav -->
    <div <?php 
            if(!is_page(get_option('page_on_front'))) { //home page
              echo 'class="hide"'; 
            }else {
              echo 'class="fixed-nav"'; 
            }
            ?>>
             <div class="search-nav js-search-trigger">
                <span class="search-icon floated-search-icon"><i class="fas fa-search"></i></span>
             </div>
            </div>
    <!-- end of main-nav -->

    <!-- menu navbar -->
    <div class="top-nav">
      <!-- nav button -->
      <span class="nav-btn" id="nav-btn">
        <i class="fas fa-bars"> </i>
      </span>
    </div>
    <nav class="navbar" id="navbar">
      <div class="navbar-header">
        <span class="nav-close" id="nav-close">
          <li class="fas fa-times"></li>
        </span>
      </div>
      <ul class="nav-items">
        <li><a href="<?php echo site_url('/'); ?>" class="nav-link">home</a></li>
        <li><a href="<?php echo site_url('/about-us'); ?>" class="nav-link">about</a></li>
        <li><a href="<?php echo site_url('/products'); ?>" class="nav-link">products</a></li>
        <li><a href="<?php echo site_url('/skills'); ?>" class="nav-link">skills</a></li>
        <li><a href="<?php echo site_url('/services'); ?>" class="nav-link">services</a></li>
        <li><a href="<?php echo site_url('/contact-us'); ?>" class="nav-link" id="contact_ref">contact us</a></li>
      </ul>
      <div class="search-nav js-search-trigger">
        <span class="search-icon">Search <i class="fas fa-search"></i></span>
      </div>
    </nav>
    <!-- end of menu navbar -->


      

