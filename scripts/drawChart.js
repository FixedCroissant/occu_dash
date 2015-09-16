/**
 * Created by jjwill10 on 9/14/2015.
 * Description:
 */
// Load the Visualization API and the piechart package.
google.load('visualization', '1.0', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {

    // Create the data table.

    //ar = array created in building_information_detailed.php
    //Provide Data  that is from the array.
    var data=new google.visualization.arrayToDataTable([
        ['Classification', 'No of Students', { role: 'style' }],
        ['fr', ar['fr'],'color: #CC0000'],
        ['nfr', ar['nfr'],'#E68080'],
        ['so', ar['so'],'#000000'],
        ['jr', ar['jr'],'#FFFF66'],
        ['sr', ar['sr'],'#FF9933'],
        ['a1', ar['a1'],'#33CC33'],
        ['a2', ar['a2'],'#D6F5D6'],
        ['gr', ar['gr'],'#66FFFF'],
        ['ngr', ar['ngr'],'#006699'],
        ['ntr', ar['ntr'],'#006699'],
        ['p1', ar['p1'],'#006699'],
        ['sp', ar['sp'],'#006699'],
        ['un', ar['un'],'#006699'],
    ]);




    // Set chart options
    var options = {'title':'Classifications of Students',
        'width':500,
        'height':450,

    animation:{
        duration:50000,
        easing:'in'
    }

    };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.ColumnChart(document.getElementById('chart'));


    //Draw empty chart
    chart.draw(data, options);




}
