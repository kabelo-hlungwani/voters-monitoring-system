<?php
$currentPage = 'news';
$loadHomeData = false;
include __DIR__ . '/partials/controllers/site-controller.php';

$articleId = isset($_GET['a']) ? (int) $_GET['a'] : 0;
$article = null;
$relatedStories = array();

if ($articleId > 0 && isset($conn)) {
    $articleSql = "SELECT newsfeed.news_id, newsfeed.heading, newsfeed.image, newsfeed.content, newsfeed.date,
                          staff.first_name, staff.last_name
                   FROM newsfeed
                   INNER JOIN staff ON staff.staff_id = newsfeed.staff_id
                   WHERE newsfeed.news_id = ?
                   LIMIT 1";

    $stmt = mysqli_prepare($conn, $articleSql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $articleId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            $article = mysqli_fetch_assoc($result);
        }

        mysqli_stmt_close($stmt);
    }

    $relatedSql = "SELECT news_id, heading FROM newsfeed WHERE news_id <> ? ORDER BY news_id DESC LIMIT 8";
    $relatedStmt = mysqli_prepare($conn, $relatedSql);

    if ($relatedStmt) {
        mysqli_stmt_bind_param($relatedStmt, 'i', $articleId);
        mysqli_stmt_execute($relatedStmt);
        $relatedResult = mysqli_stmt_get_result($relatedStmt);

        if ($relatedResult) {
            while ($row = mysqli_fetch_assoc($relatedResult)) {
                $relatedStories[] = $row;
            }
        }

        mysqli_stmt_close($relatedStmt);
    }
}

$pageTitle = $article ? ($article['heading'] . ' - VMS Story') : 'Story - VMS';
$breadcrumbTrail = array(
    array('label' => 'Home', 'href' => 'index.php'),
    array('label' => 'News', 'href' => 'news.php'),
    array('label' => $article ? $article['heading'] : 'Story', 'current' => true)
);

include __DIR__ . '/partials/layout/page-start.php';

$contextEyebrow = 'Story Detail';
$contextTitle = $article ? $article['heading'] : 'News Story Not Found';
$contextText = $article
    ? 'This page provides the full article narrative with author details and quick access to related election stories.'
    : 'The requested story could not be found. You can return to the News page and browse the latest available updates.';
$contextActions = array(
    array('href' => 'news.php', 'label' => 'Back To News'),
    array('href' => 'results.php', 'label' => 'Open Result Dashboard')
);
$contextHighlights = array(
    array('title' => 'Editorial Context', 'text' => 'Read verified communications published by VMS contributors.'),
    array('title' => 'Related Navigation', 'text' => 'Use the side panel to continue reading connected stories.'),
    array('title' => 'Public Insight', 'text' => 'Combine story updates with live analytics for fuller understanding.')
);
include __DIR__ . '/partials/home/page-context.php';
?>

<section class="mx-auto max-w-7xl px-4 pb-14">
    <div class="grid gap-6 lg:grid-cols-[1.35fr_0.65fr]">
        <article class="vms-shadow overflow-hidden rounded-2xl border border-blue-100 bg-white">
            <?php if ($article) { ?>
                <div class="p-6 sm:p-8">
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[#1a56d6]">Published Story</p>
                    <h1 class="mt-2 text-2xl font-bold text-[#0b2a66] sm:text-3xl"><?php echo htmlspecialchars($article['heading']); ?></h1>

                    <p class="mt-3 text-sm text-slate-500">
                        By <?php echo htmlspecialchars($article['first_name'] . ' ' . $article['last_name']); ?>
                        on <?php echo htmlspecialchars(date('M d, Y', strtotime($article['date']))); ?>
                    </p>

                    <img class="mt-6 w-full rounded-2xl object-cover" src="data:image/jpeg;charset=utf8;base64,<?php echo base64_encode($article['image']); ?>" alt="Story image">

                    <div class="prose prose-slate mt-6 max-w-none text-slate-700">
                        <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="p-8">
                    <h2 class="text-xl font-semibold text-[#0b2a66]">Story unavailable</h2>
                    <p class="mt-2 text-sm text-slate-600">The story you requested was not found or may have been removed.</p>
                    <a href="news.php" class="mt-4 inline-flex rounded-xl bg-[#1a56d6] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#123f9f]">View Latest News</a>
                </div>
            <?php } ?>
        </article>

        <aside class="space-y-6">
            <section class="vms-shadow rounded-2xl border border-blue-100 bg-white p-6">
                <h2 class="text-lg font-semibold text-[#0b2a66]">Related Top Stories</h2>
                <?php if (!empty($relatedStories)) { ?>
                    <ul class="mt-4 space-y-3">
                        <?php foreach ($relatedStories as $index => $story) { ?>
                            <li>
                                <a href="read.php?a=<?php echo (int) $story['news_id']; ?>" class="group flex items-start gap-3 rounded-xl border border-blue-100 px-3 py-2 transition hover:border-blue-300 hover:bg-blue-50">
                                    <span class="rounded-md bg-[#1a56d6] px-2 py-1 text-xs font-semibold text-white"><?php echo (int) ($index + 1); ?></span>
                                    <span class="text-sm text-slate-700 group-hover:text-[#123f9f]"><?php echo htmlspecialchars($story['heading']); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p class="mt-3 text-sm text-slate-500">No related stories available.</p>
                <?php } ?>
            </section>

            <section class="vms-shadow rounded-2xl border border-blue-100 bg-white p-6">
                <h2 class="text-lg font-semibold text-[#0b2a66]">Follow VMS</h2>
                <ul class="mt-3 space-y-2 text-sm text-[#123f9f]">
                    <li><a href="#" class="transition hover:text-[#1a56d6]"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                    <li><a href="#" class="transition hover:text-[#1a56d6]"><i class="fa fa-twitter-square"></i> Twitter</a></li>
                    <li><a href="#" class="transition hover:text-[#1a56d6]"><i class="fa fa-youtube-square"></i> YouTube</a></li>
                    <li><a href="#" class="transition hover:text-[#1a56d6]"><i class="fab fa-whatsapp-square"></i> WhatsApp</a></li>
                </ul>
            </section>
        </aside>
    </div>
</section>

<?php
include __DIR__ . '/partials/layout/footer.php';
include __DIR__ . '/partials/layout/page-end.php';
