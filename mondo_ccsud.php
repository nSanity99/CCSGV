<?php
session_start();

// Verifica accesso e permessi
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$user_role  = $_SESSION['ruolo'] ?? '';
$group_app  = $_SESSION['gruppo_app'] ?? '';
$group      = $_SESSION['gruppo_lavoro'] ?? '';

if ($user_role !== 'admin' && $group_app !== 'CCSUD') {
    // accesso negato se non amministratore o appartenente al gruppo CCSUD
    header('Location: app_list.php');
    exit;
}

$username_display = htmlspecialchars($_SESSION['username'] ?? '');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mondo CCSUD - Gruppo Vitolo</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body { display:flex; flex-direction:column; align-items:center; padding-top:40px; }
        .content { text-align:center; max-width:800px; }
    </style>
</head>
<body>
    <div class="content">
        <h1>Mondo CCSUD</h1>
        <p>Benvenuto <?php echo $username_display; ?>.</p>
        <p>La dashboard &egrave; in fase di realizzazione.</p>
        <a href="app_list.php" class="nav-link-button">&larr; Torna alla scelta applicazioni</a>
    </div>
</body>
</html>
