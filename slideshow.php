<?php
// Directory containing your images (adjust the path as per your directory structure)
$imageDir = 'Software/';

// Array of image files
$images = glob($images . '*.{jpg,jpeg,png,}', GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slideshow Example</title>
    <style>
        /* CSS for slideshow container and images */
        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
        }
        .mySlides {
            display: none;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="slideshow-container">
        <?php
        // Generate img tags for each image
        foreach ($images as $image) {
            echo '<img class="mySlides" src="' . $image . '" alt="Slide">';
        }
        ?>
    </div>

    <script>
        // JavaScript for slideshow functionality
        var slideIndex = 0;
        carousel();

        function carousel() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>
</body>
</html>
