<?php
// Enable strict error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 0); 

// Set headers first - this is crucial
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

// Environment configuration
define('ENVIRONMENT', 'development'); 

// Database configuration - replace with your actual credentials
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); // database username
define('DB_PASS', ''); // database password
define('DB_NAME', 'lanka_drive');

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit();
}

// Get raw POST data and decode JSON if needed
$input = file_get_contents('php://input');
if (strpos($input, '{') === 0) {
    $_POST = json_decode($input, true) ?? $_POST;
}

// Establish database connection
try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Set charset
    $conn->set_charset('utf8mb4');
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Database connection failed',
        'error' => ENVIRONMENT === 'development' ? $e->getMessage() : null
    ]);
    exit();
}

// Get and sanitize form data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');
$ip_address = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
$created_at = date('Y-m-d H:i:s');

// Validate input
$errors = [];

if (empty($name)) {
    $errors['name'] = 'Name is required';
} elseif (strlen($name) > 100) {
    $errors['name'] = 'Name must be less than 100 characters';
}

if (empty($email)) {
    $errors['email'] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format';
} elseif (strlen($email) > 100) {
    $errors['email'] = 'Email must be less than 100 characters';
}

if (empty($subject)) {
    $errors['subject'] = 'Subject is required';
} elseif (strlen($subject) > 200) {
    $errors['subject'] = 'Subject must be less than 200 characters';
}

if (empty($message)) {
    $errors['message'] = 'Message is required';
} elseif (strlen($message) > 2000) {
    $errors['message'] = 'Message must be less than 2000 characters';
}

if (!empty($errors)) {
    http_response_code(422); // Unprocessable Entity
    echo json_encode([
        'success' => false, 
        'message' => 'Validation failed', 
        'errors' => $errors
    ]);
    exit();
}

// Prepare SQL statement
try {
    $stmt = $conn->prepare("INSERT INTO contact_messages
        (name, email, subject, message, ip_address, user_agent, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        throw new Exception("Database error");
    }
    
    $stmt->bind_param("sssssss", $name, $email, $subject, $message, $ip_address, $user_agent, $created_at);
    
    if (!$stmt->execute()) {
        throw new Exception("Failed to save message");
    }
    
    http_response_code(200);
    echo json_encode([
        'success' => true, 
        'message' => 'Message sent successfully!'
    ]);
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'An error occurred while processing your request',
        'error' => ENVIRONMENT === 'development' ? $e->getMessage() : null
    ]);
} finally {
    // Close connections
    if (isset($stmt)) $stmt->close();
    $conn->close();
}
exit();