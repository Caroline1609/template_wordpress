<?php

get_header();

if (have_posts()): // si l'url appelé correspond à du contenu  (article, page, auteur, catégorie...)
    while (have_posts()): // pour chaque élément trouvé... 
        the_post(); // on charge les données du contenu
        ?>


        <article>
            <header>
                <div class="conteneur_img">

                    <?php if (has_post_thumbnail()) {

                        the_post_thumbnail('thumbnail');
                    } else {
                        echo '<img src="' . get_template_directory_uri() . '/1714.jpg" />';
                    }

                    ?>

                    <span>
                        <?php echo get_the_date(); ?>
                    </span>

                </div>
            </header>
            <section>
                <h2>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <p><?php the_excerpt(); ?></p>
            </section>

        </article>
        <?php
    endwhile;
else:
    echo 'Aucun contenu';
endif;


get_footer();