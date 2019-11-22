No .htaccess

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*) /index.php?q=$1 [L]

===========================

<?php

print_r($_GET); //Para ver o que tem no GET da url amigável

?>