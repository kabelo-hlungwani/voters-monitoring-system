<?php
if (!isset($conn)) {
    include_once __DIR__ . '/../../connect.php';
}

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$newsItems = array();
$partyCodes = array();
$voteTotals = array();
$totalVotes = 0;
$leaderParty = '';
$leaderPercentage = 0;
$comments = array();

$newsSql = "SELECT newsfeed.news_id, newsfeed.image, newsfeed.heading, staff.first_name, staff.last_name
            FROM newsfeed
            INNER JOIN staff ON staff.staff_id = newsfeed.staff_id
            ORDER BY newsfeed.news_id DESC";
$newsResult = mysqli_query($conn, $newsSql);

if (!$newsResult) {
    $newsFallback = "SELECT newsfeed.news_id, newsfeed.image, newsfeed.heading, staff.first_name, staff.last_name
                     FROM newsfeed, staff";
    $newsResult = mysqli_query($conn, $newsFallback);
}

if ($newsResult) {
    while ($row = mysqli_fetch_assoc($newsResult)) {
        $newsItems[] = $row;
    }
}

$votesSql = "SELECT party.party_code AS CODE, SUM(tblvote.total) AS VOTES
             FROM tblvote
             INNER JOIN party ON party.party_id = tblvote.party_id
             WHERE tblvote.approved='1'
             GROUP BY tblvote.party_id";
$votesResult = mysqli_query($conn, $votesSql);

if (!$votesResult) {
    $votesFallback = "SELECT party.party_code AS CODE, SUM(tblvote.total) AS VOTES
                      FROM tblvote, party
                      WHERE tblvote.approved='1' AND party.party_id = tblvote.party_id
                      GROUP BY tblvote.party_id";
    $votesResult = mysqli_query($conn, $votesFallback);
}

if ($votesResult) {
    while ($row = mysqli_fetch_assoc($votesResult)) {
        $code = $row['CODE'];
        $votes = (float) $row['VOTES'];

        $partyCodes[] = $code;
        $voteTotals[] = $votes;
        $totalVotes += $votes;
    }
}

if (!empty($voteTotals) && $totalVotes > 0) {
    $maxVotes = max($voteTotals);
    $leaderIndex = array_search($maxVotes, $voteTotals);

    if ($leaderIndex !== false) {
        $leaderParty = $partyCodes[$leaderIndex];
        $leaderPercentage = ($maxVotes / $totalVotes) * 100;
    }
}

$commentsSql = "SELECT name, message, time FROM community_comment ORDER BY time DESC LIMIT 50";
$commentsResult = mysqli_query($conn, $commentsSql);

if ($commentsResult) {
    while ($row = mysqli_fetch_assoc($commentsResult)) {
        $comments[] = $row;
    }
}
