<form class="products-form" action="?action=delete-products" method="post">
    <div class="page-header">
        <div class="block-title display-flex gap align-center">
            <h5 class="title">Home - Products</h5>
            <div class="operation-icons display-flex">
                <a href="/admin/?action=add-product"><img
                        src="<?php get_url() ?><?php echo get_url() ?>/admin/views/img/svg/plus.svg" alt=""></a>
                <button class="delete-btn" type="submit"><img
                        src="<?php get_url() ?><?php echo get_url() ?>/admin/views/img/svg/minus.svg" alt=""></button>
            </div>

        </div>
    </div>
    <div class="products scheme-dark">
        <?php
        Errors::display();
        if ($count_of_products >= 1):
            ?>
            <table>
                <tr>
                    <th>Product Image</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Operation</th>
                </tr>

                <?php

                foreach ($products as $product):

                    ?>
                    <tr class="table-content desing-bordered">
                        <td><img class="product-img" src="<?php echo $product['product_img'] ?>" alt="product's img"></td>
                        <td>
                            <?php echo $product['product_id'] ?>
                        </td>
                        <td>
                            <a href="/?action=product&product-id=<?php echo $product['product_id'] ?>"><?php echo $product['product_name'] ?></a>

                        </td>

                        <td>
                            <p class="price">
                                <?php echo $product['product_cost'] ?>
                            </p>
                        </td>
                        <td>
                            <span class="display-flex content-center gap">
                                <a href="?action=update-product&product-id=<?php echo $product['product_id'] ?>">Edit</a>
                                <input type="checkbox" name="products_ids[]" value="<?php echo $product['product_id'] ?>">
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php
        endif;
        ?>
    </div>

    <?php if (count($pages) > 1): ?>
        <div class="pagination display-flex content-center gap">
        
            <?php
            foreach ($pages as $pagenum):
                ?>
                <div class="pagination-button <? echo $pagenum == $_GET['page_num'] ? 'active' : '' ?> scheme-light">
                    <a
                        href="<?php echo get_url() ?>/admin/?<?php echo get_param_query(['page_num' => $pagenum]); ?>"><?php echo $pagenum ?></a>
                </div>
                <?php
            endforeach;
            ?>

        
        </div>
    <?php endif; ?>

</form>