<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create New User</h1>
    <form method="POST" action="">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <input type="submit" value="Create User">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    try {
        $stmt->execute([
            ':name' => $_POST['name'],
            ':email' => $_POST['email']
        ]);
        echo "<p>User added successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
    }
}
?>
</body>
</html>
