<?php

get_header(); ?>
			

	<!-- Page --> 
	
	<div id="page_wrapper_outer"> 
		<div id="page_wrapper"> 
			<div id="page"> 
				
				<div id="section_main" class="inner_page"> 
					
					<h1 class="two_col">The Mount Hope Community Church Staff</h1>
					
                    <?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				
					?>
                
					<div class="hr"><hr /></div> 
					
					<div id="nav_sub">                         
                        <?php get_sidebar(); ?>
					</div> 
                    
                   <div class="page_content full"> 
                   <table id="bloglist"> 
							<thead> 
								<tr> 
									<th scope="col" class="posted_on">Photo</th> 
									<th scope="col" class="title">Name</th>
									<th scope="col" class="replys">Title</th> 
									<th scope="col" class="excerpt">Bio</th> 
								</tr> 
							</thead> 
							<tbody> 
							<?php
								$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array('paged' => $paged, 'post_type' => 'staff', 'orderby' => 'id', 'order' => 'ASC');
								query_posts($args);		
                            ?>
                           
                            <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <tr> 
                                        <td class="posted_on"><?php the_post_thumbnail(array(130,100)); ?> </td> 
                                        <td class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                                        <td class="replys"><?php echo get_post_meta($post->ID, 'ct_Staff_titl_text_e7a9', true); ?></td> 
                                        <td class="excerpt"><?php echo (strip_tags(trim(get_the_excerpt()))); ?>...</td> 
                                </tr> 
                                
                    <?php endwhile; // end of the loop. ?>
                    
                    
                    <?php endif; ?>
                    
                   
                    
							</tbody> 
						</table> 
					<?php if ( $wp_query->max_num_pages > 1 ) : ?>
					<?php 
                    $nextposts = get_next_posts_link( __( '&larr; Older posts', 'faded' ) ); 
                    $prevposts = get_previous_posts_link( __( 'Newer posts &rarr;', 'faded' ) ); 
                    $nextposts = split('"',$nextposts);
                    $prevposts = split('"',$prevposts);
                    ?>
                    <!-- Pagination -->
                        <div class="pagination">
                            <?php if ($prevposts[1]) { ?>
                            <a href="<?php echo $prevposts[1]; ?>" class="prev">Prev</a>
                            <?php } else { ?>
                            <!--show no link-->
                            <?php } 
                            if ($nextposts[1]) { ?>
                            <a href="<?php echo $nextposts[1]; ?>" class="next">Next</a>
                            <?php } else{ ?>
                            <!--show no link-->
                            <?php } ?>
                        </div>
                    
            		<?php endif; ?>
											
					</div> <!-- end .page_content.full --> 
                  
				
               
			<div class="hr"><hr /></div> 
					
						
					
				</div> <!-- end #section_main --> 
           
<?php get_footer(); ?>