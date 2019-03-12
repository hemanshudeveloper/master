<?php
$user = $this->session->userdata('userId');
if (!empty($user)) {
    ?>
<?php $this->load->view('shopper/include/header'); ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php $this->load->view('shopper/include/sidebar'); ?>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">WishList Items</h2>

                    <?php
                    foreach ($products as $product) {
                        ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?php echo base_url(); ?>uploads/<?php echo $product->p_img; ?>" alt="" />
                                        <h2>$<?php echo $product->p_price ?></h2>
                                        <p><?php echo $product->p_nm ?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$<?php echo $product->p_price ?></h2>
                                            <p><?php echo $product->p_nm ?></p>
                                            <a href="<?php echo base_url(); ?>client/product_detail/<?php echo $product->p_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a style="color: red;" href="<?php echo base_url();?>client/remove_wishlist?id=<?php echo $product->id;?> "><i class="fa fa-plus-square"></i>Remove wishlist</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>								
                        <?php
                    }
                    ?>
                    <div style="clear:both"></div>

                        <?php // echo $links; ?>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('shopper/include/footer'); ?>
  <?php
} else {
    redirect('users/login'); 
}
?>