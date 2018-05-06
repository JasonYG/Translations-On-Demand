import os
import io

# Imports the Google Cloud client library
from google.cloud import translate
os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = "gc-key.json"

# Instantiates a client
translate_client = translate.Client()


input_file = open("input_file.txt")
output_file = open("output_file.txt", "w")

# The text to translate
text = input_file.read()
# The target language
target = 'fr'

# Translates some text into Russian
translation = translate_client.translate(
    text,
    target_language=target)

print(u'Text: {}'.format(text))
print(u'Translation: {}'.format(translation['translatedText']))
out_text = (u'Translation: {}'.format(translation['translatedText']))
output_file.write('out_text')
