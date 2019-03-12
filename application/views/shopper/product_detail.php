<?php $this->load->view('shopper/include/header'); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php $this->load->view('shopper/include/sidebar'); ?>
            </div>

            <div class="col-sm-9 padding-right">


                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?php echo base_url(); ?>uploads/<?php echo $products->p_img; ?>" alt="" />

                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->

                            <h2><b>Name: </b><?php echo $products->p_nm; ?></h2>
                            <p><b>Category:</b> <?php echo $products->cat_nm; ?></p>
                            <p><b>Price: </b>$<?php echo $products->p_price; ?></p>
                            <p><b>Description:</b> <?php echo $products->p_desc; ?></p>
                            <br/>
                            <?php
                            $cartContents = $this->cart->contents();
                            $is_cart = 0;
                            foreach ($cartContents as $items) {
                                if ($items['id'] == $products->p_id) {
                                    $is_cart = 1;
                                    break;
                                }
                            }
                            if ($is_cart == 0) {
                                ?>
                                <a href="<?php echo base_url(); ?>client/product_cart?id=<?php echo $products->p_id; ?>"><button type="button" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button></a>

                            <?php } else {
                                ?>
                            <h4>Allready Added to <a href="<?php echo base_url('client/product_cart'); ?>">Cart</a></h4>
                                <?php
                            }
                            ?>
                            

                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->



                <div class="recommended_items"><!--recommended_items-->
                    <!--<h2 class="title text-center">recommended items</h2>
                    
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                    <div class="item active">	
                                            <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                            <div class="single-products">
                                                                    <div class="productinfo text-center">
                                                                            <img src="images/home/recommend1.jpg" alt="" />
                                                                            <h2>$56</h2>
                                                                            <p>Easy Polo Black Edition</p>
                                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                            <div class="single-products">
                                                                    <div class="productinfo text-center">
                                                                            <img src="images/home/recommend2.jpg" alt="" />
                                                                            <h2>$56</h2>
                                                                            <p>Easy Polo Black Edition</p>
                                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                            <div class="single-products">
                                                                    <div class="productinfo text-center">
                                                                            <img src="images/home/recommend3.jpg" alt="" />
                                                                            <h2>$56</h2>
                                                                            <p>Easy Polo Black Edition</p>
                                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="item">	
                                            <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                            <div class="single-products">
                                                                    <div class="productinfo text-center">
                                                                            <img src="images/home/recommend1.jpg" alt="" />
                                                                            <h2>$56</h2>
                                                                            <p>Easy Polo Black Edition</p>
                                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                            <div class="single-products">
                                                                    <div class="productinfo text-center">
                                                                            <img src="images/home/recommend2.jpg" alt="" />
                                                                            <h2>$56</h2>
                                                                            <p>Easy Polo Black Edition</p>
                                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                            <div class="single-products">
                                                                    <div class="productinfo text-center">
                                                                            <img src="images/home/recommend3.jpg" alt="" />
                                                                            <h2>$56</h2>
                                                                            <p>Easy Polo Black Edition</p>
                                                                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                              </a>			
                            </div>-->
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

<?php $this->load->view('shopper/include/footer'); ?>