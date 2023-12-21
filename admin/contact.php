<!--display the contact form data. no need to visit cpanel-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>

<h1>Contact Details</h1>

<!-- Display All Data -->
<h2>All Data</h2>
<table border="1">
    <tr>
        <th>I'd</th>
        <th>Date</th>
        <th>User_Name</th>
        <th>Email</th>
        <th>Phone_No</th>
    </tr>
    <?php
    // Fetch all data from the database and display it in a table
    include 'contact_data.php';
    ?>
</table>

</body>
</html>

