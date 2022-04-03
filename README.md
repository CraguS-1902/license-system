
<div id="top"></div>





<br />
<div align="center">
  <a href="https://github.com/cragus-1902/license-system/">
    <img src="logo.png" alt="Logo" height="80">
  </a>

  <h3 align="center">Auth API</h3>

  <p align="center">
    An awesome Auth API with Discord Interactions
    <br />
    <br />
    <br />
    <a href="https://github.com/cragus-1902/license-system/">View Demo</a>
    ·
    <a href="https://github.com/cragus-1902/license-system/issues">Report Bug</a>
    ·
    <a href="https://github.com/cragus-1902/license-system/issues">Request Feature</a>
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#website">Installation Website</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>


## About The Project

<img src="images/website.png" height="520">
<img src="images/terminal.png" height="520">
<img src="images/discord.png" height="520">
  
A Simple License System with MySQL and expire. Own Website for User Interface.

Featurs Login, Register, License System, Expire System included


<p align="right">(<a href="#top">back to top</a>)</p>



### Built With

* [Python](https://www.python.org/)
* [PHP](https://www.php.net/manual/de/intro-whatis.php)

<p align="right">(<a href="#top">back to top</a>)</p>



### Prerequisites

* pip
  ```sh
  pip install mysqlclient
  ```
* php


<div id="website"></div>

## Installation Website


1. Enter your Informations in `web/db/database.php`
2. Import MySQL databse

<p align="right">(<a href="#top">back to top</a>)</p>


<div id="usage"></div>

## Usage


  ```py
  import  license
  
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
  ```

<p align="right">(<a href="#top">back to top</a>)</p>


## License

Distributed under the MIT License. See `LICENSE` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



## Contact

Discord - CraguS#4867

Project Link: [https://github.com/cragus-1902/license-system](https://github.com/cragus-1902/license-system)

<p align="right">(<a href="#top">back to top</a>)</p>





