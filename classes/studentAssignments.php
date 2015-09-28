<?php
/**
 * Created by PhpStorm.
 * User: jjwill10
 * Date: 9/22/2015
 * Time: 8:47 AM
 */

class studentAssignments {

    //Variables
    var $buildingAssignment;
    var $buildingName;
    var $buildingGroup;
    var $staffCapacity;



    function studentAssignments($buildingName="",$studentsAssigned){
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

    function setStaffCapacity($staffAtBuilding){
        $this->staffCapacity=$staffAtBuilding;
    }


    function createGroup($buildingName){
        //Set AFC
        if(preg_match("/AFC/",$buildingName)){
            $this->buildingGroup="Avent Ferry Complex";
        }
        //Set TriTowers
        if($buildingName=="Carroll"||$buildingName=="Bragaw"||$buildingName=="Bowen"){
            $this->buildingGroup="TriTowers";
        }
        //Set Apartments
        //Check Wolf Ridge
        if(preg_match("/WR/",$buildingName)){
            $this->buildingGroup="Wolf Ridge";
        }
        //Check Wolf Village
        if(preg_match("/Wolf Vlg /",$buildingName)){
            $this->buildingGroup="Wolf Village";
        }
        //Set Wood.
        if(preg_match("/Wood/",$buildingName)){
            $this->buildingGroup="Wood";
        }

    }


    function getBuildingName($buildingWanted){

    }

    function getBuildingAssignments($buildingNAME){

    }




}