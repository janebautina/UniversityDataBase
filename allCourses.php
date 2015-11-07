<html>
   <head>
      <title>Courses</title>
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
         $SQL = "SELECT * FROM COURSE";
         // Execute SQL statement
         $RecordSet = mysql_query($SQL);
         // Test existence of recordset
         if (!$RecordSet)
         {
         exit ("SQL Statement Error: " . $SQL);
         }
         ?>
      <!-- Page Headers -->
      <h1> Courses </h1>
      <?php
         // Table headers
         echo "<table class='output' border='1'>
         <tr>
         <th>CourseID</th>
         <th>Title</th>
         <th>Credits</th>
         <th>DepartmentID</th>
         </tr>";
         // Table data
         while($RecordSetRow = mysql_fetch_array($RecordSet))
         {
         echo "<tr>";
         echo "<td>" . $RecordSetRow['CourseID'] . "</td>";
         echo "<td>" . $RecordSetRow['Title'] . "</td>";
         echo "<td>" . $RecordSetRow['Credits'] . "</td>";
         echo "<td>" . $RecordSetRow['DepartmentID'] . "</td>";
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
