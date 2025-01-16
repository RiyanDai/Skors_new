<?php
/**
 * Template Name: Kegiatan
 */

get_header(); ?>

<main id="main">
  <section class="kegiatan-section">
    <div class="container" style="padding: 60px 0;">
      <header class="section-header wow fadeInUp">
        <h3 style="color: white;">Kegiatan</h3>
        <p style="color: white;">Berita dan informasi terbaru seputar kegiatan kami</p>
      </header>

      <div class="row g-4">
        <?php
        // Query untuk mengambil artikel
        $args = array(
          'post_type' => 'post',
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order' => 'DESC'
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
          while ($query->have_posts()) : $query->the_post();
        ?>
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="card h-100" style="border-radius: 15px; background: #000; color: white;">
              <!-- Wrap image dengan link -->
              <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>" 
                       class="card-img-top" 
                       alt="<?php the_title(); ?>"
                       style="border-radius: 15px 15px 0 0;">
                <?php endif; ?>
              </a>
              
              <div class="card-body d-flex flex-column">
                <p class="text-muted mb-2"><?php echo get_the_date('d F Y'); ?></p>
                <!-- Wrap title dengan link -->
                <h4 class="card-title" style="font-weight: bold; font-size: clamp(1.2rem, 2.5vw, 1.5rem);">
                  <a href="<?php the_permalink(); ?>" class="text-white text-decoration-none">
                    <?php the_title(); ?>
                  </a>
                </h4>
                <p class="card-text flex-grow-1">
                  <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </p>
                <!-- Tombol baca artikel -->
                <a href="<?php the_permalink(); ?>" class="btn btn-link text-white mt-auto" style="padding-left: 0;">
                  Baca artikel →
                </a>
              </div>
            </div>
          </div>
        <?php 
          endwhile;
          wp_reset_postdata();
        else : 
        ?>
          <div class="col-12">
            <p>Tidak ada kegiatan yang tersedia.</p>
          </div>
        <?php endif; ?>
      </div>

      <!-- Pagination -->
      <?php if ($query->max_num_pages > 1) : ?>
      <div class="pagination-wrapper mt-5 text-center">
        <?php
          echo paginate_links(array(
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $query->max_num_pages,
            'prev_text' => '&laquo; Previous',
            'next_text' => 'Next &raquo;'
          ));
        ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>