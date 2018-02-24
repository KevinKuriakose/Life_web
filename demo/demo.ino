#include <ESP8266WiFi.h>
 const char* ssid = "Ozone_Jio";
const char* password = "endlessjio";
  
const char* host="lifemace.xyz";
WiFiClient client;
  const int httpPort=80;

int value = LOW; 
int greenPin = 4; // GPIO4 D2
int redPin = 16; // GPIO16 D0
int yellowPin = 5; // GPIO5 D1
int redPin1 = 0; // GPIO0 D3
int yellowPin1 = 2; // GPIO2 D4
int greenPin1 = 14; // GPIO14 D5
int redPin2 = 12; // GPIO12 D6
int yellowPin2 = 13; // GPIO13 D7
int greenPin2 = 15; // GPIO15 D8
int redPin3 = 3; // GPIO12 D9
int greenPin3 = 10; // GPIO15 D12


void setup()
{
Serial.begin(115200);
  Serial.println("begin");
  delay(10);
 value = LOW; 
 pinMode(greenPin, OUTPUT);
  pinMode(redPin, OUTPUT);
  pinMode(yellowPin, OUTPUT);
  pinMode(greenPin1, OUTPUT);
  pinMode(redPin1, OUTPUT);
  pinMode(yellowPin1, OUTPUT);
  pinMode(greenPin2, OUTPUT);
  pinMode(redPin2, OUTPUT);
  pinMode(yellowPin2, OUTPUT);
  pinMode(redPin3, OUTPUT);
  pinMode(greenPin3, OUTPUT);
  digitalWrite(redPin, HIGH);
  digitalWrite(redPin1, HIGH);
  digitalWrite(redPin2, HIGH);
  digitalWrite(redPin3, HIGH);
  
  //delay(3000);
 
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
 
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
 

 
}
void loop()
{
  WiFiClient client;
  const int httpPort=80;
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  Serial.println("begin65156");
  String url="/light.php?id=T1";String line;
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    }
    
    
  }
  Serial.println("");
if(value == LOW)
 {
  //traffic 0
  digitalWrite(greenPin, HIGH);
  digitalWrite(redPin, LOW);
  digitalWrite(yellowPin, LOW);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    goto emer;
    }
  }
  delay(5000);
  digitalWrite(greenPin, LOW);
  digitalWrite(redPin, LOW);
  digitalWrite(yellowPin, HIGH);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    goto emer;
    }
  }
  delay(2000);
  digitalWrite(greenPin, LOW);
  digitalWrite(redPin, HIGH);
  digitalWrite(yellowPin, LOW);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);goto emer;
    }
  }
 // delay(5000);
  //traffic 2
  digitalWrite(greenPin1, HIGH);
  digitalWrite(redPin1, LOW);
  digitalWrite(yellowPin1, LOW);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    goto emer;
    }
  }
  delay(5000);
  digitalWrite(greenPin1, LOW);
  digitalWrite(redPin1, LOW);
  digitalWrite(yellowPin1, HIGH);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    goto emer;
    }
  }
  delay(2000);
  digitalWrite(greenPin1, LOW);
  digitalWrite(redPin1, HIGH);
  digitalWrite(yellowPin1, LOW);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);goto emer;
    }
  }
 // delay(5000);
  //traffic 3
  digitalWrite(greenPin2, HIGH);
  digitalWrite(redPin2, LOW);
  digitalWrite(yellowPin2, LOW);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    goto emer;
    }
  }
  delay(5000);
  digitalWrite(greenPin2, LOW);
  digitalWrite(redPin2, LOW);
  digitalWrite(yellowPin2, HIGH);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    goto emer;
    }
  }
  delay(2000);
  digitalWrite(greenPin2, LOW);
  digitalWrite(redPin2, HIGH);
  digitalWrite(yellowPin2, LOW);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);goto emer;
    }
  }
 // delay(5000);
 //traffic 4
  digitalWrite(greenPin3, HIGH);
  digitalWrite(redPin3, LOW);
  //digitalWrite(yellowPin3, LOW);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    goto emer;
    }
  }
  delay(5000);
  digitalWrite(greenPin3, LOW);
  digitalWrite(redPin3, LOW);
  //digitalWrite(yellowPin, HIGH);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);
    goto emer;
    }
  }
  delay(2000);
  digitalWrite(greenPin3, LOW);
  digitalWrite(redPin3, HIGH);
  //digitalWrite(yellowPin, LOW);
  if (!client.connect(host,httpPort) ){
    Serial.println("connection failed");
    return;
  }
  client.print(String("GET ")+url+" HTTP/1.1\r\n"+"Host: "+host+"\r\n"+"Connection: close\r\n\r\n");
  
  while(client.available())
  {
  
    line=client.readStringUntil('\r');
    line.trim();
    if(line == "LOW")
    {
      value=LOW;
    Serial.print(line);
    }
    if(line == "HIGH")
    {
      value=HIGH;
    Serial.print(line);goto emer;
    }
  }
 // delay(5000);

  
}
  if(value==HIGH)
 {
emer:    digitalWrite(greenPin, HIGH);
    digitalWrite(redPin, LOW);
    digitalWrite(yellowPin, LOW);
   //traffic1
    digitalWrite(greenPin1, LOW);
    digitalWrite(redPin1, HIGH);
    digitalWrite(yellowPin1, LOW);
    
    //traffic2
    digitalWrite(greenPin2, LOW);
    digitalWrite(redPin2, HIGH);
    digitalWrite(yellowPin2, LOW);
    
    //traffic3
    digitalWrite(greenPin3, LOW);
    digitalWrite(redPin3, HIGH);
    //digitalWrite(yellowPin2, LOW);
    
   
 }
  
}

