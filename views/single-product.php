<style>
    .dropdown {
        display: none;
    }
</style>
<div class="content">
    <div class="container">
        <div class="single-product">
            <div class="row">
                <div class="col-6">
                    <div class="product-img-section">
                        <div class="product-img">
                            <img class="<?php echo $product['hot'] ?>" src="<?php echo $product['product_img'] ?>"
                                alt="Product img">
                        </div>
                        <div class="more-photo">
                            <div class="row content-center">
                                <div class="col-2">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-1.jpg" alt="Product img">
                                </div>
                                <div class="col-2">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-2.jpg" alt="Product img">
                                </div>
                                <div class="col-2">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-3.jpg" alt="Product img">
                                </div>
                                <div class="col-2">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-4.jpg" alt="Product img">
                                </div>
                                <div class="col-2">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-5.jpg" alt="Product img">
                                </div>
                                <div class="col-2">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-6.jpg" alt="Product img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row row-spacing">
                        <div class="col-auto">
                            <div class="product-content bg-white">
                                <div class="product-title display-flex space-between">
                                    <h2 href="#">
                                        <?php echo $product['product_name'] ?>
                                    </h2>
                                </div>
                                <div class="product-description">
                                    <div class="product-info">
                                        <p class="text">
                                            <?php echo $product['short_description'] ?>
                                        </p>

                                    </div>

                                    <div class="read-more">
                                        <a href="#" class="scheme-dark">
                                            More ↓
                                            <!-- Less -->
                                        </a>
                                    </div>

                                </div>
                                <div class="block-purchase display-flex gap col-right content-center">
                                    <div class="block-price display-flex gap-5 content-center">
                                        <p class="text">Price:</p>
                                        <p class="price">
                                            <?php echo $product['product_cost'] ?>
                                        </p>

                                    </div>
                                    <div class="add-to-cart">
                                        <a class="btn" href="#">Add to cart </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto">
                            <div class="delivery bg-white">
                                <div class="block-title">
                                    <h5>Delivery</h5>
                                </div>
                                <div class="delivery-description">
                                    <p class="text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nulla, sit, atque
                                        ullam sunt facere, laborum officiis facilis reprehenderit quas fugiat adipisci.
                                        Fugiat vero consequatur perspiciatis, harum quam nihil corporis!
                                    </p>
                                </div>

                                <div class="shiping-system display-flex content-center gap-5">
                                    <span>Shipping System:</span>
                                    <img src="<?php get_url() ?>views/img/svg/footer/shipping/dhl.svg" alt>
                                    <img src="<?php get_url() ?>views/img/svg/footer/shipping/dpd.svg" alt>
                                    <img src="<?php get_url() ?>views/img/svg/footer/shipping/fedex.svg" alt>
                                    <img src="<?php get_url() ?>views/img/svg/footer/shipping/paypal.svg" alt>
                                </div>
                            </div>

                        </div>

                        <div class="col-auto">
                            <div class="warranty bg-white">
                                <div class="block-title">
                                    <h5>Warranty</h5>
                                </div>
                                <div class="warranty-description">
                                    <p class="text">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nulla, sit, atque
                                        ullam sunt facere, laborum officiis facilis reprehenderit quas fugiat adipisci.
                                        Fugiat vero consequatur perspiciatis, harum quam nihil corporis!
                                    </p>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>