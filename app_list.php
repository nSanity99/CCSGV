<?php
session_start();

// Se non si è loggati si torna alla pagina di login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$user_role   = $_SESSION['ruolo'] ?? '';
$group_app   = $_SESSION['gruppo_app'] ?? '';
$group       = $_SESSION['gruppo_lavoro'] ?? '';
$username_display = htmlspecialchars($_SESSION['username'] ?? '');
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleziona Applicazione - Gruppo Vitolo</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; }
        .app-list-container { text-align: center; max-width: 800px; width: 100%; }
        .app-list-container h1 { margin-bottom: 10px; }
        .app-list-container p { margin-bottom: 30px; color: #6c757d; }
    </style>
</head>
<body>
<div class="app-list-container">
    <h1>Benvenuto <?php echo $username_display; ?></h1>
    <p>Scegli l'applicazione a cui accedere</p>
    <div class="tool-cards-grid">
        <a href="dashboard.php" class="tool-card">
            <div class="tool-card-header">
                <div class="tool-card-icon">🛒</div>
                <h3 class="tool-card-title">Acquisti/Segnalazioni</h3>
            </div>
            <p class="tool-card-description">Gestisci ordini e segnalazioni</p>
        </a>
        <?php if($user_role === 'admin' || $group_app === 'CCSUD'): ?>
        <a href="mondo_ccsud.php" class="tool-card">
            <div class="tool-card-header">
                <div class="tool-card-icon">🌐</div>
                <h3 class="tool-card-title">Mondo CCSUD</h3>
            </div>
            <p class="tool-card-description">Accedi all'area CCSUD</p>
        </a>
        <?php endif; ?>
    </div>
    <div class="footer-logo-area">
        <img src="assets/logo.png" alt="Logo Gruppo Vitolo">
    </div>
</div>
</body>
</html>
