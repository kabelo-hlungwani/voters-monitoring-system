<?php
$currentPage = 'about';
$loadHomeData = false;
include __DIR__ . '/partials/controllers/site-controller.php';

include __DIR__ . '/partials/layout/page-start.php';

$contextEyebrow = 'Mission And Governance';
$contextTitle = 'About The VMS Platform';
$contextText = 'Understand the mission, governance goals, and trust principles behind this voter management platform. This page explains how VMS supports transparent elections from nominations to final tabulation.';
$contextActions = array(
	array('href' => 'results.php', 'label' => 'View Election Results'),
	array('href' => 'news.php', 'label' => 'Read Latest Updates')
);
$contextHighlights = array(
	array('title' => 'Governance Goal', 'text' => 'Strengthen trust with transparent and auditable election workflows.'),
	array('title' => 'Mission Focus', 'text' => 'Support inclusive participation and dependable civic outcomes.'),
	array('title' => 'Platform Promise', 'text' => 'Deliver secure processes from nomination to result publication.')
);
include __DIR__ . '/partials/home/page-context.php';

include __DIR__ . '/partials/home/about.php';
include __DIR__ . '/partials/layout/footer.php';
include __DIR__ . '/partials/layout/page-end.php';
