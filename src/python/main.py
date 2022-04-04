import license

#Connect to the MySQL database
license.connect("localhost", "root", "password", "databse")


#Login into a Account
license.loginUser("username", "password")


#Register a new User
license.registerUser("license", "user", "password")


#Print the ID of User
print(license.User.getID())


#Print the expire day count
print(license.User.getExpiry())


#Print the HWID of User
print(license.User.getHwid())


#Print the rank of User
print(license.User.getRank())


#Print the IP of User
print(license.User.getIP())

# Print the Name of User
print(license.User.getName())


# Check if User is VIP
if license.User.isVIP():
    print(f"[{license.User.getName()}] user is VIP")
else:
    print(f"[{license.User.getName()}] user is not VIP")

# Check if User is Banned
if license.User.isBanned():
    print(f"[{license.User.getName()}] user is Banned")
else:
    print(f"[{license.User.getName()}] user is not Banned")
