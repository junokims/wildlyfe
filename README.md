# wildlyfe
Project built by Genevieve (Rogue), Juno and Laura for CPSC 304 at UBC.

1) Install Xampp
In a location of your choice, create a new folder. In this example, we have entitled ours wildlyfe. Within this directory, also create a folder called Xampp. 

To install, first install XAMPP. You can find XAMPP at https://www.apachefriends.org/index.html

Ensure all checkboxes are selected during the installation.

<img src= "htdocs/Installer1.PNG" >

Select your new Xampp folder to do the installation. 

Your wildlyfe folder should now look like this:

<img src= "htdocs/Installer3.PNG" >


2) Download the Repo

Download the repository. Copy the files from the repo's htdocs to the htdocs of your Xampp folder. If done correctly, your Xampp folder should now look like this:

<img src= "htdocs/Installer4.PNG" >

3) Launch Xampp by clicking on the Xampp control file highlighted below. 

<img src= "htdocs/Installer5.PNG" >

Press the "Start" button for both Apache and MySQL. Allow acess if you are prompted to do so. 

4) Uploading the Database

In your browser, you should be able to navigate to localhost/phpmyadmin and see the page.
First we will need to edit privileges by going to the User Accounts Tab and clicking on Edit Privileges next to localhost.

<img src= "htdocs/Installer8.PNG" >

Then go on the login tab and navigate to the change password tab, where you will change it to root.

<img src= "htdocs/installer9.PNG" >

Now click on Databases, highlighted below. 

<img src= "htdocs/Installer6.PNG" >

Click create a database and call it "wildlyfe". The exact naming of this database is extremely important otherwise the queries will not work!

Now, click on the SQL tab and copy paste all the text from the milestone4.sql file in htdocs to that textbox. Press Go in the lower right-hand corner. 

<img src= "htdocs/Installer7.PNG" >

Now if you click on wildlyfe again, you should see all the tables are populated! Congrats! You created the database.

5) Launch the Site

You are now ready to navigate to our site. Please begin at localhost/welcome.php !
