
import os
import MySQLdb
from datetime import datetime, date, timedelta
from requests import get
import subprocess
import hashlib
import time
import sys

global db


def connect(host, user, passwd, db):
    connect.db = MySQLdb.connect(host=host,
                     user=user,   
                     passwd=passwd, 
                     db=db)     


def registerUser(license, user, password):
    ip = get('https://api.ipify.org').content.decode('utf8')
    cur = connect.db.cursor()
    cur.execute("SELECT * FROM licenses WHERE license = '" + license +"'")
    connect.db.commit()
    key = cur.fetchall()
    for x in key:
        key = int(x[2])
        claimed = int(x[3])
    if claimed == 1:
        print("License is invalid.")
        return
    hwid = hwid = str(subprocess.check_output(
    'wmic csproduct get uuid')).split('\\r\\n')[1].strip('\\r').strip()
    passwd = hashlib.md5(password.encode('utf8')).hexdigest()
    time = datetime.now() + timedelta(days=key)
    expire = time.strftime('%d') + "/" + time.strftime('%m') + "/" + time.strftime('%Y')
    cur.execute("INSERT INTO `users` (`ID`, `name`, `password`, `expire`, `rank`, `ip`, `hwid`) VALUES (NULL, '" + user +"', '" + passwd + "', '" + expire +"', 'user', '" + ip +"', '" + hwid + "')")
    cur.execute("UPDATE licenses SET claimed = 1 WHERE license = '" + str(license) + "'")
    connect.db.commit()

expire_int = 0

hwid = "N/A"

rank = "N/A"

ip = "N/A"

def getExpiry():
    seconds = expire_int
    seconds_in_day = 60 * 60 * 24
    return seconds // seconds_in_day

def getRank():
    global rank
    return rank

def getIP():
    global ip
    return ip

def getID():
    global id
    return id

def getHwid():
    global hwid
    return hwid 

def loginUser(user, password):
    global expire_int
    global hwid
    global ip
    global id
    global rank
    cur = connect.db.cursor()
    cur.execute("SELECT * FROM users WHERE name = '" + user +"'")
    key = cur.fetchall()
    now = int(time.time())

    if not cur.rowcount:
        print("Username doesnt exist.")
        time.sleep(3)
        sys.exit(

        )
    for x in key:
        pwa = x[2]
        expire = x[3]
        hwid = x[6]
        rank = x[4]
        ip = x[5]
        id = x[0]

    id = id
    ip = ip
    hwid = hwid
    rank = rank
    ip = get('https://api.ipify.org').content.decode('utf8')
    cur.execute("UPDATE users SET ip = '" + ip + "' WHERE name = '" + str(user) + "'")
    date = datetime.strptime(expire, "%d/%m/%Y") + timedelta(hours=1)
    expirea = time.mktime(date.timetuple())
    now = time.mktime(datetime.now().timetuple())

    if now >= expirea:
        print("Your Subscription is invalid.")
        time.sleep(3)
        sys.exit()
    else:
        pass


    connect.db.commit()
    passwd = hashlib.md5(password.encode('utf8')).hexdigest()

    if pwa == passwd:
        expire_int = expirea - now
        pass

    else:
        print("Password is wrong")
        time.sleep(3)
        sys.exit()

