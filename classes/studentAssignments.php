<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 9/22/2015
 * Time: 8:47 AM
 */

class readAssignments {

    //Variables
    var $buildingAssignment;
    var $buildingName;
    var $buildingGroup;



    function readAssignments($buildingName="",$studentsAssigned){
        //Set building name
        $this->setBuildingName($buildingName);
        //Set students assigned
        $this->setBuildingAssigned($studentsAssigned);
    }

    function setBuildingAssigned($amountToAssign){
        //Set assignments
        $this->buildingAssignment=$amountToAssign;
    }

    function setBuildingName($buildingName){
        $this->buildingName=$buildingName;
    }

    function createGroup($buildingName){
        if($buildingName=="AFC - A"){
            $this->buildingGroup="Avent Ferry Complex";
        }
        if($buildingName=="AFC - B"){
            $this->buildingGroup="Avent Ferry Complex";
        }
        if($buildingName=="AFC - E"){
            $this->buildingGroup="Avent Ferry Complex";
        }
        if($buildingName=="AFC - F"){
            $this->buildingGroup="Avent Ferry Complex";
        }

    }


    function getBuildingName($buildingWanted){

    }

    function getBuildingAssignments($buildingNAME){

    }




}