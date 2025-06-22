<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinZz - Financial Management</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-content">
            <div class="logo">
    <img src="img/img.png" alt="FinZ Logo" class="logo-icon">
</div>
<div class="user-greeting">
    Hey, User! 
    <img src="img/user.png" alt="User Icon" class="user-icon">
</div>

            </div>
        </header>
        
        <main>
            <?= $content ?? '' ?>
        </main>
    </div>
    
    <script src="js/app.js"></script>
</body>
</html>