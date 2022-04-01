<?php get_header(); ?>
<div class="container-fluid autor-template seccion-autor">
    <div id="content" class="narrowcolumn container pt-5 ">
        <div class="row">
            <div class="perfil col-12 col-md-12 mb-3">
                <!-- This sets the $curauth variable -->
                <?php
                $user = wp_get_current_user();

                if ($user) :
                ?>
                    <img class="avatar-perfil" src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" />
                <?php endif; ?>

            </div>

            <div class="col-12 col-md-12">
                <?php
                $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                ?>

                <h2> <?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?> </h2>
            </div>




            <dl class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <dt>Contacto:</dt>
                        <dd><a href="<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a></dd>
                    </div>
                    <div class="col-12 col-md-8">
                        <dt>Perfil</dt>
                        <dd class="parrafos-bp"><?php echo $curauth->user_description; ?></dd>
                    </div>
                </div>
            </dl>
        </div>
    </div>
</div>
<div class="container-fluid autor-template">
    <ul class="container">
        <!-- The Loop -->
        <h3 class="titulo-rayas white-bg">Publicaciones de <?php echo $curauth->nickname; ?>:</h3>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <li class="row mb-5">



                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">

                        <div class="imagen-archivo col-12 col-md-4">
                            <?php craed_duoc_uc_post_thumbnail(); ?>
                        </div>
                        <header class="entry-header col-12 col-md-4 flex-column">
                        <div class="entry-meta d-flex datos-publicacion">
                               
                                <p><?php the_category('/'); ?></p>
                            </div>   
                        
                        <h4 class="entry-title"><?php the_title(); ?></h4>

                            <div class="entry-meta d-flex datos-publicacion">
                                <p> <?php the_time('d M Y'); ?> </p>
                                
                            </div>
                        </header>
                    </a>
                    <div class="entry-content col-12 col-md-4">
                        <p class="parrafos-bp"><?php echo get_the_excerpt(); ?></p>
                    </div><!-- .entry-content -->
                </li>

            <?php endwhile;
        else : ?>
            <p><?php _e('No hay post, lo sentimos.'); ?></p>

        <?php endif; ?>

        <!-- End Loop -->

    </ul>
</div>


<?php //get_sidebar(); 
?>
<?php get_footer(); ?>