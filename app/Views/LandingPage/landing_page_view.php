<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>
    <h1>Landing Page</h1>

    <h3>Misión</h3>
    <p><?= esc($landingPage['mission']); ?></p>

    <h3>Visión</h3>
    <p><?= esc($landingPage['vision']); ?></p>

    <h3>Objetivo</h3>
    <p><?= esc($landingPage['objective']); ?></p>

    <h3>Módulos</h3>
    <pre><?= esc($landingPage['modules']); ?></pre>
    
    <a href="/landingpage/edit/<?= $landingPage['id']; ?>">Editar</a>
</body>
</html>
