from flask import Flask, request
import tensorflow as tf
import pandas as pd
import numpy as np
from keras import models
from sklearn.compose import make_column_transformer
from sklearn.preprocessing import MinMaxScaler, OneHotEncoder

app = Flask(__name__)

model = models.load_model("Zeus_Model_AI_mk2.h5", compile=False)
model.compile(loss=tf.keras.losses.mae,
               optimizer=tf.keras.optimizers.Adam(),
               metrics=['mae'])
train_data = pd.read_csv("dataset_zeus.csv")

ct = make_column_transformer(
    (MinMaxScaler(), ["Temperature", "Humidity"]), # get all values between 0 and 1
    (OneHotEncoder(handle_unknown="ignore"), ["Time"])
)
ct.fit(train_data)

@app.route('/predicting_energy')
def predicting_energy(time, temperature, humidity):
    input_data = pd.DataFrame({
        "Time": [time],
        "Temperature": [temperature],
        "Humidity": [humidity]
    })
    input_normalized = ct.transform(input_data)
    
    prediction = model.predict(input_normalized)
    return str(float(prediction[0][0]))

@app.route("/aiModel", methods=['GET'])
def aiModel():
    temper = request.args.get("dt")
    humid = request.args.get("dh")
    time_value = request.args.get("dn")
    prediction = predicting_energy(time_value, float(temper), float(humid))

    return prediction