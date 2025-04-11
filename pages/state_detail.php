<?php
// Path: /pages/state_detail.php

// Include database connection
include_once '../includes/db_connect.php';

// Get state ID from URL
$state_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Prepare query to get state information
$state_query = "SELECT * FROM states WHERE state_id = ?";
$stmt = $conn->prepare($state_query);
$stmt->bind_param("i", $state_id);
$stmt->execute();
$state_result = $stmt->get_result();

// If state exists, fetch it
if($state_result && $state_result->num_rows > 0) {
    $state = $state_result->fetch_assoc();
    $state_name = $state['state_name'];
    $state_description = $state['state_description'];
    $import_volume = $state['import_volume'];
    $top_import_category = $state['top_import_category'];
    $import_growth_rate = $state['import_growth_rate'];
} else {
    // Fallback or redirect if state not found
    header("Location: ../pages/states.php");
    exit();
}

// Get import categories for this state
$categories_query = "SELECT DISTINCT c.category_id, c.category_name, c.category_description 
                     FROM categories c 
                     JOIN product_imports pi ON c.category_id = pi.category_id 
                     WHERE pi.state_id = ?";
$stmt = $conn->prepare($categories_query);
$stmt->bind_param("i", $state_id);
$stmt->execute();
$categories_result = $stmt->get_result();
$categories = [];

if($categories_result && $categories_result->num_rows > 0) {
    while($row = $categories_result->fetch_assoc()) {
        $categories[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($state_name); ?> - Import Details</title>
    <link rel="stylesheet" href="../public/css/states.css">
    <!-- Additional styles remain the same -->
    <style>
        /* Your existing CSS styles */
    </style>
</head>
<body>
    <div class="navbar">
        <a href="../pages/states.php" class="back-link">Back to States</a>
        <div><?php echo htmlspecialchars($state_name); ?> Imports</div>
    </div>
    
    <div class="state-details">
        <h1><?php echo htmlspecialchars($state_name); ?></h1>
        <p><?php echo htmlspecialchars($state_description); ?></p>
        
        <div class="state-stats">
            <div class="stat-item">
                <h3>Total Import Volume</h3>
                <p>₹<?php echo number_format(htmlspecialchars($import_volume)); ?></p>
            </div>
            <div class="stat-item">
                <h3>Top Import Category</h3>
                <p><?php echo htmlspecialchars($top_import_category); ?></p>
            </div>
            <div class="stat-item">
                <h3>Import Growth Rate</h3>
                <p><?php echo htmlspecialchars($import_growth_rate); ?>%</p>
            </div>
        </div>
        
        <h2>Major Imports in this State</h2>
        
        <?php if(count($categories) > 0): ?>
            <?php foreach($categories as $category): ?>
                <div class="category-section">
                    <h3><?php echo htmlspecialchars($category['category_name']); ?></h3>
                    <p><?php echo htmlspecialchars($category['category_description']); ?></p>
                    
                    <?php
                    // Get products in this category for this state
                    $products_query = "SELECT * FROM product_imports 
                                       WHERE state_id = ? AND category_id = ?";
                    $stmt = $conn->prepare($products_query);
                    $stmt->bind_param("ii", $state_id, $category['category_id']);
                    $stmt->execute();
                    $products_result = $stmt->get_result();
                    ?>
                    
                    <div class="import-items">
                        <?php if($products_result && $products_result->num_rows > 0): ?>
                            <?php while($product = $products_result->fetch_assoc()): ?>
                                <div class="import-item">
                                    <h4><?php echo htmlspecialchars($product['product_name']); ?></h4>
                                    <p><strong>Origin:</strong> <?php echo htmlspecialchars($product['origin_country']); ?></p>
                                    <p><strong>Import Value:</strong> ₹<?php echo number_format(htmlspecialchars($product['import_value'])); ?></p>
                                    <p><strong>Annual Volume:</strong> <?php echo number_format(htmlspecialchars($product['import_volume'])); ?> units</p>
                                    <p><strong>Import Year:</strong> <?php echo htmlspecialchars($product['import_year']); ?></p>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <p>No products found in this category for this state.</p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No import categories found for this state.</p>
        <?php endif; ?>
    </div>
</body>
</html>