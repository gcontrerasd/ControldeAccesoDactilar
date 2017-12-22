#include "FPS_GT511C3.h"
#include "SoftwareSerial.h"

// Hardware setup - FPS connected to:
//	  digital pin 4(arduino rx, fps tx)
//	  digital pin 5(arduino tx - 560ohm resistor fps tx - 1000ohm resistor - ground)
//		this brings the 5v tx line down to about 3.2v so we dont fry our fps

FPS_GT511C3 fps(10, 11);

int ledverde = 5;
int ledazul = 6;

void setup()
{
	Serial.begin(9600);
	delay(100);
	fps.Open();
	fps.SetLED(true);
 
}

void loop()
{
	// Identify fingerprint test
  
  Serial.println("Poner dedo para Verificar ID de Huella");
  while(fps.IsPressFinger() == false) delay(100);
		fps.CaptureFinger(false);
		int id = fps.Identify1_N();
		if (id <200)
    {
			Serial.print("ID Verificado: #");
			Serial.println(id);
      if (id == 1)
      {
      Serial.println("Hola Gabriel");
      digitalWrite(ledverde, HIGH);
      delay(1000);
      digitalWrite(ledverde, LOW);
      }else if (id == 2)
      Serial.println("Hola Gabriel 2");
      digitalWrite(ledverde, HIGH);
      delay(1000);
      digitalWrite(ledverde, LOW);
    }else{
      Serial.println("Huella No Registra");
      digitalWrite(ledazul, HIGH);
      delay(1000);
      digitalWrite(ledazul, LOW);
      }

	delay(1000);
}
