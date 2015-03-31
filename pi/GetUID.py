#!/usr/bin/env python
# -*- coding: utf8 -*-

import RPi.GPIO as GPIO
import MFRC522
import signal
import urllib2
import time

URL = "http://exemple.com/hackspace-dashboard/req/checkinout.php"

continue_reading = True

# Capture SIGINT for cleanup when the script is aborted
def end_read(signal,frame):
    global continue_reading
    print "Ctrl+C captured, ending read."
    continue_reading = False
    GPIO.cleanup()

# Setup IOs
GPIO.setmode(GPIO.BOARD)
GPIO.setup(15, GPIO.OUT)
GPIO.setup(16, GPIO.OUT)
GPIO.setup(18, GPIO.OUT)

GPIO.output(18, 1)
for i in range (0, 3):
	GPIO.output(15, 1)
        GPIO.output(16, 1)
	time.sleep(0.25)
        GPIO.output(15, 0)
        GPIO.output(16, 0)
	time.sleep(0.25)
GPIO.output(18, 0)

# Hook the SIGINT
signal.signal(signal.SIGINT, end_read)

# Create an object of the class MFRC522
MIFAREReader = MFRC522.MFRC522()

# This loop keeps checking for chips. If one is near it will get the UID and authenticate
while continue_reading:
    
    # Scan for cards    
    (status,TagType) = MIFAREReader.MFRC522_Request(MIFAREReader.PICC_REQIDL)

    # If a card is found
    if status == MIFAREReader.MI_OK:
        print "Card detected"
    
    # Get the UID of the card
    (status,uid) = MIFAREReader.MFRC522_Anticoll()

    # If we have the UID, continue
    if status == MIFAREReader.MI_OK:

        # Print UID
        # print "Card read UID: "+str(uid[0])+","+str(uid[1])+","+str(uid[2])+","+str(uid[3])
	# print "Card read UID: "+str(uid[0]*pow(256,3)+uid[1]*pow(256,2)+uid[2]*pow(256,1)+uid[3]*pow(256,0))
        result = urllib2.urlopen(URL + "?uid="+str(uid[0]*pow(256,3)+uid[1]*pow(256,2)+uid[2]*pow(256,1)+uid[3]*pow(256,0))+"&sid=1")
	if result.read() == "inloged" :
		GPIO.output(15, 1)
                GPIO.output(18, 1)
		time.sleep(0.1)
		GPIO.output(18, 0)
                time.sleep(0.9)
                GPIO.output(15, 0)
	else:
		GPIO.output(16, 1)
                GPIO.output(18, 1)
                time.sleep(0.04)
                GPIO.output(18, 0)
                time.sleep(0.03)
                GPIO.output(18, 1)
                time.sleep(0.03)
                GPIO.output(18, 0)
		time.sleep(0.9)
                GPIO.output(16, 0)

        # This is the default key for authentication
        key = [0xFF,0xFF,0xFF,0xFF,0xFF,0xFF]
        
        # Select the scanned tag
        #MIFAREReader.MFRC522_SelectTag(uid)

        # Dump the data
        #MIFAREReader.MFRC522_DumpClassic1K(key, uid)

        # Stop
        #MIFAREReader.MFRC522_StopCrypto1()
