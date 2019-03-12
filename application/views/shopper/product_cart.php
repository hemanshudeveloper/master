<?php
$user = $this->session->userdata('userId');
if (!empty($user)) {
    ?>
<?php
$this->load->view('shopper/include/header');
//print_r($this->session->userdata('cart_products'));
//print_r($cartContents);
?>

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>

                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td> 
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cartContents = $this->cart->contents();
//                                        print_r($cartContents);
//                                        echo $cartContents['rowid']['id'];
//                                        exit;
                    foreach ($cartContents as $items) {
                        ?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="<?php echo base_url(); ?>uploads/<?php echo $items['options']['img']; ?>" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""><?php echo $items['name']; ?></a></h4>

                            </td>
                            <td class="cart_price">
                                <p><?php echo $items['price']; ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <?php echo form_open('client/cart_update'); ?>
                                    <input type="hidden" name="rowid" value="<?echo $items['rowid']; ?>">
                                    <input class="cart_quantity_input" type="number" min="1" name="qty" value="<?php echo $items['qty']; ?>" autocomplete="off" size="2">
                                    <button><i class="fa fa-refresh"></i></button>
                                    <?php echo form_close(); ?>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php echo $items['subtotal'] ?></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="<?php echo base_url(); ?>client/cart_delete?rowid=<?php echo $items['rowid']; ?>"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php unset($items['rowid']); ?>
                        <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<?php
$this->load->view('shopper/include/footer');
?>
    <?php
} else {
    redirect('users/login'); 
}
?>

