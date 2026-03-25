<?php 

get_header();

if(have_posts()) :
    while(have_posts()):
        the_post();
?>

<article class="index">
    <header>
        <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    </header>
    <section>
        <?php the_post_thumbnail('large'); ?>
        <?php the_content(); ?>
    </section>
    <footer>
        <?php the_category(', '); ?>
    </footer>
</article>

<?php
    endwhile;
endif;



get_footer();