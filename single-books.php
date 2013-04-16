<?php
/**
 * The Template for single books
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php $amar = clone $wp_query; ?>

<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>

<div id="author_landing" class="grid-whole container_test">

<div id="bi-slider" class="mi-slider">

<ul><li class="special">
<?php if (have_posts() ) while ( have_posts() ) : the_post(); ?>

<div id="single-book" class="grid-whole background-white">
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
<div class="grid-14 s-grid-16 m-grid-16">

<article>
<div class="grid-7 m-grid-whole s-grid-whole padded-inner">


<div class="grid-whole padded-inner">
<div class="booklanding">
    <?php if (get_field('scribd')){  
    the_field('scribd');
    } else { ?>
    <?php the_post_thumbnail('book-landing'); 
    }   ?> 
</div>
</div>
<div class="grid-whole s-grid-whole s-hidden m-hidden padded-inner">
<?php foreach(get_field('author') as $post_object): ?>
<div class="grid-whole s-grid-whole"> <h2 class="sb_author gray"><?php echo get_the_title($post_object->ID) ?> NEWS</h2></div>
<div class="grid-6">
<div class="sb_author_head">
 <a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_post_thumbnail($post_object->ID, 'book-thumb'); ?></a>
</div></div>

<?php $authorvariable = $post_object->ID;

?>


<?php endforeach; ?>

<?php
$author_query3 = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'meta_query' => array (
            array (
            'key' => 'news_by_author',
            'value' => '"'.$authorvariable.'"',
            'compare' => 'LIKE'
            )
        ),
        
    ) )
?>
<div class ="grid-10">
<?php if ($author_query3->have_posts()) : while ($author_query3->have_posts()) : $author_query3->the_post(); ?>

    <div class="grid-whole padded-inner"><a class="event_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></div>

<?php endwhile; endif; $author_query3 = null;
    wp_reset_postdata();?>

</div>
</div>
</div>
<div class="grid-9 m-grid-whole s-grid-whole padded-inner">
<div class="padded-inner">
      <header>
        <h2 class="book-title gray"><?php the_title(); ?></h2>

<?php foreach(get_field('author') as $post_object): ?>
    <p class="author_name"><strong>by <a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID) ?></a></strong></p>
<?php endforeach; ?>


      </header>

<strong><?php the_field('pages'); ?>pp | Published  <?php the_field('published'); ?> | <?php the_field('format'); ?> | ISBN <?php the_field('isbn'); ?></strong>
<div class="book_genres"><strong><?php echo get_the_term_list($post->ID, 'book_genre', '', ' | ', '' ); ?></strong></div>


<div id="simplecart">

<div class="price">$<?php the_field('price'); ?> 

<?php if (get_field('amazon'))
{ ?> 
<a href="<?php the_field('amazon');?>"><img alt="Btnbuy" src="/wp-content/uploads/2013/03/buy-button.png" /></a>
<?php } ?>
</div>

</div>

<?php the_field('description'); ?>

<?php if (get_field('praise'))
{ ?> 
<h5><span>praise</span></h5>
<?php the_field('praise'); ?>
<?php } ?>

<?php if (get_field('awards'))
{ ?> 
<h5><span>awards</span></h5>
<?php the_field('awards'); ?>
<?php } ?>
</div>
</div>

<div class="grid-whole s-grid-whole l-hidden padded-inner">
<div class="padded-inner">
<?php foreach(get_field('author') as $post_object): ?>
<div class="grid-whole s-grid-whole"> <h2 class="sb_author gray"><?php echo get_the_title($post_object->ID) ?> NEWS</h2></div>
<div class="grid-6">
<div class="sb_author_head">
 <a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_post_thumbnail($post_object->ID, 'book-thumb'); ?></a>
</div></div>

<?php $authorvariable = $post_object->ID;

?>


<?php endforeach; ?>

<?php
$author_query3 = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'meta_query' => array (
            array (
            'key' => 'news_by_author',
            'value' => '"'.$authorvariable.'"',
            'compare' => 'LIKE'
            )
        ),
        
    ) )
?>
<div class ="grid-10">
<?php if ($author_query3->have_posts()) : while ($author_query3->have_posts()) : $author_query3->the_post(); ?>

    <div class="grid-whole padded-inner"><a class="event_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a><?php the_excerpt(); ?></div>

<?php endwhile; endif; $author_query3 = null;
    wp_reset_postdata();?>

</div>
</div>
</div>
</article>

</div>
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
</div>
<?php endwhile; ?>
</li>
</ul>



<?php

    $genre_term_query3 = new WP_Query( array(
        'post_type' => 'books',
        'posts_per_page' => -1,
        'orderby' => 'rand'
        
    ) )
    ?>

<ul>
    <?php
    if ( $genre_term_query3->have_posts() ) : while ( $genre_term_query3->have_posts() ) : $genre_term_query3->the_post(); ?>
    
<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('book-thumb'); ?></a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
    <?php $hosts = get_field('author');if ($hosts): foreach($hosts as $host_object): ?>
    <a href="<?php echo get_permalink($host_object->ID); ?>"><?php echo get_the_title($host_object->ID); ?></a></div></li>
<?php endforeach; endif;?>
    <?php endwhile; endif; ?>

<?php wp_reset_postdata(); ?>
<?php $genre_term_query3 = null; ?>


</ul>


<?php
$genre_terms = get_terms( 'book_genre',  array(
    'number' => 3,
    'exclude' => array (56, 58, 62)
)); ?>

<?php
foreach( $genre_terms as $genre_term ) {
    $genre_term_query2 = new WP_Query( array(
        'post_type' => 'books',
        'posts_per_page' => -1,
        'orderby' => 'rand',
        'tax_query' => array(
            array(
                'taxonomy' => 'book_genre',
                'terms' => array( $genre_term->slug ),
                'field' => 'slug',
                'operator' => 'IN'
            )
        )
    ) )
    ?>

<ul>
    <?php
    if ( $genre_term_query2->have_posts() ) : while ( $genre_term_query2->have_posts() ) : $genre_term_query2->the_post(); ?>
    
<li><div class="bookcover"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('book-thumb'); ?></a></div><div class="booktitle"><a class="black" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>&nbsp;by&nbsp;
    <?php $hosts = get_field('author');if ($hosts): foreach($hosts as $host_object): ?>
    <a href="<?php echo get_permalink($host_object->ID); ?>"><?php echo get_the_title($host_object->ID); ?></a></div></li>
<?php endforeach;  endif;?>
    <?php endwhile; endif; ?>



</ul>

    <?php 
}

?>

<?php wp_reset_postdata(); ?>
<?php $genre_term_query2 = null; ?><?php rewind_posts(); ?>


<div class="grid-whole background-gray">
<nav>
    <a id="CurrentBtn" href="#"><?php echo wp_trim_words( get_the_title(), 3 ); ?></a>
    <a id="AllBtn" href="#">All</a>
<?php
foreach ( $genre_terms as $genre_term ) {
    $genre_term_query = new WP_Query( array(
        'post_type' => 'books',
        'tax_query' => array(
            array(
                'taxonomy' => 'book_genre',
                'terms' => array( $genre_term->slug ),
                'operator' => 'IN'
            )
        )
    ) );
    ?>

    <a id="<?php echo $genre_term->name; ?>Btn" href="#"><?php echo $genre_term->name; ?></a><?php

    
    
}

?>

</nav>
<div class="grid-whole papertop"></div>
</div>
<div class="clearit"></div>
</div>

</div>

<?php wp_reset_postdata();?>

<?php $genre_term_query = null; $wp_query = clone $amar; ?><?php rewind_posts(); ?>







<div class="grid-whole paper"></div>
<div id="quote" class="grid-whole">
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="padded-inner grid-12 s-grid-16 m-grid-14 center">

<?php
$quote_query = new WP_Query( array(
        'post_type' => 'quotes',
        'posts_per_page' => 1,
        'orderby' => 'rand'
        
        
    ) )
?>
<?php if ($quote_query->have_posts()) : while ($quote_query->have_posts()) : $quote_query->the_post(); ?>
	<p class="quote"><?php $posts = get_field('quote_source');if ($posts): foreach($posts as $post_object): ?>
    <a href="<?php echo get_permalink($post_object->ID); ?>"><?php endforeach; endif; ?><?php the_field('quote_text'); ?></a></p>
	<p class="attribution"><?php the_field('quote_attribution'); ?></p>
<?php endwhile; endif; ?>	

</div>
<div class="grid-1 s-hidden">&nbsp;</div>
<div class="grid-1 s-hidden m-hidden">&nbsp;</div>
</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>