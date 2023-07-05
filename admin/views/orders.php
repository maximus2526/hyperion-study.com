<form class="orders-form" action="?action=delete-orders" method="post">
    <div class="page-header">
        <div class="block-title display-flex gap align-center">
            <h5 class="title">Home - orders</h5>
            <div class="operation-icons display-flex">
                <button class="delete-btn" type="submit"><img
                        src="<?php get_url() ?><?php echo get_url() ?>/admin/views/img/svg/minus.svg" alt=""></button>
            </div>

        </div>
    </div>
    <div class="orders scheme-dark">
        <?php
        Errors::display();
        if ($count_of_orders >= 1):
            ?>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Total Price</th>
                    <th>Address</th>
                    <th>Notes</th>
                    <th>Operations</th>
                </tr>

                <?php
                foreach ($orders as $order):
                    ?>
                    <tr class="table-content desing-bordered">
                        <td>
                            <?php echo $order['order_id'] ?>
                        </td>
                        <td>
                            <?php echo $order['order_date'] ?>
                        </td>

                        <td>
                            <p class="price">
                                <?php echo $order['total_price'] ?>
                            </p>
                        </td>
                        <td>
                            <p class="text">
                                <?php echo $order['address'] ?>
                            </p>
                        </td>
                        <td>
                            <p class="text">
                                <?php echo $order['notes'] ?>
                            </p>
                        </td>
                        <td>
                            <span class="display-flex content-center gap">
                                <a href="?action=order&order-id=<?php echo $order['order_id'] ?>">More</a>
                                <input type="checkbox" name="orders_to_delete[]" value="<?php echo $order['order_id'] ?>">
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
            <div class="arrow-left">
                <a
                    href="<?php echo get_url() ?>/admin/?action=orders&<?php echo get_param_query(['page_num' => $_GET['page_num'] <= 1 ? 1 : $_GET['page_num'] - 1]); ?>">
                    <img src="<?php get_url() ?><?php echo get_url() ?>/admin/views/img/svg/page-arrow/arrow-left.svg" alt>
                </a>
            </div>
            <?php
            foreach ($pages as $pagenum):
                ?>
                <div class="pagination-button <? echo $pagenum == $_GET['page_num'] ? 'active' : '' ?> scheme-light">
                    <a
                        href="<?php echo get_url() ?>/admin/?action=orders&<?php echo get_param_query(['page_num' => $pagenum]); ?>"><?php echo $pagenum ?></a>
                </div>
                <?php
            endforeach;
            ?>

            <div class="arrow-right scheme-dark">
                <a class="display-flex"
                    href="<?php echo get_url() ?>/admin/?action=orders&<?php echo get_param_query(['page_num' => $_GET['page_num'] < end($pages) ? $_GET['page_num'] + 1 : $_GET['page_num']]); ?>">
                    <p class="text">Next</p>
                    <img src="<?php get_url() ?>/admin/views/img/svg/page-arrow/arrow-right.svg" alt>
                </a>
            </div>
        </div>
    <?php endif; ?>

</form>