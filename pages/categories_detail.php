<?php
// Include database connection
include_once '../includes/db_connect.php';

// Get category ID from URL
$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Prepare query to get category information
$category_query = "SELECT * FROM categories WHERE category_id = ?";
$stmt = $conn->prepare($category_query);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$category_result = $stmt->get_result();

// If category exists, fetch it
if($category_result && $category_result->num_rows > 0) {
    $category = $category_result->fetch_assoc();
    $category_name = $category['category_name'];
    $category_description = $category['category_description'];
    $annual_import_value = $category['annual_import_value'];
    $main_source_countries = $category['main_source_countries'];
    $import_growth_rate = $category['import_growth_rate'];
} else {
    // Fallback or redirect if category not found
    echo "<p>Error: Category with ID $category_id not found</p>";
    exit;
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
    <title><?php echo htmlspecialchars($category_name); ?> - Import Details</title>
    <link rel="stylesheet" href="../public/css/categories.css">
</head>
<body>
    <div class="navbar">
        <a href="../pages/categories.php" class="back-link">Back to Categories</a>
        <div><?php echo htmlspecialchars($category_name); ?> Imports</div>
    </div>
    
    <div class="category-details">
        <h1><?php echo htmlspecialchars($category_name); ?></h1>
        <p><?php echo htmlspecialchars($category_description); ?></p>
        
        <div class="category-stats">
            <div class="stat-item">
                <h3>Annual Import Value</h3>
                <p>₹<?php echo number_format(htmlspecialchars($annual_import_value)); ?></p>
            </div>
            <div class="stat-item">
                <h3>Main Source Countries</h3>
                <p><?php echo htmlspecialchars($main_source_countries); ?></p>
            </div>
            <div class="stat-item">
                <h3>Import Growth Rate</h3>
                <p><?php echo htmlspecialchars($import_growth_rate); ?>%</p>
            </div>
        </div>
        
        <h2>States Importing this Category</h2>
        
        <?php
        // Get states that import this category
        $states_query = "SELECT DISTINCT s.state_id, s.state_name, s.state_description 
                        FROM states s 
                        JOIN product_imports pi ON s.state_id = pi.state_id 
                        WHERE pi.category_id = ?";
        
        $states_stmt = $conn->prepare($states_query);
        
        if (!$states_stmt) {
            echo "<p>Error preparing states query: " . $conn->error . "</p>";
        } else {
            $states_stmt->bind_param("i", $category_id);
            $states_stmt->execute();
            $states_result = $states_stmt->get_result();
            $states = [];
            
            if($states_result && $states_result->num_rows > 0) {
                while($row = $states_result->fetch_assoc()) {
                    $states[] = $row;
                }
                
                foreach($states as $state) {
                    echo "<div class='state-section'>";
                    echo "<h3>" . htmlspecialchars($state['state_name']) . "</h3>";
                    echo "<p>" . htmlspecialchars($state['state_description']) . "</p>";
                    
                    // Get products in this category for this state
                    $products_query = "SELECT * FROM product_imports 
                                    WHERE state_id = ? AND category_id = ?";
                    $products_stmt = $conn->prepare($products_query);
                    
                    if (!$products_stmt) {
                        echo "<p>Error preparing products query: " . $conn->error . "</p>";
                    } else {
                        $products_stmt->bind_param("ii", $state['state_id'], $category_id);
                        $products_stmt->execute();
                        $products_result = $products_stmt->get_result();
                        
                        echo "<div class='import-items'>";
                        
                        if($products_result && $products_result->num_rows > 0) {
                            while($product = $products_result->fetch_assoc()) {
                                echo "<div class='import-item'>";
                                echo "<h4>" . htmlspecialchars($product['product_name']) . "</h4>";
                                echo "<p><strong>Origin:</strong> " . htmlspecialchars($product['origin_country']) . "</p>";
                                echo "<p><strong>Import Value:</strong> ₹" . number_format(htmlspecialchars($product['import_value'])) . "</p>";
                                echo "<p><strong>Annual Volume:</strong> " . number_format(htmlspecialchars($product['import_volume'])) . " units</p>";
                                echo "<p><strong>Import Year:</strong> " . htmlspecialchars($product['import_year']) . "</p>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No products found in this category for this state.</p>";
                        }
                        
                        echo "</div>"; // Close import-items
                    }
                    
                    echo "</div>"; // Close state-section
                }
            } else {
                echo "<p>No states found importing this category.</p>";
            }
        }
        ?>
    </div>
</body>
</html>