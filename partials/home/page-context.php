<?php
$contextEyebrow = isset($contextEyebrow) ? $contextEyebrow : 'Overview';
$contextTitle = isset($contextTitle) ? $contextTitle : 'Voter Management System';
$contextText = isset($contextText) ? $contextText : 'Use this page to access relevant election workflows and updates.';
$contextActions = isset($contextActions) && is_array($contextActions) ? $contextActions : array();
$contextHighlights = isset($contextHighlights) && is_array($contextHighlights) ? $contextHighlights : array();
?>

<section class="mx-auto max-w-7xl px-4 pt-10 pb-6">
    <div class="vms-shadow rounded-3xl border border-blue-100 bg-white/90 p-7">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1a56d6]"><?php echo htmlspecialchars($contextEyebrow); ?></p>
        <h1 class="vms-title mt-2 text-2xl font-bold text-[#0b2a66] sm:text-3xl"><?php echo htmlspecialchars($contextTitle); ?></h1>
        <p class="mt-3 max-w-3xl text-sm text-slate-600 sm:text-base"><?php echo htmlspecialchars($contextText); ?></p>

        <?php if (!empty($contextActions)) { ?>
            <div class="mt-5 flex flex-wrap gap-3">
                <?php foreach ($contextActions as $action) { ?>
                    <a href="<?php echo htmlspecialchars($action['href']); ?>" class="rounded-xl border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-semibold text-[#123f9f] transition hover:border-blue-400 hover:text-[#1a56d6]">
                        <?php echo htmlspecialchars($action['label']); ?>
                    </a>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if (!empty($contextHighlights)) { ?>
            <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($contextHighlights as $highlight) { ?>
                    <article class="rounded-2xl border border-blue-100 bg-blue-50/70 p-4">
                        <h3 class="text-sm font-semibold text-[#0b2a66]"><?php echo htmlspecialchars($highlight['title']); ?></h3>
                        <p class="mt-1 text-xs text-slate-600 sm:text-sm"><?php echo htmlspecialchars($highlight['text']); ?></p>
                    </article>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
