<div class="page-header">
    <div class="block-title">
        <h5 class="title">Home - Products - Add Product</h5>

    </div>
</div>
<?php
Errors::display();
?>
<form class="add_form display-flex column gap" action="?action=add-product" method="POST">
    <div class="display-flex gap">
        <label for="product_img">Product Image:</label>
        <input type="text" id="product_img" name="product_img" placeholder="Enter product image URL">
    </div>
    <div class="display-flex gap">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" placeholder="Enter product name">
    </div>
    <div class="display-flex gap">
        <label for="product_cost">Price:</label>
        <input type="number" id="product_cost" name="product_cost" placeholder="Enter product price">
    </div>
    <div class="checkbox-block">
        <label for="recommended">Recommended:</label>
        <input type="checkbox" id="recommended" name="recommended">
    </div>
    <div class="checkbox-block">
        <label for="hot">Hot:</label>
        <input type="checkbox" id="hot" name="hot">
    </div>
    <div class="display-flex gap">
        <label for="short_description">Short description:</label>
        <textarea id="short_description" name="short_description" placeholder="Enter short description"></textarea>
    </div>

    <div>
        <button class="form-btn bold" type="submit">Add</button>
    </div>
</form>