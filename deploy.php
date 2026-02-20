<?php
// Ganti dengan path folder .git Anda
$repo_path = '/home/jivaanan/public_html';

// Perintah untuk pull dan deploy
$output = shell_exec("cd $repo_path && git pull 2>&1");

echo "<pre>$output</pre>";
?>