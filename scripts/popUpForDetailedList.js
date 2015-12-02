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

function setCampus(campusProvided){
    pulledCampusTest.push(campusProvided);

}
function setComplex(complexProvided){
    pulledComplex.push(complexProvided);
}

function setBuilding(pulledBuilding){
    pulledBuildingArray.push(pulledBuilding);
}


/*
 * This function creates the URL attached to building_information_detailed.php+campus+[pulledCampusTest]
 * In the future these values will be pulled from a database table within the housing MySQL system.
 */
function getCampus(buildingName){
   //Check Residence Halls
    //Avent Ferry Complex
    if(buildingName=="AFC - A"||buildingName=="AFC - B"||buildingName=="AFC - E"||buildingName=="AFC - F"){
        pulledCampusTest="East";
    }
    //Wood Residence Hall
    else if(buildingName=="Wood - A"||buildingName=="Wood - B"){
        pulledCampusTest = "East";
    }
    //Bagwell, Becton and Berry
    else if(buildingName=="Bagwell"||buildingName=="Becton"||buildingName=="Berry"){
        pulledCampusTest = "East";
    }
    //Gold, Welch and Syme Halls
    else if(buildingName=="Gold"||buildingName=="Welch"||buildingName=="Syme"){
        pulledCampusTest="East";

    }
    //Watauga and North Halls
    else if (buildingName=="Watauga"||buildingName=="North"){
        pulledCampusTest="East";
    }
    //START CENTRAL

    //TRI-TOWERS
    //Bowen, Carroll, Metcalf
    else if(buildingName=="Bowen"||buildingName=="Carroll"||buildingName=="Metcalf"){
        pulledCampusTest="Central";
    }
    //TOTA
    //Tucker, Owen, Turlington, Alexander
    else if(buildingName=="Tucker"||buildingName=="Owen"||buildingName=="Turlington"||buildingName=="Alexander"){
        pulledCampusTest="Central";
    }
    //WEST CAMPUS
    //Lee, Sullivan, Bragaw
    else if(buildingName=="Lee"||buildingName=="Sullivan"||buildingName=="Bragaw"){
        pulledCampusTest="West";
    }





//Check Apartment areas
    else if(buildingName=="WR Grove"||buildingName=="WR Innovat"||buildingName=="WR Lakevw"||buildingName=="WR Plaza"||buildingName=="WR Tower"||buildingName=="WR Valley"||buildingName=="Wolf Vlg A"||buildingName=="Wolf Vlg B"||buildingName=="Wolf Vlg C"||buildingName=="Wolf Vlg D"||buildingName=="Wolf Vlg E"||buildingName=="Wolf Vlg H"){
        pulledCampusTest="Apartments";
    }
    else{
        pulledCampusTest="";
    }
    return pulledCampusTest;
}








//Function provides an even more specific area of campus based on the building name, for instances
//Both AFC & Wood are parts of the Southeast Campus and the Quad (Bagwell, Becton, etc...) are parts
//of the Northeast.
//This function primarily deals only with the east-side of campus.
function getArea(buildingName){
    //Check Residence Halls
    //Avent Ferry Complex
    if(buildingName=="AFC - A"||buildingName=="AFC - B"||buildingName=="AFC - E"||buildingName=="AFC - F"){
        pulledArea="Southeast";
    }
    //Wood Residence Hall
    else if(buildingName=="Wood - A"||buildingName=="Wood - B"){
        pulledArea = "Southeast";
    }
    //NorthEast Area of campus
    //Bagwell, Becton and Berry
    else if(buildingName=="Bagwell"||buildingName=="Becton"||buildingName=="Berry"){
        pulledArea = "Northeast";
    }
    //Gold, Welch and Syme Halls
    else if(buildingName=="Gold"||buildingName=="Welch"||buildingName=="Syme"){
        pulledArea="Northeast";

    }
    //Watauga and North Halls
    else if (buildingName=="Watauga"||buildingName=="North"){
        pulledArea="Northeast";
    }

    //TRI-TOWERS
    //Bowen, Carroll, Metcalf
    else if(buildingName=="Bowen"||buildingName=="Carroll"||buildingName=="Metcalf"){
        pulledArea="-";
    }
    //TOTA
    //Tucker, Owen, Turlington, Alexander
    else if(buildingName=="Tucker"||buildingName=="Owen"||buildingName=="Turlington"||buildingName=="Alexander"){
        pulledArea="-";
    }
    //WEST CAMPUS
    //Lee, Sullivan, Bragaw
    else if(buildingName=="Lee"||buildingName=="Sullivan"||buildingName=="Bragaw"){
        pulledArea="-";
    }

    /**
     *  COMPLETED RESIDENCE HALLS
     */

//Check Apartment areas
    else if(buildingName=="WR Grove"||buildingName=="WR Innovat"||buildingName=="WR Lakevw"||buildingName=="WR Plaza"||buildingName=="WR Tower"||buildingName=="WR Valley"||buildingName=="Wolf Vlg A"||buildingName=="Wolf Vlg B"||buildingName=="Wolf Vlg C"||buildingName=="Wolf Vlg D"||buildingName=="Wolf Vlg E"||buildingName=="Wolf Vlg H"){
        pulledArea="-";
    }
    else{
        pulledArea="";
    }
    return pulledArea;
}





function getComplex(buildingName){
    //Check Residence Halls
    //Avent Ferry Complex
    if(buildingName=="AFC - A"||buildingName=="AFC - B"||buildingName=="AFC - E"||buildingName=="AFC - F"){
        pulledComplex="Avent Ferry Complex";
    }
    //Wood Residence Hall
    else if(buildingName=="Wood - A"||buildingName=="Wood - B"){
        pulledComplex = "Wood";
    }
    //NorthEast Area of campus
    //Bagwell, Becton and Berry
    else if(buildingName=="Bagwell"||buildingName=="Becton"||buildingName=="Berry"){
        pulledComplex = "Quad";
    }
    //Gold, Welch and Syme Halls
    else if(buildingName=="Gold"||buildingName=="Welch"||buildingName=="Syme"){
        pulledComplex="Quad";

    }
    //Watauga and North Halls
    else if (buildingName=="Watauga"||buildingName=="North"){
        pulledComplex="-";
    }

    //TRI-TOWERS
    //Bowen, Carroll, Metcalf
    else if(buildingName=="Bowen"||buildingName=="Carroll"||buildingName=="Metcalf"){
        pulledComplex="Tri-Towers";
    }
    //TOTA
    //Tucker, Owen, Turlington, Alexander
    else if(buildingName=="Tucker"||buildingName=="Owen"||buildingName=="Turlington"||buildingName=="Alexander"){
        pulledComplex="TOTA";
    }
    //WEST CAMPUS
    //Lee, Sullivan, Bragaw
    else if(buildingName=="Lee"||buildingName=="Sullivan"||buildingName=="Bragaw"){
        pulledComplex="-";
    }

    /**
     *  COMPLETED RESIDENCE HALLS
     */

//Check Apartment areas
    //Wolf Ridge Apartments
    else if(buildingName=="WR Grove"||buildingName=="WR Innovat"||buildingName=="WR Lakevw"||buildingName=="WR Plaza"||buildingName=="WR Tower"||buildingName=="WR Valley"){
        pulledComplex="Wolf Ridge";
    }
    //Wolf Village Apartments
    else if(buildingName=="Wolf Vlg A"||buildingName=="Wolf Vlg B"||buildingName=="Wolf Vlg C"||buildingName=="Wolf Vlg D"||buildingName=="Wolf Vlg E"||buildingName=="Wolf Vlg H"){
        pulledComplex="Wolf Village";
    }
    else{
        pulledComplex=" ";
    }
    return pulledComplex;
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
    pulledCampus+'&area='+pulledArea+'&complex='+pulledComplex+'&building='+
    pulledBuilding +
    '', '_blank','resizable=no, menubar=no,toolbar=no,width=715, height=920');
}





