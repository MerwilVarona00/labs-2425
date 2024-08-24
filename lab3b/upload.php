<?php

$upload_directories = [
    'text_file' => getcwd() . '/sample-files/text/',
    'audio_file' => getcwd() . '/sample-files/audio/',
    'image_file' => getcwd() . '/sample-files/images/',
    'video_file' => getcwd() . '/sample-files/videos/'
];

// Ensure the directories exist
foreach ($upload_directories as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true); // Create directories if they don't exist
    }
}

function handle_upload($file_key, $allowed_types, $upload_dir) {
    if (isset($_FILES[$file_key]) && $_FILES[$file_key]['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES[$file_key];
        $file_type = pathinfo($file['name'], PATHINFO_EXTENSION);

        // Validate file type
        if (in_array($file_type, $allowed_types)) {
            $uploaded_file = $upload_dir . basename($file['name']);
            $temporary_file = $file['tmp_name'];

            if (move_uploaded_file($temporary_file, $uploaded_file)) {
                if ($file_type === 'txt') {
                    $file_content = file_get_contents($uploaded_file);
                    echo "<h3>File Content:</h3>";
                    echo "<textarea cols='70' rows='30'>" . htmlspecialchars($file_content) . "</textarea>";
                } elseif (in_array($file_type, ['jpg', 'jpeg', 'png'])) {
                    echo "<h3>Uploaded Image:</h3>";
                    echo "<img src='sample-files/images/" . htmlspecialchars(basename($file['name'])) . "' alt='Uploaded Image' />";
                } elseif ($file_type === 'mp3') {
                    echo "<h3>Uploaded Audio:</h3>";
                    echo "<audio controls>
                            <source src='sample-files/audio/" . htmlspecialchars(basename($file['name'])) . "' type='audio/mpeg'>
                            Your browser does not support the audio element.
                          </audio>";
                } elseif ($file_type === 'mp4') {
                    echo "<h3>Uploaded Video:</h3>";
                    echo "<video controls width='600'>
                            <source src='sample-files/videos/" . htmlspecialchars(basename($file['name'])) . "' type='video/mp4'>
                            Your browser does not support the video tag.
                          </video>";
                }
            } else {
                echo 'Failed to upload ' . htmlspecialchars($file_key) . ' file';
            }
        } else {
            echo 'Invalid file type for ' . htmlspecialchars($file_key) . ' file';
        }
    } elseif (isset($_FILES[$file_key]) && $_FILES[$file_key]['error'] !== UPLOAD_ERR_NO_FILE) {
        echo 'Error uploading ' . htmlspecialchars($file_key) . ' file';
    }
}

// Handle each file type
handle_upload('text_file', ['txt'], $upload_directories['text_file']);
handle_upload('audio_file', ['mp3'], $upload_directories['audio_file']);
handle_upload('image_file', ['jpg', 'jpeg', 'png'], $upload_directories['image_file']);
handle_upload('video_file', ['mp4'], $upload_directories['video_file']);

echo '<pre>';
var_dump($_FILES);
echo '</pre>';
?>
