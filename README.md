Hackspace-Dashboard
===================
On our website you can get information about the open/closed state of the Hackspace.
You also can look up whether there is a person who can help you with your project.

In the Hackspace will be a RFID reader attached to a Rasperry Pi running a Python scrip that accesses a database and updates the status.
The content on the webpage is generated with the database.

##Requirements (raspberry pi)

    sudo apt-get install python-dev to install 

SPI Python Library:

    git clone https://github.com/lthiery/SPI-Py.git
    cd SPI-Py
    sudo pyhton setup.py install

MFRC522 Python Library:

    cd ..
    cd MFRC522-python
    git clone https://github.com/mxgxw/MFRC522-python


Webserver:

is a simple apache2 server with PHP and MySQL:

    sudo apt-get update
    sudo apt-get install apache2 php5 libapache2-mod-php5 mysql-client php5-mysql
    
and on the MySQL server:

    sudo apt-get install mysql-client mysql-server

## Pins
You can use [this](http://i.imgur.com/y7Fnvhq.png) image for reference.

| Name | Pin # | Pin name   |
|------|-------|------------|
| SDA  | 24    | GPIO8      |
| SCK  | 23    | GPIO11     |
| MOSI | 19    | GPIO10     |
| MISO | 21    | GPIO9      |
| IRQ  | None  | None       |
| GND  | Any   | Any Ground |
| RST  | 22    | GPIO25     |
| 3.3V | 1     | 3V3        |
|      |       |            |
| Login LED| 15| GPIO3      |
| Logout LED| 16| GPIO4     |
| Buzzer| 18   | GPIO5      |


##Website:

http://hackspace-dashboard.no-ip.org/
