<?php
/**
 * START QUERY #4 FOR STAFF OCCUPANCY INFORMATION
 * QUERY NUMBER 4 HERE.
 * ADDED ON 12-03-2015 @ 9:23AM
 **/



//Query 004
//PRODUCTION VIEW IS CURRENTLY RESIDING IN DV1.
//TOTAL STAFF OCCUPANCY

//Set up parsing for assignedStaff
$totalStaffOccupancyParse = $assignmentsConnection->queryParse($connection,$totalStaffOccupancyQuery);

//GetSTID use for execution of the query.
$STID_TOTAL_STAFF_OCCUPANCY = $assignmentsConnection->getSTID();

//BIND THE TERM THAT WE ARE LOOKING FOR ....
oci_bind_by_name($STID_TOTAL_STAFF_OCCUPANCY ,'termNEEDED',$myTERM);

//Execute the query looking for the Total Staff Occupancy.
$assignmentsConnection->queryExecute($STID_TOTAL_STAFF_OCCUPANCY);


//Get information from the view and update the information in the
//array.

while($row = oci_fetch_array($STID_TOTAL_STAFF_OCCUPANCY, OCI_ASSOC+OCI_RETURN_NULLS)){
    //get prior data that was found from Query 1 and Query 2 look up.
    //Get Prior RESIDENT/STUDENT Assignment Information and store its value.
    $prior_assigned_students_value=$collectionOfData [$row['BUILDING']][1];

    //Get prior "assigned Staff" Value are located in:
    $prior_assigned_staff_value = $collectionOfData [$row['BUILDING']][2];

    //Get prior "building capacity" information, it is located in:    
    $prior_assigned_building_capacity = $collectionOfData [$row['BUILDING']][0]; 



    //Add total to the array
    //While keeping the assigned values.
    //DEVELOPMENT
    //The array $collectionOfData now contains three values which contains the following elements:
    //[CAPACITY OF BUILDING],[ASSIGNED STUDENTS PER BUILDING],[ASSIGNED STAFF PER BUILDING]
    //EXAMPLE: $collectionOfData['Lee'] = [750,730,8]
        //DEVELOPMENT BELOW...
        //ADD STAFF OCCUPANCY TO OUR ARRAY CALLED, $collectionOfData.
         //4th element, currently final element of the array. 

       // $collectionOfData [$row['BUILDING']] =  array($prior_assigned_building_capacity,$prior_assigned_students_value,$prior_assigned_staff_value,$row['STAFF_ASSIGNED']);

        //Below works
         //$collectionOfData [$row['BUILDING']] =  array($prior_assigned_building_capacity,$prior_assigned_students_value,$prior_assigned_staff_value,50);

         //Try pulling from database view. 
         $collectionOfData [$row['BUILDING']] =  array($prior_assigned_building_capacity,$prior_assigned_students_value,$prior_assigned_staff_value,$row['STAFF_ASSIGNED']);  
         //IN DEVELOPMENT THE ROW IS CALLED STAFF_ASSIGNED, HOWEVER IN PRODUCTION, IT IS COUNT1.

    //END DEVELOPMENT

    //PRODUCTION
    //The below array element is used in production environment under NC State's system, as the fields in the PeopleSoft view are different than the fields
    //created through my DEV system.
         //ADD STAFF OCCUPANCY TO OUR ARRAY CALLED, $collectionOfData.
         //4th element, currently final element of the array. 
        //$collectionOfData [$row['BUILDING']] =  array($prior_assigned_building_capacity,$prior_assigned_students_value,$prior_assigned_staff_value,$row['COUNT1']);
    //END PRODUCTION

}
 /**
  * END QUERY #4 FOR STAFF OCCUPANCY INFORMATION
  *
  **/


//Below for testing....
//var_dump($collectionOfData);
//End for testing only.

  ?>