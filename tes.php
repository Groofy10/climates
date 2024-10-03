<?php
$upload_max_filesize = ini_get('upload_max_filesize');
$post_max_size = ini_get('post_max_size');

echo "Upload Max Filesize: " . $upload_max_filesize . "<br>";
echo "Post Max Size: " . $post_max_size . "<br>";
