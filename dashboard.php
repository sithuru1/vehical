<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.html');
    exit();
}

// Database connection
$pdo = new PDO("mysql:host=localhost;dbname=lanka_drive", 'root', ''); // Change credentials as needed
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get user info
$stmt = $pdo->prepare("SELECT first_name, last_name, email, phone FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    session_destroy();
    header('Location: index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Linka Drive</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <nav class="bg-yellow-600 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <i class="fas fa-car text-2xl"></i>
                <span class="text-xl font-bold">Linka Drive</span>
            </div>
            <div class="flex items-center space-x-4">
                <span>Welcome, <?php echo htmlspecialchars($user['first_name']); ?></span>
                <a href="logout.php" class="bg-yellow-700 hover:bg-yellow-800 px-4 py-2 rounded-lg transition duration-300">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700 mb-3">Your Profile</h2>
                    <div class="space-y-2">
                        <p><span class="font-medium">Name:</span> <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></p>
                        <p><span class="font-medium">Email:</span> <?php echo htmlspecialchars($user['email']); ?></p>
                        <p><span class="font-medium">Phone:</span> <?php echo htmlspecialchars($user['phone']); ?></p>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-700 mb-3">Quick Actions</h2>
                    <div class="space-y-3">
                        <a href="#" class="block bg-yellow-100 hover:bg-yellow-200 text-yellow-800 p-3 rounded-lg transition duration-300">
                            <i class="fas fa-car mr-2"></i> Rent a Vehicle
                        </a>
                        <a href="#" class="block bg-yellow-100 hover:bg-yellow-200 text-yellow-800 p-3 rounded-lg transition duration-300">
                            <i class="fas fa-history mr-2"></i> Rental History
                        </a>
                        <a href="#" class="block bg-yellow-100 hover:bg-yellow-200 text-yellow-800 p-3 rounded-lg transition duration-300">
                            <i class="fas fa-cog mr-2"></i> Account Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>