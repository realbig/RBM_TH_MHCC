<?php
/*
Template Name: Events
*/


get_header(); ?>
			

	<!-- Page --> 
	
	<div id="page_wrapper_outer"> 
		<div id="page_wrapper"> 
			<div id="page"> 
				
				<div id="section_main" class="inner_page"> 
					
					<h1 class="two_col"><?php the_title(); ?></h1>
					
                    <?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				
					?>
                
					<div class="hr"><hr /></div> 
					
					<div id="nav_sub">                         
                        <?php get_sidebar(); ?>
					</div> 
                    
                <?php
                    
                $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
   				        
				$args = array( 'post_type' => 'cpt_events',
							   'post_status' => 'published',
							   'order' => 'ASC',
                              'orderby' => 'meta_value',
                              'meta_type' => 'DATETIME',
							   'posts_per_page' => 5,
                              'paged' => $paged,
                               'meta_query' => array(
                                    array(
                                        'key' => 'event_start_date',
                                        'value' => date( 'Y-m-d' ),
                                        'compare' => '>='
                                    )
                                )
                             );
				$upcoming_events = new WP_Query($args);	
                    
                // Pagination Fix
                global $wp_query;
                $temp_query = $wp_query;
                $wp_query = NULL;
                $wp_query = $upcoming_events;
                    
				?>
                    
                <div class="page_content full"> 
               <table id="bloglist"> 
                        <thead>
                            <tr>
                                <th colspan="4" class="heading">Upcoming Events</th>
                            </tr>
                            <tr> 
                                <th scope="col" class="title">Event Date</th> 
                                <th scope="col" class="title">Title</th> 
                                <th scope="col" class="excerpt">Description</th> 
                                <th scope="col" class="replys">Map</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
         	   
      	    	<?php if ($upcoming_events->have_posts()) : ?>
      	      	<?php while ($upcoming_events->have_posts()) : $upcoming_events->the_post(); ?>
                    <?php $date = date( 'M j, Y', strtotime( get_field( 'event_start_date' ) ) ); ?>
                                <tr> 
                                        <td class="posted_on"><?php echo $date; ?><?php echo ( get_field( 'event_start_time' ) !== '' ? ' - ' . get_field( 'event_start_time' ) : '' ); ?></td> 
                                        <td class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td> 
                                        <td class="excerpt"><?php echo (strip_tags(trim(get_the_excerpt()))); ?></td>
                                        <td class="replys">
                                            <?php if ( get_post_meta( $post->ID, 'map', true ) !== '' ) : ?>
                                                <a href="<?php echo get_post_meta($post->ID, 'map', true); ?>">View</a>
                                            <?php endif; ?>
                                        </td> 
                                </tr> 
                    <?php endwhile; // end of the loop. ?>
                    
                    <?php else : ?>
                            
                    <td>No Upcoming Events</td>
						
                    <?php endif; ?>
                    
                        </tbody> 
                    </table> 
                    
                    <?php
                    
                    echo paginate_links( array( 
                        'current' => get_query_var( 'paged' ), // Despite being on the Home Page, since we are in a Custom Loop we use 'paged'
                    ) );
                    
                    wp_reset_postdata();
    
                    // Reset main query object after Pagination is done.
                    $wp_query = NULL;
                    $wp_query = $temp_query;
                    
                    ?>
                            
                    <?php
                    
                    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

                    $args = array( 'post_type' => 'cpt_events',
                                   'post_status' => 'published',
                                   'order' => 'DESC',
                                  'orderby' => 'meta_value',
                                  'meta_type' => 'DATETIME',
                                   'posts_per_page' => 5,
                                  'paged' => $paged,
                                   'meta_query' => array(
                                        array(
                                            'key' => 'event_start_date',
                                            'value' => date( 'Y-m-d' ),
                                            'compare' => '<'
                                        )
                                    )
                                 );
                    $past_events = new WP_Query($args);		
                    
                    // Pagination Fix
                    global $wp_query;
                    $temp_query = $wp_query;
                    $wp_query = NULL;
                    $wp_query = $past_events;
                    ?>
                    
                    <table id="bloglist"> 
                        <thead>
                            <tr>
                                <th colspan="4" class="heading">Past Events</th>
                            </tr>
                            <tr> 
                                <th scope="col" class="title">Event Date</th> 
                                <th scope="col" class="title">Title</th> 
                                <th scope="col" class="excerpt">Description</th> 
                                <th scope="col" class="replys">Map</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            
                            <?php if ($past_events->have_posts()) : ?>
                            <?php while ($past_events->have_posts()) : $past_events->the_post(); ?>
                                <?php $date = date( 'M j, Y', strtotime( get_field( 'event_start_date' ) ) ); ?>
                                        <tr> 
                                                <td class="posted_on"><?php echo $date; ?><?php echo ( get_field( 'event_start_time' ) !== '' ? ' - ' . get_field( 'event_start_time' ) : '' ); ?></td> 
                                                <td class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td> 
                                                <td class="excerpt"><?php echo (strip_tags(trim(get_the_excerpt()))); ?></td>
                                                <td class="replys">
                                                    <?php if ( get_post_meta( $post->ID, 'map', true ) !== '' ) : ?>
                                                        <a href="<?php echo get_post_meta($post->ID, 'map', true); ?>">View</a>
                                                    <?php endif; ?>
                                                </td> 
                                        </tr> 
                            <?php endwhile; // end of the loop. ?>

                            <?php endif; ?>
                    
                        </tbody> 
                    </table> 
                    
                    <?php
                    
                    echo paginate_links( array( 
                        'current' => get_query_var( 'paged' ), // Despite being on the Home Page, since we are in a Custom Loop we use 'paged'
                    ) );
                    
                    wp_reset_postdata();
    
                    // Reset main query object after Pagination is done.
                    $wp_query = NULL;
                    $wp_query = $temp_query;
                    
                    ?>
 
											
					</div> <!-- end .page_content.full --> 
                  
				
               
			<div class="hr"><hr /></div> 
					
						
					
				</div> <!-- end #section_main --> 
                
           
<?php get_footer(); ?>