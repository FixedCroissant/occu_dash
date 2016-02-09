<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 10/9/2015
 * Updated to work with the correct view on 02-03-2016.
 * Time: 8:15 AM
 * Description: This is the Oracle/PeopleSoft database view lookup for the Classification, Gender of Assigned students
 * within the Housing Information System at NC State.
 */


//Read log-in information
include('includes/connection.php');

//GET TERM
//$termLookUP=$_GET['TERM'];
$termLookUP=$_GET['term'];

//start
$connectionToDatabase = oci_connect($username,$password,$database_host);

//check for any connection errors
if(!$connectionToDatabase){
    $error = oci_error();

    //Trigger an error if there is any problem connecting the to the database table/view.
    trigger_error(htmlentities($error['message'],ENT_QUOTES), E_USER_ERROR);
}

//QUERY START
$queryToLookUpInformation = "SELECT BUILDING,NC_GENDER,ACAD_LEVEL_BOT,EFFECTIVE_TERM  FROM PS_NC_HIS_PP2_VW WHERE EFFECTIVE_TERM=$termLookUP";          //DEVELOPMENT (THIS VIEW SPECIFICALLY LOOKS FOR A PARTICULAR TERM)

//PRODUCTION USE ON NC STATES SERVER.
//$queryToLookUpInformation = "SELECT BUILDING,NC_GENDER,ACAD_LEVEL_BOT,STRM FROM PS_NC_HIS_ASGNT_VW WHERE STRM=$termLookUP";          //PRODUCTION (Uses Current and all future terms for flexibility.)


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

	//Create Complexes based on the buildings
	//Avent Ferry Complex
    if($building=="AFC - A"||$building=="AFC - B"||$building=="AFC - E"||$building=="AFC - F"){
        $complex = "Avent Ferry Complex";
		$campus = "East";
    }
	//End Avent Ferry Complex
	//Start Wood
    else if($building=="Wood - A"||$building=="Wood - B"){
        $complex = "Wood";
        $area = "Southeast";
        $campus = "East";
    }
    //Close Wood
    //Start Quad
    //Start Wood
    else if($building=="Bagwell"||$building=="Becton"||$building=="Berry"||$building=="Gold"||$building=="Welch"||$building=="Syme"||$building=="Watauga"||$building=="North")
    {
        $complex = "Quad";
        $area = "Northeast";
        $campus = "East";
    }
    //End Quad
    //Start Tri-Towers
    else if($building=="Bowen"||$building=="Carroll"||$building=="Metcalf")
    {
        $complex = "Tri-Towers";
        $area = " "; //Campus is Central, //Area is blank.
        $campus = "Central";
    }
    //End Tri-Towers
    //Start TOTA
    else if($building=="Tucker"||$building=="Owen"||$building=="Turlington"||$building=="Alexander")
    {
        $complex = "TOTA";
        $area = " "; //Campus is Central, //Area is blank.
        $campus = "Central";
    }
    //END TOTA
    //Start West
    else if($building=="Lee"||$building=="Sullivan"||$building=="Bragaw")
    {
        $complex = "West";
        $area = " "; //Campus is West, //Area is blank.
        $campus = "West";
    }
    //END West
    //Start Wolf Ridge
    else if($building=="WR Grove"||$building=="WR Innovat"||$building=="WR Lakevw"||$building=="WR Plaza"||$building=="WR Plaza"||$building=="WR Tower"||$building=="WR Valley")
    {
        $complex = "Wolf Ridge";
        $area = " "; //Campus is blank, //Area is blank.
        $campus = "Apartments";
    }
    //End Wolf Ridge
    //Start Wolf Village
    else if($building=="Wolf Vlg A"||$building=="Wolf Vlg B"||$building=="Wolf Vlg C"||$building=="Wolf Vlg D"||$building=="Wolf Vlg E"||$building=="Wolf Vlg F"||$building=="Wolf Vlg G"||$building=="Wolf Vlg H")
    {
        $complex = "Wolf Village";
        $area = " "; //Campus is blank, //Area is blank.
        $campus = "Apartments";
    }
    //End Wolf Village
    /*
     * END COMPLEXES & AREA
     */
    else{
        $complex = "";
        $area = "";
        $campus= "";
    }	
	
    //Untouched
    //$collectionOfOccupancyDetail[] = array ('building'=>$building,'gender'=>$gender,'academic_level'=>$academic_level);

	$collectionOfOccupancyDetail[] = array ('building'=>$building,'complex'=>$complex,'area'=>$area,'campus'=>$campus,'gender'=>$gender,'academic_level'=>$academic_level);






	
	
	
	
	
	
	
	
	
}
//End get information
//BELOW LINE IS FOR TESTING ONLY.
//var_dump($collectionOfOccupancyDetail);

//Utilize the file buildingOccupancydetail_DATABASE_READ.php file (under the includes folder) that will consolidate the database information
//Utilize new class that is alter the retrieved numbers from the Oracle/PeopleSoft database view and consolidate
//the information that will be useful for the buidlingOccupancydetail class.
include('includes/buildingOccupancydetail_DATABASE_READ.php');
//end