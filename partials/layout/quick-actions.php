<?php
if (!isset($siteRoutes) || !is_array($siteRoutes)) {
    $siteRoutes = array();
}

$currentPage = isset($currentPage) ? $currentPage : 'home';

$panelActions = array(
    array(
        'key' => 'news',
        'label' => 'Latest News',
        'href' => isset($siteRoutes['news']) ? $siteRoutes['news']['path'] : 'news.php',
        'icon' => 'fa-newspaper-o'
    ),
    array(
        'key' => 'results',
        'label' => 'Live Results',
        'href' => isset($siteRoutes['results']) ? $siteRoutes['results']['path'] : 'results.php',
        'icon' => 'fa-bar-chart'
    ),
    array(
        'key' => 'contact',
        'label' => 'Contact Team',
        'href' => isset($siteRoutes['contact']) ? $siteRoutes['contact']['path'] : 'contact.php',
        'icon' => 'fa-envelope'
    ),
    array(
        'key' => 'iec',
        'label' => 'IEC Status',
        'href' => 'https://www.elections.org.za/pw/OnlineForms/Check-My-Special-Vote-Application-Status',
        'icon' => 'fa-check-square-o',
        'external' => true
    )
);

$quickActionCount = count($panelActions);
?>

<div class="vms-quick-actions fixed left-4 top-[44%] z-30 hidden -translate-y-1/2 xl:block">
    <button
        type="button"
        id="quickActionsLauncher"
        class="vms-shadow hidden items-center gap-2 rounded-full border border-transparent bg-gradient-to-r from-[#0b2a66] to-[#1a56d6] px-3 py-2 text-sm font-semibold text-white backdrop-blur transition hover:from-[#123f9f] hover:to-[#3b82f6]"
        aria-expanded="false"
        aria-controls="quickActionsBody"
    >
        <i class="fa fa-sliders"></i>
        <span>Quick Actions</span>
        <span class="ml-1 rounded-full bg-white/20 px-2 py-0.5 text-[10px] font-bold uppercase tracking-[0.12em]"><?php echo (int) $quickActionCount; ?></span>
    </button>

    <aside id="quickActionsPanel" class="vms-shadow w-52 overflow-hidden rounded-2xl border border-blue-100 bg-white/95 backdrop-blur">
        <button
            type="button"
            id="quickActionsToggle"
            class="flex w-full items-center justify-between px-3 py-3 text-left"
            aria-expanded="true"
            aria-controls="quickActionsBody"
        >
            <span class="text-[11px] font-semibold uppercase tracking-[0.16em] text-[#1a56d6]">Quick Actions</span>
            <i id="quickActionsIcon" class="fa fa-chevron-up text-xs text-[#123f9f]"></i>
        </button>

        <div id="quickActionsBody" class="space-y-2 px-3 pb-3">
            <?php foreach ($panelActions as $action) { ?>
                <?php
                $isCurrent = ($action['key'] === $currentPage);
                $classes = $isCurrent
                    ? 'bg-[#1a56d6] text-white border-[#1a56d6]'
                    : 'bg-blue-50/70 text-[#123f9f] border-blue-100 hover:border-blue-300 hover:bg-blue-100/60';
                ?>
                <a
                    href="<?php echo htmlspecialchars($action['href']); ?>"
                    class="flex items-center gap-2 rounded-xl border px-3 py-2 text-sm font-medium transition <?php echo $classes; ?>"
                    <?php echo !empty($action['external']) ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>
                >
                    <i class="fa <?php echo htmlspecialchars($action['icon']); ?>"></i>
                    <span><?php echo htmlspecialchars($action['label']); ?></span>
                </a>
            <?php } ?>
        </div>
    </aside>
</div>