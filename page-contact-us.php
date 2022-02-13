<?php get_header(); ?>

<!-- contact -->
    <section class="contact">
      <div class="section-center clearfix">
        <!-- contact info -->
        <article class="contact-info push-down">
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
        <article class="contact-form push-down">
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