<?php
/**
 * User: jjwill10
 * Date: 10/1/2015
 * Time: 1:00 PM
 * Description: This file looks at three different People Soft Queries and tabulates the Assigned Number to the Building, the Amount of Assigned Housing Staff at a particular building and lastly,
 * the total building capacity of a building.
 *
 * Under the column, "Total Possible Resident Occupancy", this number is found by taking the Total building capacity and subtracting the current assigned staff
 * in the building to get the "TOTAL POSSIBLE RESIDENT OCCUPANCY".
 *
 * Example: Total Building Capacity (Bragaw) 738 - (STAFF ASSIGNED IS 20) - TOTAL POSSIBLE RESIDENT OCCUPANCY = 718 students.
 */

//Start a new class that will preform queries...
//include('classes/queryRead.php');

//Receive connection information
include('includes/connection.php');


/**
 * THE TERM THAT WE NEED
 */

//working....
//$myTERM="2158";
//end working...


//$myTERM = $_POST['term'];
//Handle the default setting of the myTerm variable.
//On first run, it will be "None", so we will set the variable to blank
//to limit the Oracle errors.
if($myTERM=='None'){
    $myTERM="";
}else{

}


/**
 * END THE TERM THAT WE NEED
 */




//Read Assigned Students
//In production, must search for specific term, (ie. STRM)
//DEVELOPMENT
//The below query is used during development while running Oracle XI.
        $assignedResidentsQuery = "SELECT BUILDING, ASSIGNED,STRM FROM ASSIGNED_VIEW_TEST WHERE STRM=:termNEEDED";
//END DEVELOPMENT
//PRODUCTION
//The below query is used in production environment under NC State's system.
        //Fields are as provided:
        //BUILDING - the building name
        //COUNT1 - the count of students assigned to the particular  building.
        //STRM - the term needed to provide information.
        //$assignedResidentsQuery = "SELECT BUILDING, COUNT1,STRM FROM PS_NC_HIS_ASCNT_VW WHERE STRM=:termNEEDED";
//END PRODUCTION

//End Read Assigned Students
//Read Staff Assignments
//DEVELOPMENT
//The below query is used during development while running Oracle XI.
        $assignedStaffQuery="SELECT BUILDING, STAFF, STRM FROM STAFF_VIEW_TEST WHERE STRM=:termNEEDED";
//END DEVELOPMENT

//PRODUCTION
        //The below query is used in production environment under NC State's system.
        //Fields are as provided:
        //BUILDING - the building name
        //COUNT1 - the count of students assigned to the particular  building.
        //STRM - the term needed to provide information.
        //ON 12 - 3 - 2015, THIS QUERY WAS CHANGED TO LOOK AT DV1's ps_nc_his_blcts_vw
        //OLD
        //$assignedStaffQuery = "SELECT BUILDING,COUNT1,STRM FROM PS_NC_HIS_STFCT_VW WHERE STRM=:termNEEDED";
        //NEW
        //$assignedStaffQuery = "SELECT BUILDING,COUNT1,STRM FROM PS_NC_HIS_BLCTS_VW WHERE STRM=:termNEEDED";

//END PRODUCTION

//End Staff Assignments




//Read total building amounts..
//In production fields are:
//strm = term/semester
//building = [building name]
//count1 = [total count of the building]

//DEVELOPMENT
    $totalBuildingCapacityQuery = "SELECT BUILDING, CAPACITY, STRM FROM TOTAL_BUILDING_VIEW_TEST WHERE STRM=:termNEEDED";
//END DEVELOPMENT
//PRODUCTION
      //$totalBuildingCapacityQuery = "SELECT BUILDING,COUNT1,STRM FROM PS_NC_HIS_BLCNT_VW WHERE STRM=:termNEEDED";
//END PRODUCTION


//End total building amounts...



//Read total staff occupancy..
//In production fields are:
//strm = term/semester
//building = [building name]
//count1 = [total count of the building]

//DEVELOPMENT
    //DEVELOPMENT VIEW IS CALLED
    //ASSIGNED_STAFF_VIEW.

    $totalStaffOccupancyQuery = "SELECT BUILDING, STAFF_ASSIGNED, STRM FROM ASSIGNED_STAFF_VIEW WHERE STRM=:termNEEDED";
//END DEVELOPMENT
//PRODUCTION
    //PRODUCTION VIEW IS CALLED
    //PS_NC_HIS_BLCTS_VW
    //CURRENTLY ONLY IN DV1.

      //Below provides me information that is the beds, however this information is currently
      //being displayed under the header  "TOTAL STAFF OCCUPANCY", THIS SHOULD BE ASSIGNMENT OF STAFF
     //INFORMATION, NOT EMPTY BEDS.
       //OLD 
      //$totalStaffOccupancyQuery = "SELECT BUILDING,COUNT1,STRM FROM PS_NC_HIS_BLCTS_VW WHERE STRM=:termNEEDED";
      //NEW
    //$totalStaffOccupancyQuery = "SELECT BUILDING,COUNT1,STRM FROM  PS_NC_HIS_STFCT_VW WHERE STRM=:termNEEDED";

//END PRODUCTION


//End total total staff assigned to a particular building for a particular term.




/**
 * QUERIES
 */

//Create new connection for Assignments
$assignmentsConnection = new queryRead($database_host,$username,$password);

//Get the conn
//Set up the connection
$connection=$assignmentsConnection->getCONN();

//Create new parsing of the query....
//The below function will automatically set up a new STID.
//Use getSTID() to get the statement handler.
$assignmentsPARSE=$assignmentsConnection ->queryParse($connection,$assignedResidentsQuery);

//Assignments
$STID_ASSIGNED_STUDENTS=$assignmentsConnection->getSTID();

//Query 001
//Assignment of Students

//BIND THE TERM THAT WE ARE LOOKING FOR ....
oci_bind_by_name($STID_ASSIGNED_STUDENTS,'termNEEDED',$myTERM);

//Execute the query ...
//Query 001
//Assignment of Students
$assignmentsConnection->queryExecute($STID_ASSIGNED_STUDENTS);




//Display a table....
//Comment out 10-01-2015
//$assignmentsConnection->createTableDisplay($STID_ASSIGNED_STUDENTS);

//Create a new array...
$collectionOfData = array();
//add to the array
while($row = oci_fetch_array($STID_ASSIGNED_STUDENTS, OCI_ASSOC+OCI_RETURN_NULLS)){
    //var_dump ($row);
    //assign to the array...
    //DEVELOPMENT
        //$collectionOfData [$row['BUILDING']] =  array(0,$row['ASSIGNED'],0,0);

    //Above collection of data now has to encompass the Staff Occupancy
    //So old is:  $collectionOfData [$row['BUILDING']] =  array(0,$row['ASSIGNED'],0);
    //New        
        //The last 0 is for STAFF OCCUPANCY #.
        //FIRST NUMBER :  BUILDING CAPACITY (QUERY #3) + STAFF ALLOCATED (After revision made on 12/2/2015.)
        //SECOND NUMBER : ASSIGNED STUDENTS (QUERY #1)
        //THIRD NUMBER :  STAFF CAPACITY NUMBER (QUERY #2)
        //FOURTH NUMBER : STAFF OCCUPIED NUMBER (QUERY #4)
        $collectionOfData [$row['BUILDING']] =  array(0,$row['ASSIGNED'],0,0)
;
    //END Development    

    //PRODUCTION
        //$collectionOfData [$row['BUILDING']] =  array(0,$row['COUNT1'],0,0);

}



/**
 * START QUERY #2
 * ASSIGNED STAFF RA/CAC/CD, ETC.
 **/

//Set up parsing for assignedStaff
$assignedStaffParse = $assignmentsConnection->queryParse($connection,$assignedStaffQuery);

//GetSTID use for execution of the query.
$STID_STAFF_CAPACITY = $assignmentsConnection->getSTID();

//BIND THE TERM THAT WE ARE LOOKING FOR....
oci_bind_by_name($STID_STAFF_CAPACITY,'termNEEDED',$myTERM);


//Query 002
//Staff Assigned
$assignmentsConnection->queryExecute($STID_STAFF_CAPACITY);

//Display a table....
//Comment out 10-01-2015
//$assignmentsConnection->createTableDisplay($STID_STAFF_CAPACITY);

//get old data

//Read the value in the assignments collection....
//below should be 25...

//Provides 14!
//echo $collectionOfData["AFC - A"][0];

//Provides 25!
//Number we need to keep!
//echo $collectionOfData["AFC - A"][1];




//Get information from the view and update the information in the
//array.
while($row = oci_fetch_array($STID_STAFF_CAPACITY, OCI_ASSOC+OCI_RETURN_NULLS)){
    //var_dump ($row);
    //assign to the array...
    //$collectionOfData[$row['BUILDING']] = $row['STAFF'];

    //get array data
    //Assigned values!
    $prior_assigned_students_value=$collectionOfData [$row['BUILDING']][1];

    //Staff Value are
    //$collectionOfData [$row['BUILDING']][2];


      //Add Staff Members to the array
    //While keeping the assigned values.
    //DEVELOPMENT
        $collectionOfData [$row['BUILDING']] =  array(0,$prior_assigned_students_value,$row['STAFF'],0);
    //END DEVELOPMENT
    //PRODUCTION
        //$collectionOfData [$row['BUILDING']] =  array(0,$prior_assigned_students_value,$row['COUNT1']);
    //END PRODUCTION
}


/**
 * END QUERY #2
 */

/**
 * START QUERY #3
 * TOTAL HOUSING NUMBERS.
 **/

//Set up parsing for assignedStaff
$totalBuildingCapacityParse = $assignmentsConnection->queryParse($connection,$totalBuildingCapacityQuery);

//GetSTID use for execution of the query.
$STID_TOTAL_BUILDING_CAPACITY = $assignmentsConnection->getSTID();

//BIND THE TERM THAT WE ARE LOOKING FOR ....
oci_bind_by_name($STID_TOTAL_BUILDING_CAPACITY ,'termNEEDED',$myTERM);




//Query 003
//TOTAL BUILDING CAPACITY
$assignmentsConnection->queryExecute($STID_TOTAL_BUILDING_CAPACITY);



//Get information from the view and update the information in the
//array.
while($row = oci_fetch_array($STID_TOTAL_BUILDING_CAPACITY, OCI_ASSOC+OCI_RETURN_NULLS)){
    //get prior data that was found from Query 1 and Query 2 look up.
    //Get Prior RESIDENT/STUDENT Assignment Information and store its value.
    $prior_assigned_students_value=$collectionOfData [$row['BUILDING']][1];

    //Get prior "assigned Staff" Value are located in:
    $prior_assigned_staff_value = $collectionOfData [$row['BUILDING']][2];


    //Add total to the array
    //While keeping the assigned values.
    //DEVELOPMENT
    //The array $collectionOfData now contains three values which contains the following elements:
    //[CAPACITY OF BUILDING],[ASSIGNED STUDENTS PER BUILDING],[ASSIGNED STAFF PER BUILDING]
    //EXAMPLE: $collectionOfData['Lee'] = [750,730,8]
        //DEVELOPMENT BELOW...
        ////Added Staff Capacity to the total building capacity. [12-02-2015-3:21pm]
       
        //Temp comment out 149pm @ 12-3-2015
       $collectionOfData [$row['BUILDING']] =  array($row['CAPACITY']+$prior_assigned_staff_value,$prior_assigned_students_value,$prior_assigned_staff_value,0);
        


    //END DEVELOPMENT
    //PRODUCTION
    //The below array element is used in production environment under NC State's system, as the fields in the PeopleSoft view are different than the fields
    //created through my DEV system.
         //Added Staff Capacity to the total building capacity. [12-02-2015-3:21pm] 
        //$collectionOfData [$row['BUILDING']] =  array($row['COUNT1']+$prior_assigned_staff_value,$prior_assigned_students_value,$prior_assigned_staff_value);
    //END PRODUCTION
}

//Display a table with our information collected....
//comment out 10-01-2015
//$assignmentsConnection->createTableDisplay($STID_TOTAL_BUILDING_CAPACITY);

/**
 * END QUERY #3 FOR TOTAL CAPACITY OF BUILDING
 */



//Use the include file to read from DV1 view of PS view.
include('read_data_from_PeopleSoft_Data_View_Tables_DV1_Staff_Occupancy.php');
//End Include










/**
 * END ALL QUERIES TO LOOK UP INFORMATION
 */