<?php
/** 
 * User: jjwill10
 * Date: 10/14/2015
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

						
                        //Avent Ferry Complex	
                        if($complexArea=="Avent Ferry Complex") {							
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-36]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-36]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-36]),getBuilding(NONE),$myTERM);'>";                           
                        }
                        //Wood
                        else if($complexArea=="Wood") {						
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-33]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-33]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-33]),getBuilding(NONE),$myTERM);'>";
                        }
                        //Quad
                        else if($complexArea=="Quad") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-31]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-31]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-31]),getBuilding(NONE),$myTERM);'>";
                        }
                        //Tri-Towers
                        else if($complexArea=="Tri Towers") {
                           echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-23]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-23]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-23]),getBuilding(NONE),$myTERM);'>"; 
                        }
                        //TOTA
                        else if($complexArea=="TOTA") {
                           echo "<a class='link'  target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-20]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-20]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-20]),getBuilding(NONE),$myTERM);'>"; 
                        }
                        //WEST
                        else if($complexArea=="West") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-16]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-16]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-16]),getBuilding(NONE),$myTERM);'>";
                        }
                        //Wolf Ridge
                        else if($complexArea=="Wolf Ridge") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-13]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-13]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-13]),getBuilding(NONE),$myTERM);'>";
                        }
                        //Wolf Village
                        else if($complexArea=="Wolf Village") {
                            echo "<a class='link' target='blank' onclick='return openforBuildingInformation(getCampus(pulledBuildingArray[lengthOFBUILDING_ARRAY-7]),getArea(pulledBuildingArray[lengthOFBUILDING_ARRAY-7]),getComplex(pulledBuildingArray[lengthOFBUILDING_ARRAY-7]),getBuilding(NONE),$myTERM);'>";
                        }

                        else{
                            
                        }
