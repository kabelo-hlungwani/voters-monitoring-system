<section class="mx-auto max-w-7xl px-4 py-8">
    <div class="vms-shadow rounded-2xl border border-blue-100 bg-white px-6 py-5">
        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1a56d6]">Leading Party</p>
        <p class="mt-2 text-lg font-semibold text-[#0b2a66] sm:text-xl">
            <?php if (!empty($leaderParty)) { ?>
                <?php echo htmlspecialchars($leaderParty); ?> with <?php echo number_format($leaderPercentage, 1); ?>%
            <?php } else { ?>
                No approved vote data available yet.
            <?php } ?>
        </p>
        <p class="mt-1 text-sm text-slate-500">Total approved votes captured: <?php echo number_format((float)$totalVotes); ?></p>
    </div>
</section>
