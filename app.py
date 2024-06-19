from flask import Flask, render_template, request, jsonify
import os
from werkzeug.utils import secure_filename
from tensorflow.keras.models import load_model
import numpy as np
from PIL import Image
from io import BytesIO
from tensorflow.keras.preprocessing import image

app = Flask(__name__)

# Load the trained model
model = load_model('G:\Capstone\capstone 400C\project\Capeston (4)\Capeston\Capeston\denseNet201.h5')

# Define the classes
classes = ['Agnishikha', 'Anantamul', 'Ayapan', 'Bamonhati', 'Bashok', 'Gaynura', 'Kalochitra', 'Kalomegh', 'Punarnava', 'Ramtulshi', 'Sorpogondha', 'Raktapiyaj']

# Set upload folder and allowed extensions
UPLOAD_FOLDER = 'uploads'
ALLOWED_EXTENSIONS = {'jpg', 'jpeg', 'png'}

app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

# Create the uploads directory if it doesn't exist
if not os.path.exists(UPLOAD_FOLDER):
    os.makedirs(UPLOAD_FOLDER)

plant_details = {
    'Punarnava': {'scientific_name': 'Boerhavia diffusa L.', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Boerhavia_diffusa'},
    'Sorpogondha': {'scientific_name': 'Rauwolfia serpentina', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Rauvolfia_serpentina'},
    'Bashok': {'scientific_name': 'Justicia adhatoda L.', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Justicia_adhatoda'},
    'Agnishikha': {'scientific_name': 'Gloriosa superba', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Gloriosa_superba'},
    'Kalomegh': {'scientific_name': 'Andrographis paniculata Wall. Ex Nees', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Andrographis_paniculata'},
    'Shotomuli': {'scientific_name': 'Asparagus racemosus Willd', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Asparagus_racemosus'},
    'Chapalish': {'scientific_name': 'Artocarpus chama', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Artocarpus_chama'},
    'Ramtulshi': {'scientific_name': 'Ocimum gratissimum L.', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Ocimum_gratissimum'},
    'Ayapan': {'scientific_name': 'Ayapana triplinervis', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Ayapana_triplinervis'},
    'Apang': {'scientific_name': 'Achyranthes Aspera', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Achyranthes_aspera'},
    'Kalodhutura': {'scientific_name': 'Datura Stramonium L.', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Datura_stramonium'},
    'Kalochitra': {'scientific_name': 'Alternanthera brasiliana L. kuntze', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Alternanthera_brasiliana'},
    'Bamonhati': {'scientific_name': 'Clerodendrum Indicum L. kuntze', 'wikipedia_link': 'https://www.nparks.gov.sg/florafaunaweb/flora/1/8/1822'},
    'Gaynura': {'scientific_name': 'Gynura procumbens (Lour.) Merr.', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Gynura_procumbens'},
    'Anantamul': {'scientific_name': 'Hemidesmus Indicus (Linn.) R. Br.', 'wikipedia_link': 'https://bn.wikipedia.org/wiki/%E0%A6%85%E0%A6%A8%E0%A6%A8%E0%A7%8D%E0%A6%A4%E0%A6%AE%E0%A7%82%E0%A6%B2'},
    'Raktapiyaj': {'scientific_name': 'Eleutherine bulbos', 'wikipedia_link': 'https://en.wikipedia.org/wiki/Eleutherine_bulbosa'},
    
    'Unknown Plant': {'scientific_name': 'none', 'details': 'none'}
}

@app.route('/')
def index():
    print("Route hit!")
    return render_template('index.html')

@app.route('/about')
def about():
    return render_template('aboutus.html')

@app.route('/plant')
def plant():
    return render_template('plant.html')

@app.route('/predict', methods=['POST'])
def predict():
    if 'file' not in request.files:
        return jsonify({'error': 'No file part'})

    file = request.files.get('file')

    if file.filename == '':
        return jsonify({'error': 'No selected file'})

    if file and allowed_file(file.filename):
        try:
            # Read the file data and create an Image object
            img = Image.open(BytesIO(file.read()))
            img = img.convert('RGB')  # Ensure that the image is in RGB format
            img = img.resize((224, 224))  # Resize the image to the required dimensions
        except Exception as e:
            return jsonify({'error': 'Error processing the image'})

        img_array = np.array(img)
        img_array = np.expand_dims(img_array, axis=0)
        img_array = img_array / 255.0

        predictions = model.predict(img_array)
        predicted_class = np.argmax(predictions)
        confidence = predictions[0][predicted_class]

        if confidence  > 0.98:
            class_name = classes[predicted_class]
            plant_info = plant_details.get(class_name, {})
        else:
            class_name = "Unknown Plant"
            plant_info = plant_details[class_name]

        return jsonify({
        'class_name': class_name,
        'confidence': float(confidence),
        'scientific_name': plant_info.get('scientific_name', ''),
        'wikipedia_link': plant_info.get('wikipedia_link', '')
    })

    else:
        return jsonify({'error': 'Invalid file extension'})

if __name__ == '__main__':
    app.run(debug=True)
