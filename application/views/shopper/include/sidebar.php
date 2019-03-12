<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<?php
							foreach($categorys as $category)
							{
								?>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="<?php echo base_url(); ?>client/category_product/<?php echo $category->cat_id; ?>"><?php echo $category->cat_nm; ?></a></h4>
									</div>
								</div>		
								<?php
							}
							?>
							
						</div><!--/category-products-->	
					
					</div>