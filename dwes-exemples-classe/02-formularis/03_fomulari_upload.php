<DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Pujar Fitxer i Selecció Opció</title>
</head>
<body>
    <?php
    // Definim les opcions per al checkbox
    $opcions = ["Opció 1", "Opció 2", "Opció 3"];

    // Comprovem si el formulari ha estat enviat
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Comprovem si el fitxer ha estat pujat sense errors
        if (isset($_FILES["fitxer"]) && $_FILES["fitxer"]["error"] == 0) {
            $nom_fitxer = $_FILES["fitxer"]["name"];
            $tipus_fitxer = $_FILES["fitxer"]["type"];
            $mida_fitxer = $_FILES["fitxer"]["size"];
            $ubicacio_temporal = $_FILES["fitxer"]["tmp_name"];

            // Movem el fitxer a una ubicació permanent
            $ubicacio_destinacio = "uploads/" . basename($nom_fitxer);
            if (move_uploaded_file($ubicacio_temporal, $ubicacio_destinacio)) {
                echo "<p>El fitxer <strong>$nom_fitxer</strong> ha estat pujat correctament.</p>";
                echo "<p>Tipus de fitxer: $tipus_fitxer</p>";
                echo "<p>Mida del fitxer: " . ($mida_fitxer / 1024) . " KB</p>";
                echo "<p>Ubicació del fitxer: $ubicacio_destinacio</p>";
            } else {
                echo "<p>Error al moure el fitxer a la ubicació final.</p>";
            }
        } else {
            echo "<p>Error al pujar el fitxer.</p>";
        }

        // Comprovem si una opció del checkbox ha estat seleccionada
        if (isset($_POST['opcio'])) {
            $opcio_seleccionada = $_POST['opcio'];
            echo "<p>Has seleccionat: $opcio_seleccionada</p>";
        } else {
            echo "<p>No has seleccionat cap opció.</p>";
        }
    } else {
        ?>
        <h2>Formulari per Pujar Fitxer i Selecció d'Opció</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="fitxer">Selecciona un fitxer:</label>
            <input type="file" id="fitxer" name="fitxer" required><br><br>

            <label for="opcio">Selecciona una opció:</label><br>
            <?php
            foreach ($opcions as $opcio) {
                echo '<input type="checkbox" id="' . $opcio . '" name="opcio" value="' . $opcio . '">';
                echo '<label for="' . $opcio . '"> ' . $opcio . '</label><br>';
            }
            ?><br>

            <input type="submit" value="Enviar">
        </form>
        <?php
    }
    ?>
</body>
</html>
