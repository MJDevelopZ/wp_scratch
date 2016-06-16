<?php get_header(); ?>
  <div class="row">
    <div class="col-sm-8 blog-main">
      <!--Adding WordPress Loop-->
      <?php
        if (have_posts() ): while (have_posts() ): the_post();
      
        get_template_part( 'content', get_post_format() ); 

      endwhile; ?>
      <!--Insert Pagination-->
      <nav>
        <ul class="pager">
          <li><?php next_posts_link( 'Older posts'); ?></li>
          <li><?php previous_posts_link ('Newer posts'); ?></li>
        </ul>
      </nav>

      <?php endif; ?>
      <!--End of WordPress Loop-->
    </div> <!-- /.blog-main-->

    <?php get_sidebar(); ?>

  </div> <!-- /.row-->
<?php get_footer(); ?>