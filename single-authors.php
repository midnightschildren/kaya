<?php
/**
 * The Template for displaying all single author posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php $single_amar = clone $wp_query; ?>

<h2 class="diaspora white center">kaya publishes books of the <span class="green">asian pacific diaspora</span></h2>
<div class="papertop grid-whole">&nbsp;</div>
<div id="single-book" class="grid-whole background-white">
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
<div class="grid-14 s-grid-16 m-grid-16">
<div class="grid-half s-grid-whole padded-inner">

<div class="grid-half padded-inner">

<h2 class="book-title gray padded-bottom">Kaya Authors</h2>

<?php

    $author_term_query = new WP_Query( array(
        'post_type' => 'authors',
        'posts_per_page' => -1,
        'orderby' => 'rand'
        
    ) )
    ?>

<ul class="padded-top side_menu"> 
    <?php
    if ( $author_term_query->have_posts() ) : while ( $author_term_query->have_posts() ) : $author_term_query->the_post(); ?>
    
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

	<?php endwhile; endif; ?>
</ul>
</div>

<?php wp_reset_postdata();?>

<?php $author_term_query = null; $wp_query = clone $single_amar; ?><?php rewind_posts(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="grid-half padded-inner">
	<div class="authorlanding padded-bottom">
    
    	<?php the_post_thumbnail('book-landing'); ?>

	</div>
	
	<div class="weblink_box">
		<div class="grid-whole paper"></div>
		<h3>#<?php the_field('twitter_hash_tag'); ?></h3>
		<ul class="web_menu padded-inner">
		<?php if (get_field('website'))
		{ ?> 
		<li><a href="<?php the_field('website'); ?>">website</a></li>
		<?php } ?>

		<?php if (get_field('facebook'))
		{ ?> 
		<li><a href="<?php the_field('facebook'); ?>">facebook</a></li>
		<?php } ?>

		<?php if (get_field('twitter'))
		{ ?> 
		<li><a href="<?php the_field('twitter'); ?>">twitter</a></li>
		<?php } ?>

		<?php if (get_field('blog'))
		{ ?> 
		<li><a href="<?php the_field('blog'); ?>">blog</a></li>
		<?php } ?>

		<?php if (get_field('instagram'))
		{ ?> 
		<li><a href="<?php the_field('instagram'); ?>">instagram</a></li>
		<?php } ?>

		<?php if (get_field('tumblr'))
		{ ?> 
		<li><a href="<?php the_field('tumblr'); ?>">tumblr</a></li>
		<?php } ?>

		<?php if (get_field('youtube'))
		{ ?> 
		<li><a href="<?php the_field('youtube'); ?>">youtube</a></li>
		<?php } ?>

		<?php if (get_field('pinterest'))
		{ ?> 
		<li><a href="<?php the_field('pinterest'); ?>">pinterest</a></li>
		<?php } ?>

		<?php if (get_field('vimeo'))
		{ ?> 
		<li><a href="<?php the_field('vimeo'); ?>">vimeo</a></li>
		<?php } ?>

		</ul>
	</div>



<?php
$author_query3 = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'meta_query' => array (
            array (
            'key' => 'news_by_author',
            'value' => '"'.get_the_ID().'"',
            'compare' => 'LIKE'
            )
        ),
        
    ) )
?>
<div class ="grid-whole padded-top">
<?php if ($author_query3->have_posts())
{?>
<h2 class="single_author_news padded-vertical gray"><?php the_title(); ?> news</h2>
<?php } ?>
<?php if ($author_query3->have_posts()) : while ($author_query3->have_posts()) : $author_query3->the_post(); ?>
	
    <div class="grid-whole"><a class="event_title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><strong><?php the_title(); ?></strong></a><?php the_excerpt(); ?></div>

<?php endwhile; endif; $author_query3 = null;
    wp_reset_postdata();?>

</div>


</div>
</div>
<div class="grid-half s-grid-whole padded-inner">


<article class="padded-inner">

	<h2 class="gray book-title padded-bottom"><?php the_title(); ?></h2>
	

	<?php if (get_field('bio'))
		{ ?> 
		<div class="padded-vertical">
		<?php the_field('bio'); ?>
		</div>
	<?php } ?>		

	<h5><span>books</span></h5>
	
<?php
$counter = 1; //start counter

$grids = 2; //Grids per row ?>

	<?php foreach(get_field('1book') as $post_object): ?>

<?php
//Show the left hand side column
if($counter == 1) :
?>
<div class="grid-half padded-inner-right">

<?php if (get_field ('press', $post_object->ID)) : ?>

<div class="padded-inner-bottom">
<a href="<?php echo get_field('other_book_url',$post_object->ID); ?>"><?php echo get_the_post_thumbnail($post_object->ID, 'book-thumb'); ?></a>
<div class="padded-top booktitle2">
<a href="<?php echo get_field('other_book_url',$post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a><br />
<?php echo get_field('press', $post_object->ID);?> <?php echo get_field('other_book_published', $post_object->ID); ?>
</div>
</div>

<?php else : ?>

<div class="padded-inner-bottom">
<a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_post_thumbnail($post_object->ID, 'book-thumb'); ?></a>
<div class="padded-top booktitle2">
<a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a><br />
Kaya <?php echo get_field('published', $post_object->ID); ?>
</div>
</div>

<?php endif; ?>
</div>	

<?php
//Show the right hand side column
elseif($counter == $grids) :
?>

<div class="grid-half padded-inner-left">

<?php if (get_field ('press', $post_object->ID)) : ?>

<div class="padded-inner-bottom">
<a href="<?php echo get_field('other_book_url',$post_object->ID); ?>"><?php echo get_the_post_thumbnail($post_object->ID, 'book-thumb'); ?></a>
<div class="padded-top booktitle2">
<a href="<?php echo get_field('other_book_url',$post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a><br />
<?php echo get_field('press', $post_object->ID);?> <?php echo get_field('other_book_published', $post_object->ID); ?>
</div>
</div>

<?php else : ?>

<div class="padded-inner-bottom">
<a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_post_thumbnail($post_object->ID, 'book-thumb'); ?></a>
<div class="padded-top booktitle2">
<a href="<?php echo get_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a><br />
Kaya <?php echo get_field('published', $post_object->ID); ?>
</div>
</div>

<?php endif; ?>

</div>	
<?php
$counter = 0;
endif;
?>
<?php
$counter++;
endforeach; ?>

<div class="grid-whole">
<h5><span>praise</span></h5>

<?php foreach(get_field('1book') as $post_object): ?>

<?php echo get_field('praise', $post_object->ID); ?>
<?php endforeach; ?>
</div>
</article>
</div>
</div>
<div class="grid-1 m-hidden s-hidden">&nbsp;</div>
</div>

<?php endwhile; ?>

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