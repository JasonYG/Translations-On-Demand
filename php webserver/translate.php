<?php
require __DIR__ . '/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Translate\TranslateClient;
function translate() {
# Your Google Cloud Platform project ID
$projectId = 'translate-chatbo-1525555964305';

# Instantiates a client
$translate = new TranslateClient([
    'projectId' => $projectId
]);

# The target language
$target = 'fr';

$to_translate_file = fopen('to_translate.txt', 'r') or die("unable to open file");
$translated_text = fgets($to_translate_file);
fclose($to_translate_file);

# Translates some text into Russian
$translation = $translate->translate($translated_text, [
    'target' => $target
]);

# Write the translated text to the chat
fwrite(fopen('translated.txt', 'w'), $translation['text']);
return $translation['text'];
}
?>