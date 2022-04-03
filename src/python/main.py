import license

#Connect to the MySQL database
license.connect("localhost", "user", "password", "database")


#Login into a Account
license.loginUser("username", "password")


#Register a new User
license.registerUser("license", "username", "password")


#Print the ID of User
print(license.getID())


#Print the expire day count
print(license.getExpiry())


#Print the HWID of User
print(license.getHwid())


#Print the rank of User
print(license.getRank())


#Print the IP of User
print(license.getIP())
