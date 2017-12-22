#include "FPS_GT511C3.h"
#include "SoftwareSerial.h"

// Hardware setup - FPS connected to:
//    digital pin 4(arduino rx, fps tx)
//    digital pin 5(arduino tx - 560ohm resistor fps tx - 1000ohm resistor - ground)
//    this brings the 5v tx line down to about 3.2v so we dont fry our fps

FPS_GT511C3 fps(10, 11);
int enrollid = -1;
int ledverde = 5;
int ledazul = 6;
char op='x';

void setup(){
 Serial.begin(9600);
 delay(100);
 pinMode(2, OUTPUT);
 fps.Open();
 fps.SetLED(true);
 //fps.DeleteAll();
 /*Serial.print("Bienvenido a Control de Acceso dactilar.");
 Serial.print(" ");
 Serial.print("Que es lo que desea hacer?");
 Serial.print("Presione 1 para Registrar una Huella.");
 Serial.print("Presione 2 para Leer un ID.");
 Serial.print(" ");*/
 int n = fps.GetEnrollCount();
 
}

void loop(){
  if(Serial.available()) {
    char menu = Serial.read();
    switch (menu){
      case '1':{
        fps.Close();
        fps.Open();
        /*Serial.print("Registrar Huella");
        Serial.print("Actualmente hay ");*/
        int n = fps.GetEnrollCount();
        Serial.print(n);
        /*Serial.print(" huellas registradas");*/
      
        enrollid = 1 + n;
        fps.EnrollStart(enrollid);
        
  /*Serial.print(" ");
  Serial.print("Ponga su dedo en lector para registrar la huella deseada.");*/
        while(fps.IsPressFinger() == false) delay(100);
        bool bret = fps.CaptureFinger(true);
        int iret = 0;

        if (bret != false){
    /*Serial.print("Registrando... Saque su dedo del lector");*/
          fps.Enroll1(); 
          Serial.print("7");
    //digitalWrite(13,LOW);
          while(1){
            //if(Serial.available()) {
              op = Serial.read();
              //Serial.println(strlen(op));
              if(op == 'y')
                break;       
              else
                delay(100);
             //}
          }
          digitalWrite(ledverde,LOW);
          if(op == 'y'){ 
            while(fps.IsPressFinger() == true) delay(100);
      //Serial.print("Ponga el mismo dedo usado anteriormente");
            while(fps.IsPressFinger() == false) delay(100);
            bret = fps.CaptureFinger(true);
    
            if (bret != false){
      //Serial.print("Registrando... Saque su dedo del lector");
              fps.Enroll2();
              Serial.print("8");
              while(1){
                //if(Serial.available()) {
                  if(op == 'y')
                break;       
              else
                delay(100);       
                //}
              }
    if(op == 'y'){
      while(fps.IsPressFinger() == true) delay(100);
      //Serial.print("Ponga el mismo dedo usado anteriormente para verificar y terminar el registro");
      //Serial.print(iret);
      while(fps.IsPressFinger() == false) delay(100);
      bret = fps.CaptureFinger(true);

      if (bret != false){      
        digitalWrite(ledazul,LOW);
        digitalWrite(ledverde,HIGH);
       delay(1500);
       digitalWrite(ledverde,LOW);
        //Serial.print("Saque su dedo del lector para finalizar el registro");  
       iret = fps.Enroll3();
       Serial.print("9");
    while(1){
      //if(Serial.available()) {
        op = Serial.read();
        if(op == 'y')
                break;       
              else
                delay(100);       
      //}
     }
    if(op == 'y'){ 
      if (iret == 0)
      { 
        //Serial.print("Huella Registrada en el numero #");
        Serial.print(enrollid);
       }        
      else if (iret > 0)
        {
        //Serial.print("Registro de huella fallido con el codigo de error");
        Serial.print("e");
        }

      }
      else {
        //Serial.print("Error al leer el 3cer dedo");
        digitalWrite(ledazul, HIGH);
        delay(1000);
        digitalWrite(ledazul, LOW);
      }
  }
    else {
      //Serial.print("Error al leer el 2do dedo");
      digitalWrite(ledazul, HIGH);
      delay(1000);
      digitalWrite(ledazul, LOW);
            }
          }
        }
      }
    }
  }
  delay(100);
      break; 
      case '2':  
    /*Serial.print("Poner dedo para Verificar ID de Huella");*/
    while(fps.IsPressFinger() == false) delay(100);
    fps.CaptureFinger(false);
    int existe = 0;
    int i = 0;
    int id = fps.Identify1_N();
    for( i = 0; i < 200; i++){
      if (id == i){
        existe = 1;
        Serial.print(id);
        break;
        }
     }
    if (existe == 1){
      digitalWrite(ledverde, HIGH);
      digitalWrite(2,HIGH);
      delay(1000);
      digitalWrite(2,LOW);
      digitalWrite(ledverde, LOW);
    // dar acceso;
    }else{
        Serial.print(0);
      /*Serial.print("Huella No Registra");
      digitalWrite(ledazul, HIGH);
      delay(1000);
      digitalWrite(ledazul, LOW);*/
      }
    delay(1000);
    break;
    }
  }
} 
