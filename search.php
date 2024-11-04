<<?php
$host = 'localhost';
$db = 'store';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "
    SELECT products.name AS product_name, products.price, products.image, artists.name AS artist_name 
    FROM products 
    LEFT JOIN artists ON products.artist_id = artists.id
    WHERE products.name LIKE ? OR artists.name LIKE ?
";

$stmt = $conn->prepare($sql);
$searchTerm = '%' . $query . '%';
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>Search Results for '" . htmlspecialchars($query) . "':</h2>";
    echo '<section class="products">';  
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="search-results">';  
        echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["product_name"]) . '" class="product-image">';
        echo '<h3 class="product-title">' . htmlspecialchars($row["product_name"]) . '</h3>';
        echo '<p class="product-artist">Artist: ' . htmlspecialchars($row["artist_name"]) . '</p>';
        echo '<p class="product-price">Price: $' . htmlspecialchars($row["price"]) . '</p>';
        echo '<button class="add-to-cart-btn">Add to Cart</button>';
        echo '</div>';  
    }

    echo '</section>'; 
} else {
    echo "<p>No results found for '" . htmlspecialchars($query) . "'</p>";
}