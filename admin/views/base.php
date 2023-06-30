<div class="page-content">
    <div class="sidebar-section scheme-light fixed bg-dark">
        <div class="block-title display-flex space-between align-center design-bordered">
            <div class="sidebar-title">
                <h5 class="title">Navigation</h5>
            </div>
            <div class="sidebar-img">
                <a href=""><img src="<?php echo get_url()?>/admin/views/img/svg/browse.svg" alt=""></a>
            </div>

        </div>
        <div class="sidebar-content">
            <div class="sidebar-block">
                <div class="element-subtitle">
                    <p class="text-sm opacity-50 ">
                        MAIN
                    </p>
                </div>
                <div class="sidebar-elements">
                    <ul>
                        <li class="sidebar-element <?php echo !$_GET["action"] ? "active":""  ?>">
                            <a class="display-flex align-center gap" href="/admin/">
                                <img src="<?php echo get_url()?>/admin/views/img/svg/sidebar-icons/dashboard.svg" alt="">
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-block">
                <div class="element-subtitle">
                    <p class="text-sm opacity-50 ">
                        PRODUCTS
                    </p>
                </div>
                <div class="sidebar-elements">
                    <ul>
                        <li class="sidebar-element <?php echo $_GET["action"] == 'products' ? "active":""  ?>">
                            <a class="display-flex align-center gap" href="?action=products">
                                <img src="<?php echo get_url()?>/admin/views/img/svg/sidebar-icons/products.svg" alt="">
                                <p class="text">Products</p>
                            </a>
                        </li>
                        <li class="sidebar-element">
                            <a class="display-flex align-center gap" href="/404.php">
                                <img src="<?php echo get_url()?>/admin/views/img/svg/sidebar-icons/orders.svg" alt="">
                                <p class="text">Orders</p>
                            </a>
                        </li>
                        <li class="sidebar-element">
                            <a class="display-flex align-center gap" href="/404.php">
                                <img src="<?php echo get_url()?>/admin/views/img/svg/sidebar-icons/analytic.svg" alt="">
                                <p class="text">Analitics</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content">

        <div class="content-section">
            <?php include_once 'views/' . $name . ".php" ?>
        </div>
        <!-- footer -->
        <?php include 'footer.php' ?>
    </div>


</div>

</body>

</html>