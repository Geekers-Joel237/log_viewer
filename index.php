<!DOCTYPE html>
<html>
<head>
    <title>Log Viewer</title>
    <!-- Liens vers les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Log Viewer</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                function lireFichierLog($nomFichier) {
                    $contenu = file_get_contents($nomFichier);
                    return $contenu !== false ? $contenu : '';
                }

                $fichierLog = 'logger.log';

                $contenuLog = lireFichierLog($fichierLog);

                if (!empty($contenuLog)) {
                    $lignes = explode("\n", $contenuLog);
                    foreach ($lignes as $ligne) {
                        list($date, $message) = explode('----->>>>>', $ligne, 2);
                        if ($date !== null && $message !== null) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($date) . '</td>';
                            echo '<td>' . htmlspecialchars($message) . '</td>';
                            echo '</tr>';
                        }
                    }
                } else {
                    echo '<p class="text-danger">Le fichier de log est vide ou inaccessible.</p>';
                }
                
                ?>
            </tbody>
        </table>
    </div>
    <!-- Liens vers les fichiers JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
