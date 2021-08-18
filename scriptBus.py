import requests
import random
import time

import webbrowser

webbrowser.open("https://riset.its.ac.id/electricbus/panelbus/databus", new=1)

battery = 0
battery2 = 0
battery3 = 0
battery4 = 0
battery5 = 0

while(1):
    data_lat_ran = random.uniform(-7.282, -7.300)
    data_lat_ran2 = random.uniform(-7.282, -7.300)
    data_lat_ran3 = random.uniform(-7.282, -7.300)
    data_lat_ran4 = random.uniform(-7.282, -7.300)
    data_lat_ran5 = random.uniform(-7.282, -7.300)
    data_lat_ran6 = random.uniform(-7.282, -7.300)

    data_lang_ran = random.uniform(112.781, 112.800)
    data_lang_ran2 = random.uniform(112.781, 112.800)
    data_lang_ran3 = random.uniform(112.781, 112.800)
    data_lang_ran4 = random.uniform(112.781, 112.800)
    data_lang_ran5 = random.uniform(112.781, 112.800)
    data_lang_ran6 = random.uniform(112.781, 112.800)

    speed = random.randint(10, 30)
    speed2 = random.randint(10, 30)
    speed3 = random.randint(10, 30)
    speed4 = random.randint(10, 30)
    speed5 = random.randint(10, 30)
    speed6 = random.randint(10, 30)

    heading = random.randint(0, 360)
    heading2 = random.randint(0, 360)
    heading3 = random.randint(0, 360)
    heading4 = random.randint(0, 360)
    heading5 = random.randint(0, 360)
    heading6 = random.randint(0, 360)
    
    battery = battery + 1
    battery2 = battery2 + 1
    battery3 = battery3 + 1
    battery4 = battery4 + 1
    battery5 = battery5 + 1

    if(battery >= 100):
        battery = 0
        battery2 = 0
        battery3 = 0
        battery4 = 0
        battery5 = 0

    url = 'https://riset.its.ac.id/electricbus/getjson'
    #url = 'http://localhost/tracking-bus/getjson'

    myobj = '{"id_bus" : 1, "speed" : %d, "coordinates" : [%s,%s], "heading" : %d, "battery" : %d }' % (
        speed, 112.781, data_lat_ran, heading, battery)

    myobj2 = '{"id_bus" : 2, "speed" : %d, "coordinates" : [%s,%s], "heading" : %d, "battery" : %d }' % (
        speed2, data_lang_ran2, data_lat_ran2, heading2, battery2)

    myobj3 = '{"id_bus" : 3, "speed" : %d, "coordinates" : [%s,%s], "heading" : %d, "battery" : %d }' % (
        speed3, data_lang_ran3, data_lat_ran3, heading3, battery3)

    myobj4 = '{"id_bus" : 4, "speed" : %d, "coordinates" : [%s,%s], "heading" : %d, "battery" : %d }' % (
        speed4, data_lang_ran4, data_lat_ran4, heading4, battery4)

    myobj5 = '{"id_bus" : 5, "speed" : %d, "coordinates" : [%s,%s], "heading" : %d, "battery" : %d }' % (
        speed4, data_lang_ran5, data_lat_ran5, heading5, battery5)

    myobj6 = '{"id_bus" : 6, "speed" : %d, "coordinates" : [%s,%s], "heading" : %d, "battery" : %d }' % (
        speed4, data_lang_ran6, data_lat_ran6, heading5, battery5)

    x = requests.post(url, data=myobj)
    y = requests.post(url, data=myobj2)
    z = requests.post(url, data=myobj3)
    p = requests.post(url, data=myobj4)
    q = requests.post(url, data=myobj5)
    r = requests.post(url, data=myobj6)

    print(x)
    print(myobj2)
    print(myobj3)
    print(myobj4)
    print(myobj5)
    print(myobj6)
