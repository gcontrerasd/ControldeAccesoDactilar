#include "FPS_GT511C3.h"
#include "SoftwareSerial.h"

// Hardware setup - FPS connected to:
//	  digital pin 10(arduino rx, fps tx)
//	  digital pin 11(arduino tx - 560ohm resistor fps tx - 1000ohm resistor - ground)
//		this brings the 5v tx line down to about 3.2v so we dont fry our fps

FPS_GT511C3 fps(10, 11);
//int CheckEnrolled = 0;
int enrollid = -1;
int ledverde = 5;
int ledazul = 6;

void setup(){
Serial.begin(9600);
delay(100);
pinMode(ledverde, OUTPUT);
pinMode(ledazul, OUTPUT);
fps.Open();
fps.SetLED(true);
//fps.DeleteAll();
Serial.println("Bienvenido a Control de Acceso dactilar.");
Serial.println(" ");
Serial.print("Actualmente hay ");
int n = fps.GetEnrollCount();
Serial.print(n);
Serial.println(" huellas registradas");
//int z = fps.CheckEnrolled();
//Serial.print("Tenemos ");
//int x = fps.Identify1_N();
//Serial.print(x);
//Serial.print(" ID disponibles aun");
Serial.println(" ");
//Enroll();
}

void loop(){
// Enroll test
// find open enroll 
  int n = fps.GetEnrollCount();
  enrollid = 1 + n;
  fps.EnrollStart(enrollid); 
// enroll
  Serial.println(" ");
  Serial.println("Ponga su dedo en lector para registrar la huella deseada.");
  while(fps.IsPressFinger() == false) delay(100);
  bool bret = fps.CaptureFinger(true);
  int iret = 0;

  if (bret != false)
  {
    Serial.println("Registrando... Saque su dedo del lector");
    fps.Enroll1(); 
    while(fps.IsPressFinger() == true) delay(100);
    Serial.println("Ponga el mismo dedo usado anteriormente");
    while(fps.IsPressFinger() == false) delay(100);
    bret = fps.CaptureFinger(true);
  
  if (bret != false)
    {
      Serial.println("Registrando... Saque su dedo del lector");
      fps.Enroll2();
      while(fps.IsPressFinger() == true) delay(100);
      Serial.println("Ponga el mismo dedo usado anteriormente para verificar y terminar el registro");
      Serial.println(iret);
      while(fps.IsPressFinger() == false) delay(100);
      bret = fps.CaptureFinger(true);

      if (bret != false){      
        digitalWrite(ledazul,LOW);
        digitalWrite(ledverde,HIGH);
       delay(5000);
       digitalWrite(ledverde,LOW);
        Serial.println("Saque su dedo del lector para finalizar el registro");  
       iret = fps.Enroll3();
      if (iret >= 0)
      { 
        Serial.print("Huella Registrada en el numero #");
        Serial.println(enrollid);
       }        
      else
        {
        Serial.print("Registro de huella fallido con el codigo de error");
        Serial.println(iret);
        }

      }
      else {
        Serial.println("Error al leer el 3cer dedo");
        digitalWrite(ledazul, HIGH);
        delay(2000);
        digitalWrite(ledazul, LOW);
      }
  }
    else {
      Serial.println("Error al leer el 2do dedo");
      digitalWrite(ledazul, HIGH);
      delay(2000);
      digitalWrite(ledazul, LOW);
      }
  }  
  else { 
    Serial.println("Error al leer el 1er dedo");
    digitalWrite(ledazul, HIGH);
    delay(2000);
    digitalWrite(ledazul, LOW);
  }

}

