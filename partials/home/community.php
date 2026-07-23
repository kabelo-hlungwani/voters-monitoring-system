<section id="social" class="mx-auto max-w-7xl px-4 pb-14">
    <div class="grid gap-6 lg:grid-cols-[1.4fr_0.6fr]">
        <article class="vms-shadow overflow-hidden rounded-2xl border border-blue-100 bg-white">
            <header class="bg-[#1a56d6] px-5 py-4 text-white">
                <h2 class="text-lg font-semibold">Community Comments</h2>
                <p class="mt-1 text-sm text-blue-100">How are votes at your area?</p>
            </header>
            <div class="max-h-[420px] space-y-3 overflow-y-auto p-5">
                <?php if (!empty($comments)) { ?>
                    <?php foreach ($comments as $comment) { ?>
                        <div class="rounded-xl border border-blue-100 bg-blue-50/40 p-4">
                            <p class="text-sm text-slate-700">
                                <span class="font-semibold text-[#0b2a66]"><?php echo htmlspecialchars($comment['name']); ?>:</span>
                                <?php echo htmlspecialchars($comment['message']); ?>
                            </p>
                            <p class="mt-2 text-xs text-slate-500"><?php echo htmlspecialchars($comment['time']); ?></p>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-sm text-slate-500">No comments yet.</p>
                <?php } ?>
            </div>
            <div class="border-t border-blue-100 p-5">
                <a href="comment.php" class="inline-flex rounded-xl bg-[#1a56d6] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#123f9f]">Add Comment</a>
            </div>
        </article>

        <aside class="vms-shadow rounded-2xl border border-blue-100 bg-white p-6">
            <h3 class="text-xl font-semibold text-[#0b2a66]">Follow Us</h3>
            <ul class="mt-4 space-y-3 text-sm text-[#123f9f]">
                <li><a href="#" class="transition hover:text-[#1a56d6]"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                <li><a href="#" class="transition hover:text-[#1a56d6]"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                <li><a href="#" class="transition hover:text-[#1a56d6]"><i class="fab fa-whatsapp-square"></i> WhatsApp</a></li>
                <li><a href="#" class="transition hover:text-[#1a56d6]"><i class="fa fa-youtube-square"></i> YouTube</a></li>
            </ul>

            <div class="mt-8 rounded-2xl bg-gradient-to-br from-[#123f9f] to-[#1a56d6] p-5 text-white">
                <h4 class="font-semibold">Need more information?</h4>
                <p class="mt-2 text-sm text-blue-100">Visit the official IEC platform for latest election updates.</p>
                <a href="https://www.elections.org.za/pw/" target="_blank" class="mt-3 inline-flex rounded-lg bg-white px-3 py-2 text-sm font-semibold text-[#123f9f]">Open IEC Website</a>
            </div>
        </aside>
    </div>
</section>
