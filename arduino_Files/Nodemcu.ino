#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266HTTPClient.h>

const char* ssid = "MasketmolWifi";
const char* password = "packethacks2024"; 
const char* apiGet = "api=crhiz&room=ECL";

const char *host = "http://192.168.43.9/ZeusWatch/api/";

HTTPClient http;
WiFiClient client;

int relayState = 0;
void setup(){
  Serial.begin(115200);
  delay(500);

  pinMode(5, OUTPUT);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  //Serial.println("");
  //Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
  }
  //Serial.println("");
  //Serial.print("Successfully connected to : ");
  //Serial.println(ssid);
  //Serial.print("IP address: ");
  //Serial.println(WiFi.localIP());
  //Serial.rintln();
  digitalWrite(5, LOW);
}

void loop(){
  String PostAddress, GetAddress, LinkGet, getData, LinkPost, PostData;
  PostAddress = "recieveData.php?"; 
  GetAddress = "connect.php?"; 
  LinkPost = host + PostAddress;
  LinkGet = host + GetAddress;
  PostData = Serial.readStringUntil('\n');
  PostData = "api=OknYUFT7V64hnfhsh9HUN&room=ECL&" + PostData;
  Serial.println(PostData);
  //Serial.println("----------------Connect to Server-----------------");
  //Serial.println("Get Room Status from Server or Database");
  //Serial.print("Request Link : ");
  //Serial.println(LinkGet);
  http.begin(client, LinkPost);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
  int httpCodeGet = http.POST(PostData); //--> Send the request 
  String payloadPost = http.getString();
  Serial.println(payloadPost);
  http.end();

  http.begin(client, LinkGet);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  httpCodeGet = http.POST(apiGet);
  String payloadGet = http.getString();
  delay(1000);
  if (payloadGet == "1" && relayState == 0){
    relayState = 1;
    digitalWrite(5, HIGH);
    
  }  
  if (payloadGet == "0" && relayState == 1){
    relayState = 0;
    digitalWrite(5, LOW);
  }
  http.end();
}