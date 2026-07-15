<?php

echo '<pre>';

print_r([
    'HTTP_HOST' => $_SERVER['HTTP_HOST'] ?? null,
    'SERVER_NAME' => $_SERVER['SERVER_NAME'] ?? null,
    'SERVER_PORT' => $_SERVER['SERVER_PORT'] ?? null,
    'HTTPS' => $_SERVER['HTTPS'] ?? null,
    'REQUEST_SCHEME' => $_SERVER['REQUEST_SCHEME'] ?? null,
    'HTTP_X_FORWARDED_PROTO' => $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? null,
]);

echo '</pre>';