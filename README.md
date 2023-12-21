Panameragroup.com

File Structure

1. PHPMailer-master
   - This directory contains PHPMailer, a powerful email-sending library.

2. admin
   - add_data.php: Adds new data to the client detail database.
   - admin.php: Provides options to edit the client detail database without visiting cPanel.
   - admin_login.php: Login page for the admin to access the editing page.
   - contact.php: Displays the contact form data; no need to visit the cPanel contact database.
   - contact_data.php: Fetches the contact form data from the cPanel contact database.
   - delete_data.php: Deletes existing unwanted data without going to the client detail database.
   - display_data.php: Fetches the client data from the client detail database.
   - process_login.php: Checks the admin credentials and grants permission to the admin page.
   - update_data.php: Updates existing data without going to the client detail database.

3. assets
   - Contains all images used in the site.

4. Other Files
   - 404.shtml: Error page for a 404 status.
   - action.php: An alternative solution for the mailing system using PHPMailer with SMTP.
   - admin_php_alternative.txt: Another alternative for a direct mail system built in PHP.
   - client.css: Styling for client pages.
   - client.html: Frontend for client folder access.
   - index.html: Home page.
   - login.php: Handles the backend work for client.html, like searching the mail address in the database and checking activation status. If active, it opens the link stored in the database for that email.
   - storedata.php: Stores the data of the contact form in the contact database.
   - style.css: Styling for the home page.
   - thankyou.html: This page opens for 4 seconds when a person fills the contact form, indicating that the form data was stored successfully.

Usage

- The `admin` folder provides a user-friendly interface for managing client details without accessing the cPanel.
- The `login.php` script automates searching the database and checking the activation status for clients.
- `storedata.php` ensures that contact form data is stored securely.

Note

- Please make sure that SMTP settings are correctly configured for the mailing system.
- Follow best practices for email sending to avoid emails being marked as spam.

Feel free to explore and contribute to the project! If you have any questions or suggestions, contact the project administrator.
