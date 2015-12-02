<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 10/9/2015
 * Time: 8:15 AM
 * Description: This is the Oracle/PeopleSoft database view lookup for the Classification, Gender of Assigned students
 * within the Housing Information System at NC State.
 */


//Read log-in information
include('includes/connection.php');

//start
$connectionToDatabase = oci_connect($username,$password,$database_host);

//check for any connection errors
if(!$connectionToDatabase){
    $error = oci_error();

    //Trigger an error if there is any problem connecting the to the database table/view.
    trigger_error(htmlentities($error['message'],ENT_QUOTES), E_USER_ERROR);
}

//QUERY START
$queryToLookUpInformation = "SELECT BUILDING,NC_GENDER,ACAD_LEVEL_BOT FROM PS_NC_HIS_PP2_VW ";          //DEVELOPMENT (THIS VIEW SPECIFICALLY LOOKS FOR A PARTICULAR TERM)

//PRODUCTION USE ON NC STATES SERVER.
//$queryToLookUpInformation = "SELECT BUILDING,NC_GENDER,ACAD_LEVEL_BOT FROM PS_NC_HIS_PPE_VW ";          //PRODUCTION (THIS VIEW SPECIFICALLY USES THE CURRENT TERM, SO IF DATE IS AUGUST 2014, TERM IS 2148, IF IT IS JANUARY 2015, TERM IS 2151)


//QUERY END

//Parse the connection  to the PS view.
$statement = oci_parse($connectionToDatabase,$queryToLookUpInformation);


//Execute the query...
oci_execute($statement);


/*
//Display the data in a table through OCI column association.
echo "<table border='1' name='data' id ='data'>\n";
    while ($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {
        echo "<tr>\n";              //Start new row
            echo "<td>\n";
                echo $row['BUILDING'];      //Assignee's building
            echo "</td> \n";
            echo "<td>\n";
                echo $row['NC_GENDER']; //Assignee's Gender
            echo "</td>\n";
            echo "<td>\n";
                echo $row['ACAD_LEVEL_BOT']; //Assignee's Academic Level (FR,NFR,SO,JR,SR,A1,A2,GR,etc).
            echo "</td>\n";
        echo "</tr>\n";             //End Row
    }//CLOSE WHILE STATEMENT

echo "</table>\n";          //CLOSE THE TABLE

*/

//Create a new array of building occupancy data...
//$collectionOfOccupancyDetail = array('building','gender','academic_level');
//end arrays


//Get information from the database table view.
while ($row=oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)){
    //Retrieve Building
    $building = $row['BUILDING'];
    //Retrieve Gender
    $gender = $row['NC_GENDER'];
    //Retrieve Academic level
    $academic_level = $row['ACAD_LEVEL_BOT'];
    $collectionOfOccupancyDetail[] = array ('building'=>$building,'gender'=>$gender,'academic_level'=>$academic_level);
}
//End get information

//var_dump($collectionOfOccupancyDetail);

//Utilize the file buildingOccupancydetail_DATABASE_READ.php file (under the includes folder) that will consolidate the database information
//Utilize new class that is alter the retrieved numbers from the Oracle/PeopleSoft database view and consolidate
//the information that will be useful for the buidlingOccupancydetail class.
include('includes/buildingOccupancydetail_DATABASE_READ.php');
//end