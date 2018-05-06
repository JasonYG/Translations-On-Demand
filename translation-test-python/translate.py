import os
from google.cloud import translate

# Imports the Google Cloud client library
from google.cloud import translate
os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = "gc-key.json"

# Instantiates a client
translate_client = translate.Client()

# The text to translate
text = u'Hello, world!'
# The target language
target = 'ru'

# Translates some text into Russian
translation = translate_client.translate(
    text,
    target_language=target)

print(u'Text: {}'.format(text))
print(u'Translation: {}'.format(translation['translatedText']))