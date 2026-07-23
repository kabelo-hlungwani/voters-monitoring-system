<?php
if (!isset($siteRoutes) || !is_array($siteRoutes)) {
    $siteRoutes = array();
}

$currentPage = isset($currentPage) ? $currentPage : 'home';

if (!function_exists('vmsNavClass')) {
    function vmsNavClass($routeKey, $currentPage)
    {
        if ($routeKey === $currentPage) {
            return 'text-[#1a56d6] font-semibold';
        }

        return 'text-[#0f2f70] hover:text-[#1a56d6]';
    }
}
?>

<header class="sticky top-0 z-40 border-b border-blue-100 bg-white/90 backdrop-blur">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3">
        <a href="index.php" class="flex items-center gap-3">
            <img src="assets/img/logo.png" alt="VMS Logo" class="h-14 w-auto sm:h-16">
            <span class="vms-title hidden text-sm font-semibold tracking-[0.18em] text-[#0b2a66] sm:inline">VOTER MANAGEMENT SYSTEM</span>
        </a>

        <button id="menuToggle" class="rounded-lg border border-blue-200 px-3 py-2 text-[#0b2a66] md:hidden" aria-label="Toggle navigation menu">
            <i class="fa fa-bars"></i>
        </button>

        <ul class="hidden items-center gap-6 text-sm font-medium md:flex">
            <?php foreach ($siteRoutes as $routeKey => $route) { ?>
                <li>
                    <a href="<?php echo htmlspecialchars($route['path']); ?>" class="transition <?php echo vmsNavClass($routeKey, $currentPage); ?>">
                        <?php echo htmlspecialchars($route['label']); ?>
                    </a>
                </li>
            <?php } ?>
        </ul>

        <div class="hidden items-center gap-3 md:flex">
            <a href="https://www.elections.org.za/pw/OnlineForms/Check-My-Special-Vote-Application-Status" target="_blank" class="rounded-xl border border-blue-200 px-4 py-2 text-sm font-semibold text-[#123f9f] transition hover:border-blue-400 hover:text-[#1a56d6]">IEC Status</a>
            <a href="admin/login.php" class="rounded-xl bg-[#1a56d6] px-4 py-2 text-sm font-semibold text-white shadow-md transition hover:bg-[#123f9f]">Staff Login</a>
        </div>
    </nav>

    <div class="hidden border-t border-blue-100 bg-blue-50/70 md:block">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-2 text-xs text-[#123f9f] sm:text-sm">
            <p class="font-medium">Trusted digital workflows for nominations, voting, and tabulation.</p>
            <div class="flex items-center gap-4">
                <a href="news.php" class="transition hover:text-[#1a56d6]">Latest Updates</a>
                <a href="results.php" class="transition hover:text-[#1a56d6]">Live Analytics</a>
                <a href="contact.php" class="transition hover:text-[#1a56d6]">Community Feedback</a>
            </div>
        </div>
    </div>

    <div id="mobileMenu" class="hidden border-t border-blue-100 bg-white md:hidden">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-4 text-sm font-medium">
            <?php foreach ($siteRoutes as $routeKey => $route) { ?>
                <a href="<?php echo htmlspecialchars($route['path']); ?>" class="<?php echo vmsNavClass($routeKey, $currentPage); ?>">
                    <?php echo htmlspecialchars($route['label']); ?>
                </a>
            <?php } ?>
            <a href="https://www.elections.org.za/pw/OnlineForms/Check-My-Special-Vote-Application-Status" target="_blank" class="text-[#123f9f]">IEC Status</a>
            <a href="admin/login.php" class="mt-2 inline-flex w-fit rounded-xl bg-[#1a56d6] px-4 py-2 text-white">Staff Login</a>
        </div>
    </div>
</header>
