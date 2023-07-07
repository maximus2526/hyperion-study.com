<div class="container">
    <h3 class='title'>Order Details</h3>

    <table class="order-details">
        <tr>
            <th>Order ID:</th>
            <td>
                
                <?php echo $order['order_id']; 
                ?>
            </td>
        </tr>
        <tr>
            <th>Order Date:</th>
            <td>
                <?php echo $order['order_date']; ?>
            </td>
        </tr>
        <tr>
            <th>First Name:</th>
            <td>
                <?php echo $order['first_name']; ?>
            </td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td>
                <?php echo $order['last_name']; ?>
            </td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>
                <?php echo $order['email']; ?>
            </td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>
                <?php echo $order['address']; ?>
            </td>
        </tr>
        <tr>
            <th>Notes:</th>
            <td>
                <?php echo $order['notes']; ?>
            </td>
        </tr>
        <tr>
            <th>Payment Method:</th>
            <td>
                <?php echo $order['payment_method']; ?>
            </td>
        </tr>
        <tr>
            <th>Delivery Method:</th>
            <td>
                <?php echo $order['delivery_method']; ?>
            </td>
        </tr>
    </table>

    <h3 class='title'>Order Items</h3>

    <table class="order-items">
        <tr>
            <th class="italic">Product ID</th>
            <th class="italic">Product img</th>
            <th class="italic">Product Count</th>
            <th class="italic">Price</th>
        </tr>
        <?php foreach ($products_info as $item): ?>
            <tr>
                <td><a href="/?action=product&product-id=<?php echo $item['product_id']; ?>"><?php echo $item['product_id']; ?></a></td>
                <td><img class="product-img" src="<?php echo $item['product_img']; ?>" alt=""> </td>
                <td>
                    <?php echo $item['count_of_product']; ?>
                </td>
                <td>
                    <?php echo $item['product_cost'] * $item['count_of_product']; ?>
                </td>
                <?php
                $total_count += $item['count_of_product'];
                $total_price += $item['product_cost'] * $item['count_of_product'];
                ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th>Total:</th>
            <th>-</th>
            <th>
                <?php echo $total_count ?>
            </th>
            <th>
                <?php echo $total_price; ?>
            </th>
        </tr>
    </table>

</div>