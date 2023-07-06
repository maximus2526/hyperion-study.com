<?php
$template_content = "<div class='container'>
    <h3 class='title'>Order Details</h3>

    <table class='order-details'>
        <tr>
            <th>Order ID:</th>
            <td>
                {$order['order_id']}
            </td>
        </tr>
        <tr>
            <th>Order Date:</th>
            <td>
                {$order['order_date']}
            </td>
        </tr>
        <tr>
            <th>First Name:</th>
            <td>
                {$order['first_name']}
            </td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td>
                {$order['last_name']}
            </td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>
                {$order['email']}
            </td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>
                {$order['address']}
            </td>
        </tr>
        <tr>
            <th>Notes:</th>
            <td>
                {$order['notes']}
            </td>
        </tr>
        <tr>
            <th>Payment Method:</th>
            <td>
                {$order['payment_method']}
            </td>
        </tr>
        <tr>
            <th>Delivery Method:</th>
            <td>
                {$order['delivery_method']}
            </td>
        </tr>
    </table>

    <h3 class='title'>Order Items</h3>

    <table class='order-items'>
        <tr>
            <th class='italic'>Product ID</th>
            <th class='italic'>Product Count</th>
            <th class='italic'>Price</th>
        </tr>"; 

foreach ($order_items as $item) {
    $total_count += $item['count_of_product'];
    $total_price += $item['product_cost'] * $item['count_of_product'];
    $product = "
    <tr>
            <td><a href='/?action=product&product-id={$item['product_id']}'>{$item['product_id']}</a></td>
            <td>
                {$item['count_of_product']}
            </td>
            <td>
                {$item['product_cost']}
            </td>
        </tr>";

    $template_content .= $product;
}  

$template_content .= "<tr>
    <th>Total:</th>
        <th>
            {$total_count} 
        </th>
        <th>
            {$total_price}
        </th>
</tr>
</table>

</div>";
