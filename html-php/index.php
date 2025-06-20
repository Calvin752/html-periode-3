<?php
require 'database.php';
if (!isset($_GET['username'])) {
die("Geen gebruikersnaam opgegeven.");
}
$username = $_GET['username'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();
if (!$user) {
die("Gebruiker niet gevonden.");
}

$stmt = $pdo->prepare("SELECT * FROM recent_activity WHERE user_id = ?");
$stmt->execute([$user['id']]);
$recentActivity = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Steam Profile Page</title>
</head>
<body>
    <header>
        <img src="img/logo_steam.svg" alt="logo_steam.svg">
        <nav>
            <ul>
                <a href="Store">STORE</a>
                <a href="Community">COMMUNITY</a>
                <a href="Profile">GAMER123</a>
                <a href="Chat">CHAT</a>
                <a href="Support">SUPPORT</a>
            </ul>
        </nav>
    </header>

    <section class="profile-info">
        <img src="img/pf.jpg" alt="pf.jpg" class="avatar">
        <div class="info">
            <h2><?= $user['username'] ?></h2>
            <p>Nederland</p>
            <p>No information given.</p>
            <p>Level 25</p>
            <span class="Badge">Badges 20</span>            
        </div>       
    </section>

    <section class="recent">
        <h2>Recent Activity</h2>
        <ul>            
                <li>
                    <img src="img/recent_games/cs2.webp" alt="cs2.webp">
                <span>10.5 uur gespeeld</span>
            </li>
                <li>
                    <img src="img/recent_games/cyberpunk.png" alt="cyberpunk.png"> 
                <span>5.3 uur gespeeld</span>
            </li>
            <li>
                <img src="img/recent_games/eldenring.jpg" alt="eldenring.jpg">
                <span>20.1 uur gespeeld</span>
            </li>         
        </ul>
    </section>

    <section class="status">
        <span class="online">Currently Online</span>        
    </section>
</body>
</html>