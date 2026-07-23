<?php
$currentPage = 'contact';
$loadHomeData = true;
$handleContactForm = true;
$contactRedirect = 'contact.php';
include __DIR__ . '/partials/controllers/site-controller.php';

include __DIR__ . '/partials/layout/page-start.php';

$contextEyebrow = 'Support And Participation';
$contextTitle = 'Contact The VMS Team';
$contextText = 'Send enquiries, ask election process questions, or share local voting experiences. You can also review recent community comments and continue the public conversation.';
$contextActions = array(
    array('href' => 'comment.php', 'label' => 'Add Community Comment'),
    array('href' => 'https://www.elections.org.za/pw/', 'label' => 'Official IEC Website')
);
$contextHighlights = array(
    array('title' => 'Direct Support', 'text' => 'Reach the VMS team for process clarifications and assistance.'),
    array('title' => 'Public Conversation', 'text' => 'Review what communities are reporting in comments and feedback.'),
    array('title' => 'Trusted Sources', 'text' => 'Jump to official IEC resources for broader election information.')
);
include __DIR__ . '/partials/home/page-context.php';

include __DIR__ . '/partials/home/contact.php';
include __DIR__ . '/partials/home/community.php';
include __DIR__ . '/partials/layout/footer.php';
include __DIR__ . '/partials/layout/page-end.php';
