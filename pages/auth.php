<!DOCTYPE html>
<html>
<head>
    <title>Netcheap</title>
    <link rel="stylesheet" type="text/css" href="../css/auth.css">
    <link rel="icon" href="../pages/favicon.ico" type="image/x-icon">
</head>
<body>
    <div id="main-page">
        <img src="../images/logo.png" id="logo">
        <div id="auth-container">
                <h1>S'identifier</h1>
                <form id="auth-form" action="../includes/auth_process.php" method="POST">
                    <input type="text" name="username" placeholder="Nom d'utilisateur">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <input id=submit-btn type="submit" name="submit" value="S'identifier">
                </form>
        </div>
    </div>
</body>
</html>
