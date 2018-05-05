import os
from google.cloud import translate

##def translate_text(text, target = 'en'):
##
##    os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = "gc-key.json"
##    
##    translate.client = translate.Client()
##    result = translate_client.translate(text, target_language = target)
##
##    print('Text: ', result['input'])
##    print('Translation', result['translatedText'])
##    print('Detected source language: ', result['detectedSourceLanguage'])
##
##
##ex = "j'aime le chien"
##
##translate_text(ex)

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
