CREATEING UNEP PROJECTS WEB INTERFACE

In the project, I have used NetBeans, Bootstrap/CSS, html, php and MYSQL and Wamp as my server.

Installation of NetBeans

First Install JDK
To use NetBeans for Java programming, you need to first install Java Development Kit (JDK). 
Step 1: Download
Download "NetBeans IDE" installer from a reliable "bundles" source available. 
Step 2: Run the Installer
Run the downloaded installer and follow on screen instructions.

How to install WAMP server so that you can use Apache, PHP and MYSQL.

1.	Download Wampserver from the official website
You can download the WAMP installer from the official WAMP server from the WampServer website.
2.	Double click the installer to begin the installation. - Click Run to proceed. Now you may or may not should see Windows User access control dialog box. Click Yes to continue if you see it, else move to the next step.
3.	Choose a preferred language of installation
4.	Click the wamp server License agreement dialog box.
5.	Select the preferred installation location from your drive.
6.	Select Startup Menu Folder.
7.	Finally, you see the Ready to install dialog box. You can review the details and make the changes by going back by clicking the Back button. Once you click Next, installation begins.
8.	Select default browser dialog box
9.	Select default Text Editor
10.	Installation Complete. Now you should see a general information about how to use WAMP. You can scroll down to read or click next to continue. 
11.	Start WampServer any time you want to use MYSQL



Creating the Database Table

To create a database in MYSQL, you should start WAMP Server then run MYSQL Console. Used MYSQL to create a database, here is the SQL Query

CREATE DATABASE projects;

use projects database;

CREATE TABLE  projects (
    project_ref VARCHAR(255) NOT NULL,
  implementing_office VARCHAR(255) NOT NULL,
  country VARCHAR(255) NOT NULL,
  project_title VARCHAR(255) NOT NULL,
  grant_amount INT NOT NULL,
  dates_from_gcf DATE NOT NULL,
  start_date DATE NOT NULL,
  duration INT NOT NULL,
  end_date DATE NOT NULL,
  readiness_of_NAP VARCHAR(255) NOT NULL,
  type_of_readiness VARCHAR(255) NOT NULL,
  first_disbursment_amount INT NOT NULL,
  status varchar(255) NOT NULL,
    PRIMARY KEY (project_ref)
);

TO ADD VALUES TO TABLE

INSERT INTO projects(project_ref,country,implementing_office,project_title,grant_amount,dates_from_gcf,start_date,duration,end_date,readiness_of_NAP,type_of_readiness,first_disbursment_amount,status)
 VALUES('value','value','value,'value,'value','value','value','value','value','value','value','value','value');
 
 CODING PROCEDURE
 
1. Creating the Configuration File
MYSQLCONFIGFILE.php

I started by creating a gonfiguration file which is a PHP script used to connect to the MySQL database server. 
I named it MYSQLCONFIGFILE

2. Creating the home/index page
Index.php
I created a home page for our CRUD application that contains a table showing the records from the UNData database table. 
I coded both the php files and html using NetBeans. The loading page loads a platform which introduces the user to the site, 
where the user clicks the “Add Project ” button, which opens a page where the user enters enter all the projects details, then 
clicks on a submit button which sends the information to the “UNData” database.

3. Creating a project
Create.php
This is a block of codes which enables the user to send data to the database. It links the html form and the database.

4. Read Function
Read.php
This block of code enables the user to read from the database

5. Update function
Update.php
This allows the user to update the existing table in the database.

6. Delete function
Delete.php
Enables the deletion of files from the database’ tables.

7. The error detection code
Error.php
After I finished all the codes for the functions. I wrote a piece of code which helps in detecting of errors in the program, i.e. invalid values.






