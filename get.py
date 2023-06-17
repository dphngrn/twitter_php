from machine import Pin,PWM
import network  #import des fonction lier au wifi
import urequests#import des fonction lier au requetes http
import utime#import des fonction lier au temps
import ujson#import des fonction lier aà la convertion en Json

wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi

ssid = 'Iphone de Daphné'
password = 'TitiLaFouine03'
wlan.connect(ssid, password) # connecte la raspi au réseau
url = "http://192.168.0.45/php_restart/twitter_php/twit/accueil/get_one.php"

led1 = PWM(Pin(18, mode=Pin.OUT)) 
led2 = PWM(Pin(17, mode=Pin.OUT))
led3 = PWM(Pin(16, mode=Pin.OUT))

tabled=[led1,led2,led3]

for led in tabled:
    led.freq(1000)
    led.duty_u16(0)

for i in range(len(tabled)):
    tabled[i].freq(1000)
    tabled[i].duty_u16(0)

def colorRGB (r,g,b):
    tabled[1].duty_u16(r*255)
    tabled[2].duty_u16(g*255)
    tabled[3].duty_u16(b*255)

tags = {
    'IIM': (168, 168, 120),
    'foxnews': (240, 128, 48),
    'drink': (50, 144, 240),
    'food': (120, 200, 80),
    'info': (248, 208, 48),
    'ESILV': (152, 216, 216),
    'metoo': (160, 64, 160),
    'EMLV': (168, 144, 240),
    'Alexis': (112, 88, 72),
    'slay': (238, 153, 172)
}
    
while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)
    pass

while(True):
    try:
        print("GET")
        r = urequests.get(url) # lance une requete sur l'url
        twit = (r.json())
        print(twit)# traite sa reponse en Json
        tag_c = (r.json()["articles"][1]["twits_hashtag"])
        print(tags[tag_c])
        colorRGB(tags[tag_c][0],tags[tag_c][1],tags[tag_c][2])
        r.close() # ferme la demande
        utime.sleep(1)  
    except Exception as e:
        print(e)