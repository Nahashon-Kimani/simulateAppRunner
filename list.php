<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>Registered Users</h1>
    <p><a href="index.php">← Back to Create User</a></p>

<?php
try {
    $stmt = $pdo->query("SELECT id, name, email, created_at FROM users ORDER BY id DESC");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($users) > 0) {
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Created At</th></tr>";

        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
            echo "<td>" . htmlspecialchars($user['name']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['created_at']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No users found.</p>";
    }
} catch (PDOException $e) {
    echo "<p style='color:red;'>Error: " . $e->getMessage() . "</p>";
}
?>
</body>
</html>
