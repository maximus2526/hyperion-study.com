<style>
    .dropdown {
        display: none;
    }
</style>

<div class="content">
    <div class="container">
        <form action="/?action=post-order" method="post" class="checkout">
            <div class="row">
                <div class="col-6 col-md-12">
                    <div class="billing-details">
                        <div class="block-title">
                            <h3 class="title">BILLING DETAILS</h3>
                        </div>
                        <span class="input-wrapper display-flex column">
                            <label for="first-name" class="">First name&nbsp;<abbr class="required"
                                    title="required">*</abbr></label>
                            <input type="text" class="input-text" name="first-name" id="first-name"
                                placeholder="" value="" autocomplete="given-name" required>
                        </span>
                        <span class="input-wrapper display-flex column">
                            <label for="last-name" class="">Last name&nbsp;<abbr class="required"
                                    title="required">*</abbr></label>
                            <input type="text" class="input-text" name="last-name" id="last-name"
                                placeholder="" value="" autocomplete="family-name" required>
                        </span>
                        <span class="input-wrapper display-flex column">
                            <label for="email" class="">Email&nbsp;<abbr class="required"
                                    title="required">*</abbr></label>
                            <input type="text" class="input-text" name="email" id="email" placeholder=""
                                value="" autocomplete="email" required>
                        </span>
                        <span class="input-wrapper display-flex column">
                            <label for="address" class="">Address&nbsp;<abbr class="required"
                                    title="required">*</abbr></label>
                            <input type="text" class="input-text" name="address" id="address"
                                placeholder="" value="" autocomplete="address-line1" required>
                        </span>
                        <span class="input-wrapper display-flex column">
                            <label for="notes" class="">Order notes&nbsp;<span
                                    class="optional">(optional)</span></label>
                            <textarea name="notes" class="input-text " id="notes"
                                placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"
                                spellcheck="false"></textarea>
                        </span>

                    </div>
                </div>
                <div class="col-6 col-md-12">
                    <div class="order">
                        <div class="block-title">
                            <h3 class="title">YOUR ORDER</h3>
                        </div>
                        <?php

                        Errors::display();

                        ?>
                        <div class="checkout-order-review display-flex column gap">
                            <div class="products-review">
                                <?php

                                foreach ($products as $product): ?>
                                    <div class="product bg-white display-flex">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="product-img">
                                                    <img src="<?php echo $product["product_img"] ?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="product-info">

                                                    <div class="product-name">
                                                        <p class="title bold">
                                                            <?php echo $product['product_name'] ?>
                                                        </p>
                                                    </div>
                                                    <div class="product-count">
                                                        <input type="number" name="product-count" min="1" max="100" value="1">
                                                    </div>
                                                    <div class="delete-product">
                                                        <a
                                                            href="/?action=cart&delete_product=<?php echo $product["product_id"] ?>">Delete</a>
                                                    </div>
                                                    <div class="product-price text-right">
                                                        <p class="price">
                                                            <?php echo $product['product_cost'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                <?php endforeach ?>

                            </div>

                            <div class="total-price display-flex space-between align-center">
                                <div class="block-title">
                                    <p class="title bold">Total</p>
                                </div>
                                <div class="total">
                                    <p class="price"><?php echo $total_price ?></p>
                                    <input type="hidden" name="total-price" value="<?php echo $total_price ?>">
                                </div>

                            </div>

                            <div class="payment-method">
                                <div class="block-title">
                                    <h3 class="title">Payment-method</h3>
                                </div>
                                <div class="payment-inputs">
                                    <span class="input-wrapper display-flex gap">
                                        <input id="payment-method-direct" type="radio" class="input-radio"
                                            name="payment-method" value="direct" checked="checked"
                                            data-order_button_text="">
                                        <label for="payment-method-direct">
                                            Direct bank transfer </label>
                                    </span>
                                    <span class="input-wrapper display-flex gap">
                                        <input id="payment-method-on-delivery" type="radio" class="input-radio"
                                            name="payment-method" value="on-delivery"
                                            data-order_button_text="">
                                        <label for="payment-method-on-delivery">
                                            Cash on delivery </label>
                                    </span>
                                </div>
                            </div>
                            <div class="delivery-method">
                                <div class="block-title">
                                    <h3 class="title">Delivery-method</h3>
                                </div>
                                <div class="delivery-inputs">
                                    <span class="input-wrapper display-flex gap">
                                        <input id="delivery-method-nova" type="radio" class="input-radio"
                                            name="delivery-method" value="nova" checked="checked"
                                            data-order_button_text="">
                                        <label for="delivery-method-nova">
                                            Nova-Poshta </label>
                                    </span>
                                    <span class="input-wrapper display-flex gap">
                                        <input id="delivery-method-ukr" type="radio" class="input-radio"
                                            name="delivery-method" value="ukr"
                                            data-order_button_text="">
                                        <label for="delivery-method-ukr">
                                            Ukr Delivery </label>
                                    </span>
                                </div>
                            </div>
                            <button type="submit">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>