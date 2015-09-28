<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 9/22/2015
 * Time: 8:48 AM
 */

//Use room availability
//Start a new readAssignments data type....
include('classes/studentAssignments.php');




//Connect to Oracle Database
//User Name
$username = "***REMOVED***";
//Password
$password = "***REMOVED***";
//Database
$database_host = "***REMOVED***";

$databaseConnection_LOCALHOST = oci_connect($username,$password,$database_host);

//Check for any errors when connecting to the database
if (!$databaseConnection_LOCALHOST){
  $error = oci_error();
    trigger_error(htmlentities($error['message'],ENT_QUOTES),E_USER_ERROR);
}

$query = "SELECT BUILDING, CAPACITY, ASSIGNED, STAFF FROM Room_Availability";

$peopleSoftStatement = oci_parse($databaseConnection_LOCALHOST,$query);

//Define the variables and attach the columns/fields in the database view or table
//with pre-defined variables.

oci_define_by_name($peopleSoftStatement,'BUILDING',$building_NAME);     //Building Name _ Alexander, Owen, Turlington, etc.
oci_define_by_name($peopleSoftStatement,'CAPACITY',$capacity_Of_Building);      //The Total Capacity of the Building
oci_define_by_name($peopleSoftStatement,'ASSIGNED',$assignedRooms);           //The Total Assigned Rooms in the Building
oci_define_by_name($peopleSoftStatement,'STAFF',$staffAssigned);           //The total staff assigned in the the building.


//Execute the Query...
oci_execute($peopleSoftStatement);

//Get Number of Rows
//$numrows = oci_fetch_all($peopleSoftStatement,$trueResults);

//Each fetch populates the previously defined variables with the next row's data...
while (oci_fetch($peopleSoftStatement)) {
    //Write message to the user
    //with the information that is provided in the "Room_Availability" table.
    echo "The building name: " . "<strong>" . $building_NAME . "</strong>" . " has a total capacity of:" . $capacity_Of_Building . "and an assigned number of" . $assignedRooms;
    echo "<br/>";
        //Create new object
        $studentAssignments = new studentAssignments($building_NAME, $assignedRooms);
        //Check if its a group.
        $studentAssignments->createGroup($building_NAME);
       //Set Staff Amount
       $studentAssignments->setStaffCapacity($staffAssigned);

        var_dump($studentAssignments);










}//Close while






//var_dump($trueResults);




    //End Connect to Oracle Database







    //See what's in the array.
    //var_dump($studentAssignmentsCollection);












