<?php
if (!isset($siteRoutes) || !is_array($siteRoutes)) {
    $siteRoutes = array();
}

$currentPage = isset($currentPage) ? $currentPage : 'home';
$homeRoute = isset($siteRoutes['home']) ? $siteRoutes['home'] : array('label' => 'Home', 'path' => 'index.php');
$activeRoute = isset($siteRoutes[$currentPage]) ? $siteRoutes[$currentPage] : $homeRoute;

$breadcrumbTrail = isset($breadcrumbTrail) && is_array($breadcrumbTrail) ? $breadcrumbTrail : array();

if (empty($breadcrumbTrail)) {
    $breadcrumbTrail[] = array(
        'label' => $homeRoute['label'],
        'href' => $homeRoute['path']
    );

    if ($currentPage !== 'home') {
        $breadcrumbTrail[] = array(
            'label' => $activeRoute['label'],
            'current' => true
        );
    }
}

$trailCount = count($breadcrumbTrail);
?>

<section class="mx-auto max-w-7xl px-4 pt-4">
    <nav aria-label="Breadcrumb" class="vms-glass rounded-xl border border-blue-100 px-4 py-3">
        <ol class="flex flex-wrap items-center gap-2 text-xs font-medium text-slate-500 sm:text-sm">
            <?php foreach ($breadcrumbTrail as $index => $crumb) { ?>
                <?php
                $isCurrent = !empty($crumb['current']) || $index === ($trailCount - 1);
                $hasHref = isset($crumb['href']) && !$isCurrent;
                ?>
                <?php if ($index > 0) { ?>
                    <li aria-hidden="true" class="text-slate-400">/</li>
                <?php } ?>
                <li class="<?php echo $isCurrent ? 'font-semibold text-[#0b2a66]' : ''; ?>" <?php echo $isCurrent ? 'aria-current="page"' : ''; ?>>
                    <?php if ($hasHref) { ?>
                        <a href="<?php echo htmlspecialchars($crumb['href']); ?>" class="text-[#123f9f] transition hover:text-[#1a56d6]">
                            <?php echo htmlspecialchars($crumb['label']); ?>
                        </a>
                    <?php } else { ?>
                        <?php echo htmlspecialchars($crumb['label']); ?>
                    <?php } ?>
                </li>
            <?php } ?>
        </ol>
    </nav>
</section>