<div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="container">
            <div class="cart-items">
                <div class="cart-items-inner">
                    <span class="top_carted_list">
                    </span>
                    <div class="media">
                        <p class="pull-right item-price shopping-cart__total"></p>
                        <div class="media-body">
                            <h4 class="media-heading item-title summary">
                                <?php echo translate('subtotal');?>
                            </h4>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div>														 <a href="<?php echo base_url(); ?>home/category" class="btn btn-theme-dark">                                    <?php echo translate('continue_shopping');?>                                </a>
                               <!--
                                -->
                                <a href="<?php echo base_url(); ?>home/cart_checkout" class="btn  btn-theme-transparent btn-call-checkout">
                                    <?php echo translate('checkout');?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>