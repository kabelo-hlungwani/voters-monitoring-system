<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'VMS'; ?></title>
    <link rel="icon" href="assets/img/lo.png">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui'],
                        display: ['Montserrat', 'ui-sans-serif', 'system-ui']
                    }
                }
            }
        };
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/home-modern.css">
</head>
<body>
    <?php include __DIR__ . '/topbar.php'; ?>
    <?php include __DIR__ . '/navbar.php'; ?>
    <?php include __DIR__ . '/breadcrumb.php'; ?>
    <?php include __DIR__ . '/quick-actions.php'; ?>
