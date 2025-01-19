<?php get_header(); ?>

<br><br><br><br><br>

<div class="container single-article">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="article-header">
            <h1 class="article-title"><?php the_title(); ?></h1>
            <div class="post-meta">
                <?php the_date(); ?> - <?php the_time(); ?>
                <div class="meta">Ditulis Oleh: <?php the_author(); ?></div>
            </div>
        </div>
        
        <div class="featured-image">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
            <?php endif; ?>
        </div>

        <div class="post-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; else : ?>
        <p>Sorry, no posts found.</p>
    <?php endif; ?>
</div>

<div class="container more-articles">
    <h2>More Articles</h2>
    <div class="row">
        <?php
        $recent_posts = new WP_Query([
            'posts_per_page' => 3,
            'post__not_in'   => [get_the_ID()]
        ]);
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post();
        ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
                        </h5>
                        <p class="post-date"><?php the_date(); ?> - <?php the_time(); ?></p>
                    </div>
                </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p>No recent articles found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
