<?php
if (!isset($siteRoutes) || !is_array($siteRoutes)) {
    $siteRoutes = array();
}
?>

<footer class="mt-10 border-t border-blue-200 bg-gradient-to-b from-[#0b2a66] to-[#071a3f] text-blue-100">
    <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 lg:grid-cols-[1.1fr_0.9fr_0.9fr_1.1fr]">
        <section>
            <div class="flex items-center gap-3">
                <img src="assets/img/logo.png" alt="VMS Logo" class="h-10 w-auto">
                <h3 class="vms-title text-sm font-semibold tracking-[0.18em] text-white">VOTER MANAGEMENT SYSTEM</h3>
            </div>
            <p class="mt-4 text-sm text-blue-200">Secure election operations platform for communication, voting oversight, and trusted result tabulation.</p>
            <div class="mt-4 flex items-center gap-3 text-lg">
                <a href="#" class="text-blue-200 transition hover:text-white"><i class="fa fa-facebook-square"></i></a>
                <a href="#" class="text-blue-200 transition hover:text-white"><i class="fa fa-twitter-square"></i></a>
                <a href="#" class="text-blue-200 transition hover:text-white"><i class="fa fa-youtube-square"></i></a>
                <a href="#" class="text-blue-200 transition hover:text-white"><i class="fab fa-whatsapp-square"></i></a>
            </div>
        </section>

        <section>
            <h4 class="text-sm font-semibold uppercase tracking-[0.15em] text-blue-100">Site Pages</h4>
            <ul class="mt-3 space-y-2 text-sm text-blue-200">
                <?php foreach ($siteRoutes as $route) { ?>
                    <li>
                        <a href="<?php echo htmlspecialchars($route['path']); ?>" class="transition hover:text-white">
                            <?php echo htmlspecialchars($route['label']); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </section>

        <section>
            <h4 class="text-sm font-semibold uppercase tracking-[0.15em] text-blue-100">Resources</h4>
            <ul class="mt-3 space-y-2 text-sm text-blue-200">
                <li><a href="https://www.elections.org.za/pw/" target="_blank" class="transition hover:text-white">IEC Website</a></li>
                <li><a href="https://www.elections.org.za/pw/OnlineForms/Check-My-Special-Vote-Application-Status" target="_blank" class="transition hover:text-white">Check IEC Status</a></li>
                <li><a href="results.php" class="transition hover:text-white">Election Analytics</a></li>
                <li><a href="contact.php" class="transition hover:text-white">Support Channel</a></li>
            </ul>
        </section>

        <section>
            <h4 class="text-sm font-semibold uppercase tracking-[0.15em] text-blue-100">Contact</h4>
            <ul class="mt-3 space-y-2 text-sm text-blue-200">
                <li><i class="fa fa-map-marker"></i> 88 Marshall Street, Marshalltown, Johannesburg</li>
                <li><i class="fa fa-phone"></i> +27 68 159 6956</li>
                <li><i class="fa fa-envelope"></i> Info@vms.org.za</li>
            </ul>
            <a href="contact.php" class="mt-4 inline-flex rounded-lg border border-blue-300 px-3 py-2 text-sm font-semibold text-blue-100 transition hover:border-white hover:text-white">Send Enquiry</a>
        </section>
    </div>

    <div class="border-t border-blue-800/70">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-3 px-4 py-4 text-xs text-blue-300 sm:flex-row sm:text-sm">
            <p>Voting Management System © <?php echo date('Y'); ?>. All rights reserved.</p>
            <p>Built for transparency, trust, and accountable civic participation.</p>
        </div>
    </div>
</footer>
