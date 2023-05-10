import mysql.connector
from mysql.connector.constants import ClientFlag
from picamera import PiCamera
from time import sleep
import time
from datetime import datetime
from datetime import datetime
import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)

P=PiCamera()
P.resolution= (1024,768)
    
GPIO.setup(23, GPIO.IN)
while True:
    if GPIO.input(23):
        print("Motion...")
        
        hora = datetime.today().strftime('%Y-%m-%d-%H-%M-%S')
        movi = "movimiento-"
        extension = ".jpg"
        junto = movi + hora + extension
        
                
        # camera warm-up time
        time.sleep(0.5)
        P.capture("./fotos/" + junto)
        time.sleep(0.5)
        
        
        conexion=mysql.connector.connect(host="localhost",
                                         user="admin",
                                         passwd="1234",
                                         database="videovigi",
                                         charset="utf8")
        
        cursor=conexion.cursor()
        sql = ("""INSERT INTO imagenes (ruta) VALUES ('%s')""" %(junto))
    
        
        cursor.execute(sql)
        conexion.commit()
        conexion.close()
        
