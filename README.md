Hackspace-Dashboard
===================
On our website you can get information about the open/closed state of the Hackspace.
You also can look up whether there is a person who can help you with your project.

In the Hackspace will be a RFID reader attached to a Rasperry Pi running a Python scrip that accesses a database and updates the status.
The content on the webpage is generated with the database.

Requirements
=================
$ sudo apt-get install python-dev to install 

SPI Python Library:
$ git clone https://github.com/lthiery/SPI-Py.git
$ cd SPI-Py
$ sudo pyhton setup.py install

MFRC522 Python Library:
$ cd ..
$ cd MFRC522-python
$ git clone https://github.com/mxgxw/MFRC522-python
