<?php
$currentPage = 'news';
$loadHomeData = true;
include __DIR__ . '/partials/controllers/site-controller.php';

include __DIR__ . '/partials/layout/page-start.php';

$contextEyebrow = 'Public Communication';
$contextTitle = 'Election News And Announcements';
$contextText = 'Stay informed with verified updates from staff and election operations teams. Use this page to track community notices, campaign milestones, and operational announcements.';
$contextActions = array(
	array('href' => 'results.php', 'label' => 'Open Result Dashboard'),
	array('href' => 'contact.php', 'label' => 'Share Community Feedback')
);
$contextHighlights = array(
	array('title' => 'Verified Updates', 'text' => 'Announcements are published to support informed public participation.'),
	array('title' => 'Operational Visibility', 'text' => 'Track campaign milestones and election communication activity.'),
	array('title' => 'Story Navigation', 'text' => 'Open any headline to view full context and related stories.')
);
include __DIR__ . '/partials/home/page-context.php';

include __DIR__ . '/partials/home/news.php';
include __DIR__ . '/partials/layout/footer.php';
include __DIR__ . '/partials/layout/page-end.php';
