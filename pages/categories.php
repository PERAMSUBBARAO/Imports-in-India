<?php // include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories of Imports in India</title>
    <link rel="stylesheet" href="/import/public/css/categories.css"> <!-- External CSS File -->
    <link rel="stylesheet" href="../public/css/categories_detail.css"> <!-- External CSS File for Category Details -->
</head>
<body>
    <div class="overlay"></div>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="../pages/home.php" class="back-link">Back to Home</a>
        <div>Various Categories of Imports in India</div>
    </div>

    <!-- Category Cards Generated with Manual Image Paths -->
    <div class="category-container">
        <?php
            $categories = [
                "Agricultural Products", "Automobiles and Parts", "Aviation and Aerospace", "Base Metals", 
                "Beverages (Alcoholic and Non-Alcoholic)", "Chemicals (Organic, Inorganic, Specialty)", 
                "Clothing & Textiles", "Cosmetics & Personal Care Products", "Electrical Machinery & Equipment", 
                "Energy Products (Oil, Gas, Coal, etc.)", "Fertilizers", "Fish and Seafood", "Footwear", 
                "Furniture and Home Goods", "Gems & Jewelry", "Glass and Ceramics", "Iron & Steel", 
                "Leather & Leather Products", "Machinery (Industrial, Electrical, etc.)", 
                "Medical & Pharmaceutical Products", "Mineral Fuels (Crude Oil, Natural Gas, etc.)", 
                "Natural Resources (Wood, Timber, etc.)", "Oils & Fats (Vegetable, Animal, etc.)", 
                "Organic Chemicals", "Paper & Paper Products", "Pharmaceuticals & Drugs", "Plastics & Plastic Articles", 
                "Precious Metals (Gold, Silver, etc.)", "Precious Stones & Gems", "Rubber and Rubber Articles", 
                "Seafood and Fish Products", "Ships, Boats & Floating Structures", "Silicon, Silicon Wafers & Solar Panels", 
                "Steel Products", "Textiles (Yarn, Fabrics, Apparel)", "Tobacco and Tobacco Products", 
                "Vehicles (Cars, Trucks, etc.)", "Vegetables (Fresh, Frozen, Processed)", "Wood Products (Planks, Lumber, etc.)", 
                "Wines & Spirits", "Yarn and Fabrics", "Industrial Equipment and Parts", "Tools, Instruments, and Cutlery", 
                "Packaging Materials (Glass, Metal, etc.)", "Toys and Games", "Electrical & Electronics (Consumer Goods)", 
                "Minerals & Ores (Iron Ore, Coal, etc.)", "Building Materials (Cement, Tiles, etc.)", 
                "Sports Equipment and Goods", "Luxury Goods (Watches, Jewelry, etc.)"
            ];

            $imagePaths = [
                "../public/images/categories/img1.png", "../public/images/categories/img2.png", "../public/images/categories/img3.jpg",
                "../public/images/categories/img4.jpg", "../public/images/categories/img5.png", "../public/images/categories/img6.png",
                "../public/images/categories/img7.png", "../public/images/categories/img8.png", "../public/images/categories/img9.png",
                "../public/images/categories/img10.png", "../public/images/categories/img11.png", "../public/images/categories/img12.png",
                "../public/images/categories/img13.png", "../public/images/categories/img14.png", "../public/images/categories/img15.png",
                "../public/images/categories/img16.png", "../public/images/categories/img17.png", "../public/images/categories/img18.png",
                "../public/images/categories/img19.png", "../public/images/categories/img20.png", "../public/images/categories/img21.png",
                "../public/images/categories/img22.png", "../public/images/categories/img23.png", "../public/images/categories/img24.png",
                "../public/images/categories/img25.png", "../public/images/categories/img26.png", "../public/images/categories/img27.png",
                "../public/images/categories/img28.png", "../public/images/categories/img29.png", "../public/images/categories/img30.png",
                "../public/images/categories/img31.png", "../public/images/categories/img32.png", "../public/images/categories/img33.png",
                "../public/images/categories/img34.png", "../public/images/categories/img35.png", "../public/images/categories/img36.png",
                "../public/images/categories/img37.png", "../public/images/categories/img38.png", "../public/images/categories/img39.png",
                "../public/images/categories/img40.png", "../public/images/categories/img41.png", "../public/images/categories/img42.png",
                "../public/images/categories/img43.png", "../public/images/categories/img44.png", "../public/images/categories/img45.png",
                "../public/images/categories/img46.png", "../public/images/categories/img47.png", "../public/images/categories/img48.png",
                "../public/images/categories/img49.png", "../public/images/categories/img50.png"
            ];

            foreach ($categories as $index => $category) {
                $imagePath = $imagePaths[$index];
                echo "<div class='card'>";
                echo "    <div class='card-inner'>";
                echo "        <div class='card-front'>";
                echo "            <img src='$imagePath' alt='$category'>";
                echo "            <div class='semi-circle'>$category</div>";
                echo "        </div>";
                echo "    </div>";
                echo "</div>";
            }
        ?>
    </div>

    <script src="../public/js/categories.js"></script> <!-- External JS File -->
    <?php // include '../includes/footer.php'; ?>
</body>
</html>