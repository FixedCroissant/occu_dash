/**
 * User: jjwill10
 * Date: 10/9/2015.
 */

//Function to put up a new pop-up window
//that will allow for detailed information regarding student assignment gender & classification.

//Values needed for the subsequent buildings and areas
var pulledCampusTest=[];
var pulledArea=[];
var pulledComplex=[];
var pulledBuildingArray=[];

/*
 /Will need to do some javascript
 // to add apartments and complex correctly.
 pulledCampusTest.push(pulledCampustemp);

 //pulledCampus[pulledCampus.length]=
 //pulledCampus.push(<?php echo $campus?>);
 //pulledArea.push(<?php echo $area?>);
 //pulledComplex.push(<?php echo $complexArea?>);
 //pulledBuilding.push(<?php echo $pulledBuilding?>);
 */

function setCampus(campusArea){
    pulledCampustest = campusArea;
}

function setBuilding(pulledBuilding){
    pulledBuildingArray.push(pulledBuilding);
}

//Function returns that location in the array that the building is located.
function getBuilding (buildingName){
    var location;
    location = pulledBuildingArray.indexOf(buildingName);
    return location;
}


function openforBuildingInformation(pulledCampus,pulledArea,pulledComplex,pulledBuilding){

//Create a popupWindow based on the four parameters set ....
    var myWindow = window.open('building_information_detailed.php?campus='+
    +'&area='+pulledArea+'&complex='+pulledComplex+'&building='+
    pulledBuilding +
    '', '_blank','resizable=no, menubar=no,toolbar=no,width=715, height=920');
}





