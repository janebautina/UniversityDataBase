<!DOCTYPE HTML>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Add a new student PHP Page</title>
      <style type="text/css">
         h1 {text-align: center; color: blue}
         h2 {font-family: Ariel, sans-serif; text-align: left; color: blue}
         p.footer {text-align: center}
         table.output {font-family: Ariel, sans-serif}
      </style>
   </head>
   <body>
      <?php
         // Get connection
         $Conn = mysql_connect('localhost', 'root','');
         mysql_select_db("university");
         // Test connection
         if (!$Conn)
         {
         exit ("Connection Failed: " . $Conn);
         }
         // Create short variable names
         $StudentID = $_POST["StudentID"];
         $LastName = $_POST["LastName"];
         $FirstName = $_POST["FirstName"];
         $Street = $_POST["Street"];
         $City = $_POST["City"];
         $State = $_POST["State"];
         $Zip = $_POST["Zip"];
         $StartTerm = $_POST["StartTerm"];
         $BirthDate = $_POST["BirthDate"];
         $MajorID = $_POST["MajorID"];
         $Phone = $_POST["Phone"];
         // Create SQL statement to INSERT new data
         $SQLINSERT = "INSERT INTO student ";
         $SQLINSERT .= "VALUES('$StudentID', ";
         $SQLINSERT .= "'$LastName', '$FirstName', '$Street',";
         $SQLINSERT .= "'$City', '$State', '$Zip',";
         $SQLINSERT .= "'$StartTerm ', '$BirthDate', '$MajorID','$Phone ')";
         // Execute SQL statement
         $Result = mysql_query($SQLINSERT);
         // Test existence of result
         echo "<h1>
         Students
         </h1>
         <hr />";
         if ($Result){
         echo "<h2>
         New Student Added:
         </h2>
         <table>
         <tr>";
         echo "<td>StudentID:</td>";
         echo "<td>" . $StudentID . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>LastName:</td>";
         echo "<td>" . $LastName . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>FirstName:</td>";
         echo "<td>" . $FirstName . "</td>";
         echo "</tr>";
         echo "<td>Street:</td>";
         echo "<td>" . $Street . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>City:</td>";
         echo "<td>" . $City . "</td>";
         echo "</tr>";
         echo "<tr>";
         echo "<td>State:</td>";
         echo "<td>" . $State . "</td>";
         echo "</tr>";
         echo "<td>ZIP:</td>";
         echo "<td>" . $Zip . "</td>";
         echo "</tr>";
         echo "<td>StartTerm:</td>";
         echo "<td>" . $StartTerm . "</td>";
         echo "</tr>";
         echo "<td>BirthDate:</td>";
         echo "<td>" . $BirthDate . "</td>";
         echo "</tr>";
         echo "<td>MajorID:</td>";
         echo "<td>" . $MajorID . "</td>";
         echo "</tr>";
         echo "<td>Phone:</td>";
         echo "<td>" . $Phone . "</td>";
         echo "</tr>";
         echo "</table><br /><hr />";
         }
         else {
         exit ("SQL Statement Error: " . $Result);
         }
         // Create SQL statement to read CUSTOMER table data
         $SQL = "SELECT * FROM student";
         // Execute SQL statement
         $RecordSet = mysql_query($SQL);
         // Test existence of recordset
         if (!$RecordSet)
         {
         exit ("SQL Statement Error: " . $SQL);
         }
         ?>
      <!-- Page Headers -->
      <h1> Students </h1>
      <hr />
      <?php
         // Table headers
         echo "<table class='output' border='1'>
         <tr>
         <th>EmailAddress</th>
         <th>LastName</th>
         <th>FirstName</th>
         <th>StreetAddress</th>
         <th>City</th>
         <th>State</th>
         <th>Zip</th>
         <th>StartTerm</th>
         <th>BirthDate</th>
         <th>MajorID</th>
         <th>Phone</th>
         </tr>";
         // Table data
         while($RecordSetRow = mysql_fetch_array($RecordSet))
         {
         echo "<tr>";
         echo "<td>" . $RecordSetRow['StudentID'] . "</td>";
         echo "<td>" . $RecordSetRow['LastName'] . "</td>";
         echo "<td>" . $RecordSetRow['FirstName'] . "</td>";
         echo "<td>" . $RecordSetRow['Street'] . "</td>";
         echo "<td>" . $RecordSetRow['City'] . "</td>";
         echo "<td>" . $RecordSetRow['State'] . "</td>";
         echo "<td>" . $RecordSetRow['Zip'] . "</td>";
         echo "<td>" . $RecordSetRow['StartTerm'] . "</td>";
         echo "<td>" . $RecordSetRow['BirthDate'] . "</td>";
         echo "<td>" . $RecordSetRow['MajorID'] . "</td>";
         echo "<td>" . $RecordSetRow['Phone'] . "</td>";
         echo "</tr>";
         }
         echo "</table>";
         // Close connection
         mysql_close($Conn);
         ?>
      <br />
      <hr />
      <p class="footer"> 
      <p style="text-align: center"> <a href="http://localhost/university/universityBrowse.php"> Return
         to the University Home Page </a> 
      </p>
      </p>
      <hr />
   </body>
</html>