// Combined Code for SCT-013, DHT11, Relay, and PIR HC-SR501
#include <DHT.h>

// Pin definitions
#define SCT013_PIN A0          // SCT-013 connected to analog pin A0

#define DHT_PIN 2               // DHT11 connected to digital pin 3
#define DHT_TYPE DHT11         // Define the sensor type as DHT11
#define PIR_PIN 3              // PIR sensor connected to digital pin 4

// Create DHT instance
DHT dht(DHT_PIN, DHT_TYPE);

unsigned long previousMillisTemp = 0;
unsigned long previousMillisHour = 0; 
const long interval = 5000;      // 5 seconds interval for temperature and humidity reading
const long motionTimeout = 10000; // 10 seconds timeout for no motion
unsigned long lastMotionDetected = 0;
const unsigned long hourInterval = 2000;
float accumulatedKWh = 0.0;

void setup() {
  Serial.begin(115200);
  dht.begin();               // Initialize DHT11
  
 
  pinMode(PIR_PIN, INPUT);    // Set PIR sensor pin as input
  pinMode(SCT013_PIN, INPUT); // Set SCT-013 pin as input

  
}

String irDetection(long time){
  int motionDetected = digitalRead(PIR_PIN);
  Serial.print("&pir=");
  Serial.print(motionDetected);
}

String tempHum(long time){
    float temperature = dht.readTemperature();
    float humidity = dht.readHumidity();
    Serial.print("&temp=");Serial.print(temperature);Serial.print("&humidity=");Serial.print(humidity);
}

String currentRead(long time){
  int analogValue = analogRead(SCT013_PIN);
  float voltage = (analogValue / 1024.0) * 5.0; 
  float current = voltage * 30.0;
  float supplyVoltage = 220.0;
  float powerW = supplyVoltage * current;
  float powerKW = powerW / 1000.0;
  if (time - previousMillisHour >= hourInterval) {
    previousMillisHour = time;  
    Serial.print("current=");
    Serial.print(powerKW);
    irDetection(time);
    tempHum(time);
    Serial.println();
    accumulatedKWh = 0.0;
  }
}

void loop() {
  unsigned long currentMillis = millis();

  currentRead(currentMillis);
  delay(1000); // General delay to prevent flooding the serial monitor
} 