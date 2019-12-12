<!-- No .htaccess
RewriteEngine On

# Ignora arquivos reais
RewriteCond %{REQUEST_FILENAME} !-f
# Ignora diretórios
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /index.php?q=$1 [L]

=========================== -->

<?php

echo "<pre>";
print_r($_GET); //Para ver o que tem no GET da url amigável

?>