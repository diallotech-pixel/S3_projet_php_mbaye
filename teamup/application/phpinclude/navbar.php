<?php
$json = file_get_contents(__DIR__ . '/menu.json');
$menu = json_decode($json, true);

$themes = [
    0 => 'Thème',
    1 => 'Clair',
    2 => 'Foncé',
];

// Récupérer le thème actuel (passé depuis index.php)
$theme_actuel = isset($theme) ? $theme : 0;
?>
<nav class="navbar navbar-expand-lg" style="background-color: #a8d8ea;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <span style="background-color:#555; color:white; border-radius:50%; padding:5px 10px;">team</span>
            <span style="background-color:#4fc3f7; color:white; border-radius:50%; padding:2px 6px; font-size:0.8rem; position:relative; top:-8px;">up</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php foreach ($menu as $item): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $item['href']; ?>">
                            <?php echo $item['label']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Formulaire sélection du thème -->
            <form method="POST" action="index.php" class="d-flex align-items-center ms-3">
                <select
                    name="lst_theme"
                    class="form-select form-select-sm"
                    onchange="this.form.submit()">
                    <?php foreach ($themes as $valeur => $libelle): ?>
                        <option
                            value="<?php echo $valeur; ?>"
                            <?php echo ($theme_actuel == $valeur) ? 'selected' : ''; ?>>
                            <?php echo $libelle; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>

        </div>
    </div>
</nav>