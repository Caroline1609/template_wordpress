<?php

get_header();

if (have_posts()): // si l'url appelé correspond à du contenu  (article, page, auteur, catégorie...)
    while (have_posts()): // pour chaque élément trouvé... 
        the_post(); // on charge les données du contenu
        ?>


        <article>
            <header>
                <h2><?php the_title(); ?></h2>
                <?php the_post_thumbnail('thumbnail'); ?>
                <aside>
                    écrit par <?php the_author(); ?>
                    le <?php echo get_the_date(); ?>
                </aside>
            </header>
            <section>
                <?php the_content(); ?>
            </section>

        </article>
        <?php
    endwhile;
else:
    echo 'Aucun contenu';
endif;


get_footer();