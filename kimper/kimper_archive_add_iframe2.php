<?php
$basePath = 'http://' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . '/admoprsys/';
?>

<head>
    <!-- Custom styles for this template-->
    <link href="<?= $basePath; ?>css/sb-admin-2.css" rel="stylesheet">

</head>

<div class="container">
    <div class="card p-1">
        <div class="row small">
            <div class="col">
                <span>Klik disini, kemudian </span><br><br>
                <kbd class="key">Ctrl</kbd> +
                <kbd class="key">V</kbd> tempel gambar
            </div>
            <div class="col">
                <img class="preview" id="preview2" height="130px" width="100px">
            </div>
        </div>
    </div>
</div>

<script src="<?= $basePath; ?>vendor/jquery/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.addEventListener('paste', function(evt) {
            const clipboardItems = evt.clipboardData.items;
            const items = [].slice.call(clipboardItems).filter(function(item) {
                // Filter the image items only
                return item.type.indexOf('image') !== -1;
            });
            if (items.length === 0) {
                return;
            }

            const item1 = items[0];
            const blob1 = item1.getAsFile();

            const imageEle = document.getElementById('preview2');
            imageEle.src = URL.createObjectURL(blob1);
        });
    });
</script>