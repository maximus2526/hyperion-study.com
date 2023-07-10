<style>
    .dropdown {
        display: none;
    }
</style>
<div class="content">
    <?php
    Errors::display();
    ?>
    <div class="container">
        <div class="shop-heading size-s opacity-50 scheme-dark display-flex align-center space-between">
            <ul class="breadcrumb display-flex ">
                <li><a href="/">Home</a></li>
                <li><a href="/?action=shop">Shop</a></li>
            </ul>

            <div class="products-on-page">
                <p class="size-s">Showing 1-
                    <?php echo $products_limit ?> of
                    <?php echo $count_of_products ?> results
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="side-bar scheme-dark">
                    <div class="category-block">
                        <div class="block-title design-bordered">
                            <p class="title">Category</p>
                        </div>
                        <div class="categories">
                            <ul class="side-bar-list size-s opacity-80">
                                <li><a href="#">Smartphones</a></li>
                                <li><a href="#">Drone</a></li>
                                <li><a href="#">Clothes</a></li>
                                <li><a href="#">Furniture</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="price-block">
                        <div class="block-title design-bordered">
                            <p class="title">Price</p>
                        </div>
                        <div class="price-range">
                            <div class="price-picker">
                                <div class="passive">
                                    <div class="active">
                                        <div class="choise-circle left"></div>
                                        <div class="choise-circle right"></div>
                                    </div>
                                </div>
                            </div>
                            <p class="size-s">Price $ 30 - $ 2300</p>
                        </div>
                    </div>
                    <div class="brand-block">
                        <div class="block-title design-bordered">
                            <p class="title">Brand</p>
                        </div>
                        <div class="categories">
                            <ul class="side-bar-list size-s opacity-80">
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Dji</a></li>
                                <li><a href="#">Samsung</a></li>
                                <li><a href="#">Xiaomi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="color-block">
                        <div class="block-title design-bordered">
                            <p class="title">Color</p>
                        </div>
                        <div class="colors-section">
                            <div class="circle black"></div>
                            <div class="circle white active"></div>
                            <div class="circle gray"></div>
                            <div class="circle green"></div>
                            <div class="circle red"></div>
                            <div class="circle orange"></div>
                        </div>
                    </div>
                    <div class="best-choise-block">
                        <div class="block-title design-bordered">
                            <p class="title">Best Choise</p>
                        </div>
                        <div class="products ">
                            <div class="product design-horizontal bg-white">
                                <div class="product-img">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-20.jpg"
                                        alt="Product img">
                                </div>

                                <div class="product-content">
                                    <a href="#">Eta Lite
                                        - Gas Stove</a>
                                    <p class="price">$
                                        000</p>
                                </div>
                            </div>
                            <div class="product design-horizontal bg-white">
                                <div class="product-img">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-21.jpg"
                                        alt="Product img">
                                </div>

                                <div class="product-content">
                                    <a href="#">Eta Lite
                                        - Gas Stove</a>
                                    <p class="price">$
                                        000</p>
                                </div>
                            </div>
                            <div class="product design-horizontal bg-white">
                                <div class="product-img">
                                    <img src="<?php get_url() ?>views/img/products/hyperion-product-img-22.jpg"
                                        alt="Product img">
                                </div>

                                <div class="product-content">
                                    <a href="#">Eta Lite
                                        - Gas Stove</a>
                                    <p class="price">$
                                        000</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tags-block">
                        <div class="block-title design-bordered">
                            <p class="title">Tags</p>
                        </div>
                        <div class="tags display-flex gap">
                            <a class="tag" href="#">Electric</a>
                            <a class="tag" href="#">Decore</a>
                            <a class="tag" href="#">Home</a>
                            <a class="tag" href="#">Garden</a>
                            <a class="tag" href="#">Clothes</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="shop-heading display-flex content-center scheme-dark">
                    <div class="block-title "> 
                        <h4 class="title">Shop</h4>
                    </div>
                    <div class="text-right display-flex align-center gap">
                        <span class="sort-by-order size-s opacity-80 display-flex gap-5">
                            <a
                                href="/?<?php echo get_param_query(['by-name' => isset($_GET['by-name']) ? ($_GET['by-name'] == 'DESC' ? 'ASC' : 'DESC') : 'DESC']); ?>">
                                <?php echo isset($_GET['by-name']) ? ($_GET['by-name'] == 'DESC' ? 'Name ↓' : 'Name ↑') : 'Name'; ?>
                            </a>
                            <a
                                href="/?<?php echo get_param_query(['by-price' => isset($_GET['by-price']) ? ($_GET['by-price'] == 'DESC' ? 'ASC' : 'DESC') : 'DESC']); ?>">
                                <?php echo isset($_GET['by-price']) ? ($_GET['by-price'] == 'DESC' ? 'Price ↓' : 'Price ↑') : 'Price'; ?>
                            </a>
                            <a
                                href="/?<?php echo get_param_query(['by-date' => isset($_GET['by-date']) ? ($_GET['by-date'] == 'DESC' ? 'ASC' : 'DESC') : 'DESC']); ?>">
                                <?php echo isset($_GET['by-date']) ? ($_GET['by-date'] == 'DESC' ? 'Date ↓' : 'Date ↑') : 'Date'; ?>
                            </a>



                        </span>
                        <span class="show-more">
                            <p class="size-s opacity-80">
                                Show:
                                <a href="/?<?php echo get_param_query(['count_of_products' => 12]); ?>">12</a>
                                <a href="/?<?php echo get_param_query(['count_of_products' => 16]); ?>">16</a>
                                <a href="/?<?php echo get_param_query(['count_of_products' => 20]); ?>">20</a>
                                <a href="/?<?php echo get_param_query(['count_of_products' => 24]); ?>">24</a>
                            </p>
                        </span>
                        <span class="show-more-icons display-flex">
                            <a href="<?php echo get_url() ?>?<?php echo get_param_query(['layout' => 'col-6']); ?>"><img
                                    src="<?php get_url() ?>views/img/sort/2x2.png" alt></a>
                            <a href="<?php echo get_url() ?>?<?php echo get_param_query(['layout' => 'col-4']); ?>"><img
                                    src="<?php get_url() ?>views/img/sort/3x3.png" alt></a>
                            <a href="<?php echo get_url() ?>?<?php echo get_param_query(['layout' => 'col-3']); ?>"><img
                                    src="<?php get_url() ?>views/img/sort/4x4.png" alt></a>
                        </span>

                    </div>
                </div>

                <div class="products">
                    <div class="row content-center row-spacing ">
                        <?php foreach ($products as $product): ?>
                            <div class="<?php echo isset($_GET["layout"]) ? $_GET["layout"] : "col-3" ?>  scheme-dark">
                                <div class="product <?php echo ($product['hot'] == 1 ? "hot" : "") ?>">
                                    <div class="product-img">
                                        <img src="<?php echo $product['product_img'] ?>" alt="product's img">
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title display-flex">
                                            <a href="<?php get_url() ?>?action=product&product-id=<?php echo $product['product_id'] ?>"
                                                class="product-title">
                                                <?php echo $product['product_name'] ?>
                                            </a>
                                            <a class="btn text-right"
                                                href="/?action=add-to-cart&product-id=<?php echo $product['product_id'] ?>"><img
                                                    src="views/img/svg/plus.svg" alt=""></a>
                                        </div>
                                        <div class="price-block">
                                            <p class="price">
                                                <?php echo $product['product_cost'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if (count($pages) > 1): ?>
                    <div class="pagination display-flex content-center gap">
                        <div class="arrow-left">
                            <a
                                href="<?php echo get_url() ?>?<?php echo get_param_query(['page_num' => $_GET['page_num'] <= 1 ? 1 : $_GET['page_num'] - 1]); ?>">
                                <img src="<?php get_url() ?>views/img/svg/arrow-3/arrow-left.svg" alt>
                            </a>
                        </div>
                        <?php
                        foreach ($pages as $pagenum):
                            ?>
                            <div
                                class="pagination-button <? echo $pagenum == $_GET['page_num'] ? 'active' : '' ?> scheme-light">
                                <a href="<?php echo get_url() ?>?<?php echo get_param_query(['page_num' => $pagenum]); ?>"><?php echo $pagenum ?></a>
                            </div>
                            <?php
                        endforeach;
                        ?>

                        <div class="arrow-right scheme-dark">
                            <a class="display-flex"
                                href="<?php echo get_url() ?>?<?php echo get_param_query(['page_num' => $_GET['page_num'] < end($pages) ? $_GET['page_num'] + 1 : $_GET['page_num']]); ?>">
                                <p class="text">Next</p>
                                <img src="<?php get_url() ?>views/img/svg/arrow-3/arrow-right.svg" alt>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>