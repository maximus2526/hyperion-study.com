<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_url() ?>/admin/views/css/base.css">
    <title>Admin panel</title>
</head>

<body>
    <header class="fixed scheme-light">
        <div class="row align-center space-between">
            <div class="col-auto">
                <div class="logo">
                    <a href="/admin/"><img src="<?php echo get_url() ?>/admin/views/img/svg/hyperion-logo.svg" alt></a>
                </div>
            </div>
            <div class="col-auto">
                <div class="profile-block display-flex gap  col-right  style-bordered">
                    <div class="profile display-flex gap">
                        <div class="user-name">
                            <a href="?action=profile">Profile</a>
                        </div>
                        <div class="profile-img">
                            <a href="?action=profile"><img src="<?php echo get_url() ?>/admin/views/img/author-img.png" alt></a>
                        </div>
                    </div>

                    <div class="log-out">
                        <a href="?action=logout">Log-Out</a>
                    </div>
                </div>

            </div>
        </div>
    </header>