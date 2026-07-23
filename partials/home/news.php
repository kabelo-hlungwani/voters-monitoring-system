<section id="news" class="mx-auto max-w-7xl px-4 py-14">
    <div class="mb-8 flex items-end justify-between gap-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-[#1a56d6]">Updates</p>
            <h2 class="vms-title mt-1 text-2xl font-bold text-[#0b2a66] sm:text-3xl">Latest News</h2>
        </div>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php if (!empty($newsItems)) { ?>
            <?php foreach ($newsItems as $item) { ?>
                <article class="vms-shadow overflow-hidden rounded-2xl border border-blue-100 bg-white">
                    <img class="news-card-image w-full" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($item['image']); ?>" alt="News image">
                    <div class="p-5">
                        <h3 class="line-clamp-2 text-base font-semibold text-[#0b2a66]"><?php echo htmlspecialchars($item['heading']); ?></h3>
                        <p class="mt-2 text-xs text-slate-500">
                            <i class="fa fa-user text-[#1a56d6]"></i>
                            <?php echo htmlspecialchars($item['first_name'] . ' ' . $item['last_name']); ?>
                        </p>
                        <a href="read.php?a=<?php echo $item['news_id']; ?>" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#1a56d6] hover:text-[#123f9f]">
                            Read more <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php } ?>
        <?php } else { ?>
            <p class="rounded-2xl border border-blue-100 bg-white p-6 text-sm text-slate-500">No news available yet.</p>
        <?php } ?>
    </div>
</section>
