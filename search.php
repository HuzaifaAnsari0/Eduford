<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="eduford_img/onlyCap.png">
        <title>Eduford</title>
        <style>
.result, .product {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    background-color: #EEEEEE; 
}

.result:hover, .product:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.result-content, .product-content {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 70%;
}

.result-image, .product-image {
    width: 387.297px;
    height: 258.031px;
    border-radius: 10px;
}
.home-button {
    display: block;
    margin: auto;
    background-color: orange;
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
    width: 150px;
}

.home-button:hover {
    background-color: orange;
    transform: scale(1.05); /* Add this line */
}
    </style>
    </head>
    
    <body>
        
    </body>
    </html>

 
 <?php

// search.php

// ... Database connection code ...
$dbhost = "localhost";
$dbname = "Eduford";
$dbuser = "postgres";
$dbpass = "1234";

$conn = pg_connect("host=$dbhost dbname=$dbname user=$dbuser password=$dbpass");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

$query = $_GET['query']; // Get the search query

// Execute a SQL query to search the programs table
$sql1 = "SELECT * FROM programs WHERE p_name ILIKE '%$query%'";

$result1 = pg_query($conn, $sql1);

if ($result1 === FALSE) {
    die("SQL query failed: " . pg_last_error($conn));
}

if (pg_num_rows($result1) > 0) {
    // Output data of each row
    while($row = pg_fetch_assoc($result1)) {
        // for programs
        // ... Display the search results ...
        echo "<div class='product'>";
        echo "<div class='product-content'>";
        echo "<h2 class='product-name'>" . htmlspecialchars($row['p_name']) . "</h2>";
        echo "<p class='product-description'>" . htmlspecialchars($row['p_description']) . "</p>";
        echo "<p class='product-duration'>Duration: " . htmlspecialchars($row['p_duration']) . "</p>";
        echo "<p class='product-fees'>Fees: " . htmlspecialchars($row['p_fees']) . "</p>";
        echo "<hr class='product-divider'>";
        echo "</div>"; // Close the product-content div
        echo "<img class='product-image' src='" . htmlspecialchars($row['p_image']) . "' alt='" . htmlspecialchars($row['p_name']) . "'>";
        echo "</div>"; // Close the product div
    }
    echo "<a href='index.php' class='home-button'>Go Back to Home</a>";
} else {
    // If no results found in programs, search the institutions table
    $sql2 = "SELECT * FROM institutions WHERE i_name ILIKE '%$query%'";
    $result2 = pg_query($conn, $sql2);

    if ($result2 === FALSE) {
        die("SQL query failed: " . pg_last_error($conn));
    }

    if (pg_num_rows($result2) > 0) {
        // Output data of each row
        while($row = pg_fetch_assoc($result2)) {
            // for institutions
            // ... Display the search results ...
            echo "<div class='result'>";
            echo "<div class='result-content'>";
            echo "<h2 class='result-name'>" . htmlspecialchars($row['i_name']) . "</h2>";
            echo "<p class='result-description'>" . htmlspecialchars($row['i_description']) . "</p>";
            echo "<p class='result-contact'>Contact Number: " . htmlspecialchars($row['i_contactno']) . "</p>";
            echo "<p class='result-email'>Email: " . htmlspecialchars($row['i_email']) . "</p>";
            echo "<p class='result-fees'>Fees: " . htmlspecialchars($row['i_fees']) . "</p>";
            echo "</div>"; // Close the result-content div
            echo "<img class='result-image' src='" . htmlspecialchars($row['i_image']) . "' alt='" . htmlspecialchars($row['i_name']) . "'>";
            echo "</div>"; // Close the result div
        }
        echo "<a href='index.php' class='home-button'>Go Back to Home</a>";

    } else {
        echo "No results found";
    }
}

pg_close($conn);
 ?> 