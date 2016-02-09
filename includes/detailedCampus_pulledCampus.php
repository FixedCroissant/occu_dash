<?php
/** 
 * User: jjwill10
 * Date: 2/5/2016
 * Time: 12:11 PM
 * Description:
 */
/*
 *   //AFC - A = 0
    //AFC - B = 1
    //AFC - E = 2
    //AFC - F = 3
    //Wood - A = 4
    //Wood - B = 5
    //Bagwell = 6
    //Becton = 7
    //Berry = 8
    //Gold = 9
    //Welch = 10
    //Syme = 11
    //Watauga = 12
    //North = 13
    //Bowen = 14
    //Carroll = 15
    //Metcalf = 16
    //Tucker = 17
    //Owen = 18
    //Turlington = 19
    //Alexander = 20
    //Lee = 21
    //Sullivan = 22
    //Bragaw =23
    //WR Grove = 24
    //WR Innovat = 25
    //WR Lakeview = 26
    //WR Plaza = 27
    //WR Tower = 28
    //WR Valley = 29
    //Wolf Vlg A = 30
    //Wolf Vlg B = 31
    //Wolf Vlg C= 32
    //Wolf Vlg D = 33
    //Wolf Vlg E = 34
    //Wolf Vlg F = 35
    //Wolf Vlg G = 36
    //Wolf Vlg H = 37

 */

/**
 *  FOR DESCRIPTION OF METHODS USED IN THE openforBuildingInformation() METHOD, PLEASE LOOK AT THE FOLLOWING FILE: /scripts/popUpForDetailedList.js
 *
 *  method #001 getCampus(buildingName) takes the building name and returns tha appropriate Campus Area. (E.x. if Avent Ferry, returns East Campus,
 *  if Wolf Ridge or Wolf Village apartments, will return "Apartments" as the campus area.
 */


						//Create a new line for the pop up that is shown in the HTML that is processed
						//by this file.
						echo "\n";
						//End New line...

                        //TERM SHOWN ON THE FRONT PAGE IS
                        //CALLED $myTERM


                        /* *************
                         * CAMPUS AREAS
                         *
                         ****/
                        //EAST
                        if($campus=="East") {                           
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(EAST),getBuilding(NONE),getBuilding(NONE),getBuilding(NONE),$myTERM);'>";
                        }

                        //CENTRAL
                        //Wood
                        if($campusAreaCentral==" Central") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(CENTRAL),getBuilding(NONE),getBuilding(NONE),getBuilding(NONE),$myTERM);'>";
                        }

                        //WEST
                        //Quad
                        if($campusAreaWest=="West") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(WEST),getBuilding(NONE),getBuilding(NONE),getBuilding(NONE),$myTERM);'>";
                        }
                        //APARTMENTS
                        if($campusAreaApartments=="Apartments") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(APARTMENTS),getBuilding(NONE),getBuilding(NONE),getBuilding(NONE),$myTERM);'>";
                        }


                        else{
                          
                        }