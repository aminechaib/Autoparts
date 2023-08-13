<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Image Upload and Resize</title>
</head>
<body>
    <input type="file" id="imageInput">
    <button id="uploadButton">Upload and Resize</button>
    <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            const input = document.getElementById('imageInput');
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = new Image();
                    img.src = e.target.result;

                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = 200;
                        canvas.height = 200;
                        ctx.drawImage(img, 0, 0, 200, 200);

                        const resizedDataURL = canvas.toDataURL('image/jpeg', 0.8);

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', 'upload.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                console.log(xhr.responseText);
                                location.reload(); // Reload the page to show the session variable
                            }
                        };
                        xhr.send('image=' + encodeURIComponent(resizedDataURL));
                    };
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
    <?php
    if(isset($_SESSION['uploaded_filename'])) {
        echo "the name is: " . basename($_SESSION['uploaded_filename']);
    }
    ?>
</body>
</html>