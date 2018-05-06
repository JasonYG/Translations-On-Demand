<?php


function translate() {
$apiKey = 'AIzaSyCABvyqIG-VDjACqOu50_yIBciDHSflNqQ';

# The target language
$target = 'fr';

$to_translate_file = fopen('to_translate.txt', 'r') or die("unable to open file");
$translated_text = fgets($to_translate_file);
fclose($to_translate_file);

$url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($translated_text) . '&source=en&target=fr';

$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($handle);                 
$responseDecoded = json_decode($response, true);
curl_close($handle);

# Write the translated text to the chat
fwrite(fopen('translated.txt', 'w'), $responseDecoded['data']['translations'][0]['translatedText']);
}
?>