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
    <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
    <div class="display-flex gap">
        <label for="product_img">Product Image:</label>
        <input type="text" id="product_img" name="product_img" value="<?php echo $product["product_img"]?>">
    </div>
    <div class="display-flex gap">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" value="<?php echo $product["product_name"]?>">
    </div>
    <div class="display-flex gap">
        <label for="product_cost">Price:</label>
        <input type="number" id="product_cost" name="product_cost" value="<?php echo $product["product_cost"]?>">
    </div>
    <div class="checkbox-block">
        <label for="recommended">Recommended:</label>
        <input type="checkbox" id="recommended" name="recommended" <?php echo $product["recommended"] == 1 ? "checked":'' ?>>
    </div>
    <div class="checkbox-block">
        <label for="hot">Hot:</label>
        <input type="checkbox" id="hot" name="hot" <?php echo $product["hot"] == 1 ? "checked":'' ?>>
    </div>
    <div class="display-flex gap">
        <label for="short_description">Short description:</label>
        <textarea id="short_description" name="short_description"><?php echo $product["short_description"]?></textarea>
    </div>

    <div>
        <button class="form-btn bold" type="submit">Update</button>
    </div>
</form>