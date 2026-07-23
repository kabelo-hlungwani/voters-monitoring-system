<?php
$currentPage = 'home';
$loadHomeData = false;
include __DIR__ . '/partials/controllers/site-controller.php';

include __DIR__ . '/partials/layout/page-start.php';
include __DIR__ . '/partials/home/hero.php';

if (!isset($siteRoutes) || !is_array($siteRoutes)) {
    $siteRoutes = array();
}

$contextEyebrow = 'Navigation Hub';
$contextTitle = 'Choose A VMS Workspace';
$contextText = 'Use this homepage as your central hub. Navigate to election background, announcements, result analytics, or contact and feedback channels.';
$contextActions = array(
    array('href' => 'about.php', 'label' => 'Platform Background'),
    array('href' => 'results.php', 'label' => 'Results Dashboard')
);
$contextHighlights = array(
    array('title' => 'What You Can Do Here', 'text' => 'Access all key election pages from one central entry point.'),
    array('title' => 'Operations Scope', 'text' => 'Move from governance information to real-time analytics in one click.'),
    array('title' => 'Community Focus', 'text' => 'Share feedback and stay aligned with official election communications.')
);
include __DIR__ . '/partials/home/page-context.php';
?>

<section class="mx-auto max-w-7xl px-4 pb-16">
    <div class="mb-8 text-center">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1a56d6]">Quick Navigation</p>
        <h2 class="vms-title mt-2 text-2xl font-bold text-[#0b2a66] sm:text-3xl">Explore VMS Sections</h2>
    </div>

    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($siteRoutes as $routeKey => $route) { ?>
            <?php if ($routeKey === 'home') { continue; } ?>
            <a href="<?php echo htmlspecialchars($route['path']); ?>" class="vms-shadow rounded-2xl border border-blue-100 bg-white p-5 transition hover:-translate-y-1 hover:border-blue-300">
                <h3 class="text-lg font-semibold text-[#0b2a66]"><?php echo htmlspecialchars($route['label']); ?></h3>
                <p class="mt-2 text-sm text-slate-600"><?php echo htmlspecialchars($route['description']); ?></p>
            </a>
        <?php } ?>
    </div>
</section>

<?php
include __DIR__ . '/partials/layout/footer.php';
include __DIR__ . '/partials/layout/page-end.php';
