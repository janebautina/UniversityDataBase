<html>
   <head>
      <title>Students</title>
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
         $Conn = mysql_connect('localhost', 'root', '');
         mysql_select_db("university");
         // Test connection
         if (!$Conn)
         {
         exit ("MySQL Connection Failed: " . $Conn);
         }
         // Create SQL statement
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
      <?php
         // Table headers
         echo "<table class='output' border='1'>
         <tr>
         <th>StudentID</th>
         <th>LastName</th>
         <th>FirstName</th>
         <th>Street</th>
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