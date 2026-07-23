<?php

include_once __DIR__ . '/routes.php';

$currentPage = isset($currentPage) ? $currentPage : 'home';

if (!isset($siteRoutes[$currentPage])) {
    $currentPage = 'home';
}

if (!isset($pageTitle)) {
    $pageTitle = $siteRoutes[$currentPage]['title'];
}
