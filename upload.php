<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDirectory = 'uploads/'; // Répertoire où les fichiers seront téléchargés

    $uploadedFile = $_FILES['file'];
    $fileName = $uploadedFile['name'];
    $fileTmpName = $uploadedFile['tmp_name'];
    $fileError = $uploadedFile['error'];

    // Vérifier s'il n'y a pas d'erreur lors du téléchargement
    if ($fileError === UPLOAD_ERR_OK) {
        // Déplacer le fichier téléchargé vers le répertoire de destination
        $destination = $uploadDirectory . $fileName;
        if (move_uploaded_file($fileTmpName, $destination)) {
            echo "Le fichier $fileName a été téléchargé avec succès.";
        } else {
            echo "Une erreur s'est produite lors du téléchargement du fichier.";
        }
    } else {
        echo "Erreur lors du téléchargement du fichier. Code d'erreur : $fileError";
    }
} else {
    echo "Une erreur s'est produite lors de l'envoi du formulaire.";
}
?>
