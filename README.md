# team-tilde-time
A time management system developed as a student project by Team Tilde of Federation University.

## Installation
You will need a web server setup of which we recommend <a href="http://www.uwamp.com/en/?page=download">UwAmp</a>. It's lite, portable (.zip version) and has all the necessary components (PHP, MySQL, Apache) ready to go.

Once setup:
- If you have any git related tools, you can clone this repository using the provided address under the 'Clone or Download' green button. Clone into the www/ directory of your web server.
- If you don't, you can also ZIP download using the same button. Once downloaded, simply extract into your www/ server directory.

If you are using UwAmp, navigate to your install / extract directory and launch UwAmp.exe. By default, the server runs PHP 5 by default. This application runs best on PHP 7, so change the version under the PHP version field.

In the sql/ directory of this application, you are provided with the setup script for your database along with some demo data enteries. You can execute this through your own SQL application, or if you are using UwAmp:
- Click on the PHPMyAdmin button
- Enter username and password (Username: root / Password: root by default)
- In the upper tabs, click on SQL
- Open sql/script.sql in your preferred text editor and copy + paste in the provided text box.
- Click 'Go' on the bottom right.

This concludes the installation procedure. Enter <a href="http://localhost/">http://localhost/</a> into your browser under offline mode to view the application.
