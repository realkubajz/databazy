<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Úloha 01</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <?php
        require_once "connect.php";

        // Požiadavka 01
        echo "<h1>požiadavka 01</h1>";
        echo '<div class="table-container"><h2>Zákazníci</h2><table><thead><tr><th>CustomerID</th><th>CompanyName</th><th>ContactName</th><th>Country</th></tr></thead><tbody>';

        $sql = "SELECT * FROM customers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["CustomerID"]. "</td><td>" . $row["CompanyName"]. "</td><td>" . $row["ContactName"]. "</td><td>" . $row["Country"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        echo '</tbody></table></div>';

        echo '<div class="table-container"><h2>Objednávky</h2><table><thead><tr><th>OrderID</th><th>CustomerID</th><th>OrderDate</th></tr></thead><tbody>';
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["OrderID"]. "</td><td>" . $row["CustomerID"]. "</td><td>" . $row["OrderDate"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }
        echo '</tbody></table></div>';

        echo '<div class="table-container"><h2>Dodávatelia</h2><table><thead><tr><th>SupplierID</th><th>CompanyName</th><th>ContactName</th><th>Country</th></tr></thead><tbody>';
        $sql = "SELECT * FROM suppliers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["SupplierID"]. "</td><td>" . $row["CompanyName"]. "</td><td>" . $row["ContactName"]. "</td><td>" . $row["Country"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }
        echo '</tbody></table></div>';

        // Požiadavka 02
        echo "<h1>požiadavka 02</h1>";
        echo '<div class="table-container"><h2>Zákazníci podľa krajiny a názvu</h2><table><thead><tr><th>CustomerID</th><th>CompanyName</th><th>Country</th></tr></thead><tbody>';

        $sql = "SELECT * FROM customers ORDER BY Country, CompanyName";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["CustomerID"]. "</td><td>" . $row["CompanyName"]. "</td><td>" . $row["Country"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }
        echo '</tbody></table></div>';

        // Požiadavka 03
        echo "<h1>požiadavka 03</h1>";
        echo '<div class="table-container"><h2>Objednávky podľa dátumu</h2><table><thead><tr><th>OrderID</th><th>CustomerID</th><th>OrderDate</th></tr></thead><tbody>';

        $sql = "SELECT * FROM orders ORDER BY OrderDate";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["OrderID"]. "</td><td>" . $row["CustomerID"]. "</td><td>" . $row["OrderDate"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }
        echo '</tbody></table></div>';

        // Požiadavka 04
        echo "<h1>požiadavka 04</h1>";

        $sql = "SELECT COUNT(*) as count FROM orders WHERE YEAR(OrderDate) = 1997";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<div class="table-container"><h2>Počet objednávok v roku 1997</h2><p>' . $row["count"] . '</p></div>';
        } else {
            echo "0 results";
        }

        // Požiadavka 05
        echo "<h1>požiadavka 05</h1>";
        echo '<div class="table-container"><h2>Kontaktné osoby - manažéri</h2><table><thead><tr><th>ContactName</th></tr></thead><tbody>';

        $sql = "SELECT ContactName FROM customers WHERE ContactTitle LIKE '%Manager%' ORDER BY ContactName";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["ContactName"]. "</td></tr>";
            }
        } else {
            echo "<tr><td>0 results</td></tr>";
        }
        echo '</tbody></table></div>';

        // Požiadavka 06
        echo "<h1>požiadavka 06</h1>";
        echo '<div class="table-container"><h2>Objednávky zadané 19. mája 1997</h2><table><thead><tr><th>OrderID</th><th>CustomerID</th><th>OrderDate</th></tr></thead><tbody>';

        $sql = "SELECT * FROM orders WHERE OrderDate = '1997-05-19'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["OrderID"]. "</td><td>" . $row["CustomerID"]. "</td><td>" . $row["OrderDate"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>0 results</td></tr>";
        }
        echo '</tbody></table></div>';

        $conn->close();
        ?>
    </div>
</body>
</html>
