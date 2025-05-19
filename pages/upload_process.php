<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $uploadDir = __DIR__ . '/../uploads/';
        $filename = basename($_FILES['image']['name']);
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // Create unique filename to avoid overwriting
        $newFilename = uniqid('img_', true) . '.' . $extension;
        $targetPath = $uploadDir . $newFilename;

        // Allowed file types
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $allowed)) {
            exit("Unsupported file type.");
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            echo "Image uploaded successfully!<br>";
            echo "<img src='../uploads/$newFilename' width='200'>";
        } else {
            echo "Upload failed. Please try again.";
        }

    } else {
        echo "No file uploaded or error occurred.";
    }
} else {
    header("Location: upload_test.php");
    exit;
}
