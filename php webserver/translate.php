<?php
function translate() {
	# Includes the autoloader for libraries installed with composer
	require __DIR__ . '/vendor/autoload.php';

	# Imports the Google Cloud client library
	use Google\Cloud\Translate\TranslateClient;

	# Your Google Cloud Platform project ID
	$projectId = 'translate-chatbo-1525555964305';

	# Instantiates a client
	$translate = new TranslateClient([
	    'projectId' => $projectId
	]);

	# Read from file, text to be translated
	$to_translate = fopen("chat.txt", "r");
	$text = fgets($to_translate);
	fclose($to_translate);

	# The target language
	$target = 'fr';

	# Translates some text into Russian
	$translation = $translate->translate($text, [
	    'target' => $target
	]);

	# Write the translated text to the chat
	$to_translate = fopen("chat.txt", "w");
	fwrite($to_translate, $translation['text']);

	echo 'Text: ' . $text . '
	Translation: ' . $translation['text'];
}
?>