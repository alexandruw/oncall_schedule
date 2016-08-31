# oncall_schedule

  This is a single page application that displays on call schedules for our team (DATG MEDIA IT). The application updates automatically through cronjob every friday when the shift change occurs. The app is currently being hosted at datgbr-statusio(10.103.229.50) server which will be used as a status-io server. This app will be accessed through the status-io page.

# What happens behind the scene when the application updates 
  When the application gets updated, it runs  update_db.php file that does trick behid the scenes. First of all, the first member is dropped and the member's name is stored and then the last members end-date for on call is also stored. The dropped member is re-added to the database and last members end-date is used as the start date for the dropped member. Then the function add_seven-days is called to add seven days and stored as the end date for the dropped member. The code iterates through each member to grab their name, email and phone numbers and creates a table like section to display the data.

# When a member is added/deleted or shift change occurs
  When a member is added/deleted or shift change occur there is a file that needs to be updated. Since, all the memebers info are stored in an array in the file create_db.php, the order has to be arranged occordingly. Once updated with the members info or the new right order the code has to be run to create new database entries. The file itself has all the explanations on how to add new member or rearrange on-call. Run the file the following way after appropriate changes are made.

          [root@datgbr-statusio]# cd /var/www/html/oncall_schedule
          [root@datgbr-statusio oncall_schedule]# php update_db.php


Below is the screenshot of what the page looks like.

		Status-IO Page
![Alt text](/images/status-io.png?raw=true "Status-IO Screenshot")

		On-Call-Schedule Page
![Alt text](/images/app_screenshot.png?raw=true "Status-IO Screenshot")


