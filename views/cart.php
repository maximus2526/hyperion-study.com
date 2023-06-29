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
                        <div class="row">
                            <div class="col-6">
                                <span class="input-wrapper display-flex column">
                                    <label for="first-name" class="">First name&nbsp;<abbr class="required"
                                            title="required">*</abbr></label>
                                    <input type="text" class="input-text" name="first-name" id="first-name"
                                        placeholder="" value="" autocomplete="given-name" required>
                                </span>
                            </div>
                            <div class="col-6">
                                <span class="input-wrapper display-flex column">
                                    <label for="last-name" class="">Last name&nbsp;<abbr class="required"
                                            title="required">*</abbr></label>
                                    <input type="text" class="input-text" name="last-name" id="last-name" placeholder=""
                                        value="" autocomplete="family-name" required>
                                </span>
                            </div>


                        </div>

                        <span class="input-wrapper display-flex column">
                            <label for="email" class="">Email&nbsp;<abbr class="required"
                                    title="required">*</abbr></label>
                            <input type="text" class="input-text" name="email" id="email" placeholder="" value=""
                                autocomplete="email" required>
                        </span>
                        <span class="input-wrapper display-flex column">
                            <label for="address" class="">Address&nbsp;<abbr class="required"
                                    title="required">*</abbr></label>
                            <input type="text" class="input-text" name="address" id="address" placeholder="" value=""
                                autocomplete="address-line1" required>
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
                        <div class="checkout-order-review">
                            <div class="products-review  display-flex column gap">
                                <?php
                                if ($is_cart_empty):
                                    Errors::add_error("Don't have any added products!");
                                else:
                                    foreach ($products as $product): ?>
                                        <div class="product design-bordered bg-white display-flex">
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
                                                        <div class="product-count display-flex space-between">
                                                            <input type="number" name="product-count" min="1" max="100"
                                                                value="<?php echo $_GET['product-count'] ? $_GET['product-count'] : 1; ?>">
                                                            <a
                                                                href="/?action=cart&product-count=<?php echo $_GET['product-count'] ? $_GET['product-count'] : 1; ?>">Update</a>
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
                                        <p class="price size-l">
                                        <?php echo $total_price ?>
                                    </p>
                                    <input type="hidden" name="total-price" value="<?php echo $total_price ?>">
                                </div>

                            </div>
                            <?php endif; ?>
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
                                            name="payment-method" value="on-delivery" data-order_button_text="">
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
                                            name="delivery-method" value="ukr" data-order_button_text="">
                                        <label for="delivery-method-ukr">
                                            Ukr Delivery </label>
                                    </span>
                                </div>
                            </div>
                            <div class="personal-agree">
                                <div class="style-bordered">
                                    Your personal data will be used to process your order, support your experience
                                    throughout this website, and for other purposes described in our privacy policy.
                                </div>
                                <div class="agree-input display-flex gap">
                                    <input id="agree-terms" type="checkbox" name="agree-terms">
                                    <label for="agree-terms">I have read and agree to the website <a href>terms and
                                            conditions</a> &nbsp;<abbr class="required"
                                            title="required">*</abbr></label>
                                </div>
                            </div>

                            <button class="place-order btn bold" type="submit">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>