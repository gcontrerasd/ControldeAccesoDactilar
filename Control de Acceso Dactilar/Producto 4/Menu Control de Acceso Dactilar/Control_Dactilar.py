#!/usr/bin/python3
import serial
import time

arduino=serial.Serial('/dev/ttyACM0',baudrate=9600, timeout = 8.0)
arduino.open()
txt=''
 
def pedirNumeroEntero():
 
    correcto=False
    num=0
    while(not correcto):
        try:
            num = int(input("Elige una opcion: "))
            correcto=True
        except ValueError:
            print('Error, introduce un numero entero')
     
    return num
 
salir = False
opcion = 0

print ("Bienvenido a Control de Acceso Dactilar")
 
while not salir:
 
    print ("\nQue desea hacer?")
    print ("1. Registrar una Huella")
    print ("2. Leer una Huella")
    print ("3. Salir")
    print ("\n")
 
    opcion = pedirNumeroEntero()
 
    if opcion == 1:
        print ("Registrar una Huella")
	arduino.write("1")
	while True:	
		reg = arduino.read()
		print "aca"
		if len(str(reg)) == 0:
			time.sleep(0.01)
		else:
			break
	if reg != "0":
		print ("Actualmente hay", reg, "huellas registradas")
	else:
		print("No hay huella para registro")
	while True:
		reg = arduino.read()
		if len(str(reg)) == 0:
			time.sleep(0.1)
		else:
			break
	if reg == "7":
		print("Paso el primer registro, ponga su dedo nuevamente")
		arduino.write("y")
	while True:
		reg = arduino.read()
		if len(str(reg)) == 0:
			time.sleep(0.1)
		else:
			break
	if reg == "8":
		print("Paso el segundo registro, ponga su dedo una vez mas")
		arduino.write("y")
	while True:
		reg = arduino.read()
		if len(str(reg)) == 0:
			time.sleep(0.1)
		else:
			break
	if reg == "9":
		print("Paso el tercer registro, ponga su dedo por ultima vez para finalizar el registro")
		arduino.write("y")
	while True:
		reg = arduino.read()
		if len(str(reg)) == 0:
			time.sleep(0.1)
		else:
			break
	if reg[0] == "e":
		print "\nHubo un error en el registro"
	else:	
		print ("\nProceso de registro terminado.")
		print("Huella registrada en el ID numero:",reg)
    elif opcion == 2:
        print ("Leer una Huella")
	arduino.write("2")
	while True:
		id = arduino.read()
		if len(str(id)) == 0:
			time.sleep(0.1)
		else:
			break
	if id != "0":
		print ("\nProceso de lecura terminado.")
		print ("El ID reconocido es:", id)
	else:
		print("Huella No reconocida o No Registrada.")
    elif opcion == 3:
        salir = True
    else:
        print ("Introduce un numero entre 1 y 2")
 
print ("Ha salido de Control de Acceso Dactilar, Hasta pronto!")
arduino.close()