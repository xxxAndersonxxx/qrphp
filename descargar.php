<?php
    if (isset($_GET['cod'])) {
        $imageURL = $_GET['cod'];
        $imageURL = dirname(realpath($_SERVER['SCRIPT_FILENAME'])).''.$imageURL;
        header('Content-Type: image/png'); // Set the content type to PNG
        header('Content-Disposition: attachment; filename="'.basename($imageURL).'"'); // Set the filename

        $imageData = file_get_contents($imageURL); // Read the image data
        echo $imageData; // Output the image data to the browser
    }
?>