<?php // include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imports by States</title>
    <link rel="stylesheet" href="/import/public/css/states.css"> <!-- External CSS File -->
    <!--<link rel="stylesheet" href="../public/css/state_detail.css">-->
</head>

<body>
    <div class="overlay"></div>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="../pages/home.php" class="back-link">Back to Home</a>
        <div>Imports in various states of India</div>
    </div>

    <!-- State Cards Generated Dynamically -->
    <div class="state-container">
        <?php
            $states = [
                "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chhattisgarh", "Goa", "Gujarat",
                "Haryana", "Himachal Pradesh", "Jharkhand", "Karnataka", "Kerala", "Madhya Pradesh", "Maharashtra",
                "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha", "Punjab", "Rajasthan",
                "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttar Pradesh", "Uttarakhand", "West Bengal"
            ];

            $imagePaths = [
                "../public/images/states/img1.png", "../public/images/states/img2.png", "../public/images/states/img3.png",
                "../public/images/states/img4.png", "../public/images/states/img5.png", "../public/images/states/img6.png",
                "../public/images/states/img7.png", "../public/images/states/img8.png", "../public/images/states/img9.png",
                "../public/images/states/img10.png", "../public/images/states/img11.png", "../public/images/states/img12.png",
                "../public/images/states/img13.png", "../public/images/states/img14.png", "../public/images/states/img15.png",
                "../public/images/states/img16.png", "../public/images/states/img17.png", "../public/images/states/img18.png",
                "../public/images/states/img19.png", "../public/images/states/img20.png", "../public/images/states/img21.png",
                "../public/images/states/img22.png", "../public/images/states/img23.png", "../public/images/states/img24.png",
                "../public/images/states/img25.png", "../public/images/states/img26.png", "../public/images/states/img27.png",
                "../public/images/states/img28.png"
            ];

            foreach ($states as $index => $state) {
                $imagePath = $imagePaths[$index];
                echo "<div class='card'>";
                echo "    <div class='card-inner'>";
                echo "        <div class='card-front'>";
                echo "            <img src='$imagePath' alt='$state'>";
                echo "            <div class='semi-circle'>$state</div>";
                echo "        </div>";
                echo "    </div>";
                echo "</div>";
            }
        ?>
    </div>

    <script src="../public/js/states.js"></script> <!-- External JS File -->
    <?php // include '../includes/footer.php'; ?>
</body>
</html>
