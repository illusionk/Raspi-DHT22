#!/usr/bin/python
import re

# Read Data
file = open('/home/pi/www/DHT22/docs/history.txt', 'r')
lines = file.readlines();
file.close()

array = []
for data in lines:
	(date, b, temp, hud) = data.split()
	date += " " + b
	array.append( (date, temp, hud) )

array.pop(0)

# Get curent data
file = open('/home/pi/www/DHT22/docs/temp.txt', 'r')
regex = re.compile("(.*? .*?) ([0-9]+\.[0-9]) ([0-9]+\.[0-9])")
r = regex.search(file.read())
current = r.groups()
array.append ( current )
file.close()

file = open('/home/pi/www/DHT22/docs/last10.txt', 'w');
for cell in array:
	file.write("%s %s %s\n" % (cell[0], cell[1], cell[2]))
file.close()
