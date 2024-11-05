<?php
$host = 'localhost';
$db = 'store';
$user = 'root';
$password = '';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?> - Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <div class="details-container">
        <div class="slider">
            <div class="slides">
                <img src="<?php echo htmlspecialchars($product['image']); ?>"
                    alt="<?php echo htmlspecialchars($product['name']); ?>">
                <img src="extra_image1.jpg" alt="Extra Image 1">
                <img src="extra_image2.jpg" alt="Extra Image 2">
            </div>
        </div>
        <p>Description: <?php echo htmlspecialchars($product['description']); ?></p>
        <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
        <button class="add-to-cart-btn">Add to Cart</button>
    </div>
    <script src="script.js"></script>
</body>

</html>