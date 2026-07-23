<?php
$currentPage = 'results';
$loadHomeData = true;
include __DIR__ . '/partials/controllers/site-controller.php';

include __DIR__ . '/partials/layout/page-start.php';

$contextEyebrow = 'Decision Support';
$contextTitle = 'Live Results And Vote Analytics';
$contextText = 'Review key election metrics, leading party performance, and visual distribution trends. Use these insights for faster reporting and informed monitoring decisions.';
$contextActions = array(
	array('href' => 'news.php', 'label' => 'Related Election Updates'),
	array('href' => 'contact.php', 'label' => 'Share Feedback'),
	array('href' => 'https://results.elections.org.za/', 'label' => 'Open IEC Portal')
);
$contextHighlights = array(
	array('title' => 'Live Comparison', 'text' => 'Compare vote shares visually through bar and pie analytics.'),
	array('title' => 'Leadership Insight', 'text' => 'See the current leading party with percentage contribution.'),
	array('title' => 'Monitoring Support', 'text' => 'Use real-time metrics for station-level and campaign reporting.')
);
include __DIR__ . '/partials/home/page-context.php';

include __DIR__ . '/partials/home/stats.php';
include __DIR__ . '/partials/home/leader.php';
include __DIR__ . '/partials/home/charts.php';
include __DIR__ . '/partials/home/iec-results-table.php';
include __DIR__ . '/partials/layout/footer.php';
include __DIR__ . '/partials/layout/page-end.php';
