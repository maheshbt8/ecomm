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
                            <div>
                                <span class="btn btn-theme-dark" data-dismiss="modal">
                                    <?php echo translate('close');?>
                                </span><!--
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


<div id="popup-cart1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>