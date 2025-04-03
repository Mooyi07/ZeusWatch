// Combined Code for SCT-013, DHT11, Relay, and PIR HC-SR501
#include <DHT.h>

// Pin definitions
#define SCT013_PIN A0   // SCT-013 connected to analog pin A0
#define DHT_PIN 2       // DHT11 connected to digital pin 2
#define DHT_TYPE DHT11  // Define the sensor type as DHT11
#define PIR_PIN 3       // PIR sensor connected to digital pin 3

// Create DHT instance
DHT dht(DHT_PIN, DHT_TYPE);

// Timing variables
unsigned long previousMillisHour = 0;
const unsigned long hourInterval = 2000;
float accumulatedKWh = 0.0;

void setup() {
    Serial.begin(115200);
    dht.begin();  // Initialize DHT11
    pinMode(PIR_PIN, INPUT);    // Set PIR sensor pin as input
    pinMode(SCT013_PIN, INPUT); // Set SCT-013 pin as input
}

void readPIR() {
    int motionDetected = digitalRead(PIR_PIN);
    Serial.print("&pir=");
    Serial.print(motionDetected);
}

void readTemperatureHumidity() {
    float temperature = dht.readTemperature();
    float humidity = dht.readHumidity();
    Serial.print("&temp="); Serial.print(temperature);
    Serial.print("&humidity="); Serial.print(humidity);
}

void readCurrent() {
    int analogValue = analogRead(SCT013_PIN);
    float voltage = (analogValue / 1024.0) * 5.0; 
    float current = voltage * 30.0;  // Calibration factor for SCT-013
    float powerKW = (220.0 * current) / 1000.0; // Assuming 220V supply
    Serial.print("current="); Serial.print(powerKW);
}

void loop() {
    unsigned long currentMillis = millis();
    
    if (currentMillis - previousMillisHour >= hourInterval) {
        previousMillisHour = currentMillis;
        readCurrent();
        readPIR();
        readTemperatureHumidity();
        Serial.println();
        accumulatedKWh = 0.0;
    }
    
    delay(1000); // Prevents flooding the serial monitor
}