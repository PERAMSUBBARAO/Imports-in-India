<?php
 // include 'includes/header.php'; // Include header
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Imports in India</title>
  <link rel="stylesheet" href="../public/css/home.css"> <!-- External CSS File -->
</head>
<body>
  <!-- Full Screen Video Background -->
  <video id="video-background" class="video-background" autoplay muted>
    <source src="../public/images/home/home.mp4" type="video/mp4">
  </video>

  <div class="hero-section">
    <div class="info-container">
      <h1>IMPORTS IN INDIA</h1>
      <p><b>India is one of the largest importers of goods in the world, bringing in essential resources, technology, and consumer 
        products. "Our Import Database provides comprehensive and up-to-date information on goods imported into India, including product 
        categories, trade volumes, and origin countries. It serves as a valuable resource for businesses, policymakers, and 
        researchers to analyze trends, ensure compliance, and optimize trade strategies."</b></p>
    </div>
  </div>
  
  <div class="cards-section">
    <a href="../pages/import.php" class="card">
      <img src="../public/images/home/card1.jpeg" alt="Import 1">
      <div class="card-overlay">
        <p>Why India Needs Imports?</p>
      </div>
    </a>
    <a href="../pages/states.php" class="card">
      <img src="../public/images/home/card2.jpg" alt="Import 2">
      <div class="card-overlay">
        <p>Imports Based on States</p>
      </div>
    </a>
    <a href="../pages/categories.php" class="card">
      <img src="../public/images/home/card3.jpg" alt="Import 3">
      <div class="card-overlay">
        <p>Imports Based on Category</p>
      </div>
    </a>
  </div>

  <script src="../public/js/home.js"></script> <!-- External JS File -->

<?php
  //include 'includes/footer.php'; // Include footer
?>
</body>
</html>
