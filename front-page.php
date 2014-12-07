<?php
/*
Template Name: Homepage
*/
get_header();
?>
<div class="homepage">
<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
$postCounter = 0;
$postMax = 20;
$blogs_query = new WP_Query('cat=-3822&posts_per_page='.$postMax.'&paged='.$paged);
$features_query = new WP_Query('orderby=date&order=desc&cat=3822&posts_per_page=1');
if ($features_query->have_posts()) :
    while($features_query->have_posts()) :
        $features_query->the_post();
?>
    <div class="featured-article container">
        <?php article_card(get_the_id()); ?>
        <div class="description">
            <h2>Feature Story</h2>
            <p><?php the_excerpt(); ?></p>
        </div>
    </div>
<?php
    endwhile;
endif;
?>
    <div class="card container">
<?php
if ($blogs_query->have_posts()) :
    while ($blogs_query->have_posts()) :
        $blogs_query->the_post();
        article_card(get_the_id());
    endwhile;
endif;
?>
    </div>
</div>

<?php get_footer(); ?>