from flask import Flask, request, jsonify
import tensorflow as tf
import pandas as pd
import numpy as np
from keras import models
from sklearn.compose import make_column_transformer
from sklearn.preprocessing import MinMaxScaler, OneHotEncoder

app = Flask(__name__)

# Load pre-trained model
model = models.load_model("Zeus_Model_AI_mk2.h5", compile=False)
model.compile(loss=tf.keras.losses.mae, optimizer=tf.keras.optimizers.Adam(), metrics=['mae'])

# Load training data
train_data = pd.read_csv("dataset_zeus.csv")

# Create a column transformer for preprocessing
ct = make_column_transformer(
    (MinMaxScaler(), ["Temperature", "Humidity"]),  # Scale numerical values
    (OneHotEncoder(handle_unknown="ignore"), ["Time"])  # One-hot encode categorical time data
)
ct.fit(train_data)  # Fit the transformer on training data

def predicting_energy(time, temperature, humidity):
    """Preprocess input data and make a prediction using the AI model."""
    input_data = pd.DataFrame({
        "Time": [time],
        "Temperature": [temperature],
        "Humidity": [humidity]
    })
    
    input_normalized = ct.transform(input_data)  # Transform input
    input_normalized = input_normalized.toarray()  # Convert sparse matrix to dense

    prediction = model.predict(input_normalized)
    return float(prediction[0][0])  # Return a float value

@app.route("/aiModel", methods=['GET'])
def aiModel():
    """API endpoint to predict energy consumption based on temperature, humidity, and time."""
    try:
        temper = float(request.args.get("dt"))
        humid = float(request.args.get("dh"))
        time_value = request.args.get("dn")

        if temper is None or humid is None or time_value is None:
            return jsonify({"error": "Missing parameters"}), 400
        
        prediction = predicting_energy(time_value, temper, humid)
        return ({"predicted_energy": prediction})  # Return as JSON
    except Exception as e:
        return jsonify({"error": str(e)}), 500  # Handle errors gracefully

if __name__ == "__main__":
    app.run(debug=True)
