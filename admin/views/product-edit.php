<div class="page-header">
    <div class="block-title">
        <h5 class="title">Home - Products - Edit Product_Id:
            <?php echo $product["product_id"] ?>
        </h5>

    </div>
</div>
<?php
Errors::display();
?>
<form class="update_form display-flex column gap" action="?action=update-product" method="POST">
    <div class="display-flex gap">
        <label for="product_img">Product Image:</label>
        <input type="text" id="product_image" name="product_image" placeholder="Enter product image URL">
    </div>
    <div class="display-flex gap">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" placeholder="Enter product name">
    </div>
    <div class="display-flex gap">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" placeholder="Enter product price">
    </div>
    <div class="display-flex gap">
        <label for="recommended">Recommended:</label>
        <input type="checkbox" id="recommended" name="recommended">
    </div>
    <div class="display-flex gap">
        <label for="hot">Hot:</label>
        <input type="checkbox" id="hot" name="hot" checked>
    </div>
    <div class="display-flex gap">
        <label for="short_description">Short description:</label>
        <textarea id="short_description" name="short_description" placeholder="Enter short description"></textarea>
    </div>

    <div>
        <input type="submit" value="Update">
    </div>
</form>