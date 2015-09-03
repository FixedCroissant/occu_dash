/**
 * Created by jjwill10 on 9/2/2015.
 */

$( document ).ready(function() {
    $('.auto-hide').hide();

    /*Variables*/
    var clicks=0;
    var clicked=0;

    /*
    BEGIN ROTATIONS
     */

    //Rotate the AFC Complex (Complex Heading) arrow.
    $("img#arrowFirst-afc").rotate({

        bind:
        {    //On first click
            click: function(){
                if(clicked==0) {
                    $(this).rotate({angle: 0, animateTo: 90, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked
                    clicked=1;      //Assign the clicked element to 1.
                }
                else if(clicked==1) {
                    $(this).rotate({angle: 0, animateTo: 0, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked once it's been clicked a second time.
                    clicked=0;      //Setting clicked to the default value of 0.
                }
            }//close click function

        }

    });


    //Rotate the wood Complex (Complex Heading) arrow.
    $("img#arrowFirst-wood").rotate({

        bind:
        {    //On first click
            click: function(){
                if(clicked==0) {
                    $(this).rotate({angle: 0, animateTo: 90, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked
                    clicked=1;      //Assign the clicked element to 1.
                }
                else if(clicked==1) {
                    $(this).rotate({angle: 0, animateTo: 0, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked once it's been clicked a second time.
                    clicked=0;      //Setting clicked to the default value of 0.
                }
            }//close click function

        }

    });

    //Rotate the Quad Complex arrow.
    $("img#arrowFirst-quad").rotate({

        bind:
        {    //On first click
            click: function(){
                if(clicked==0) {
                    $(this).rotate({angle: 0, animateTo: 90, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked
                    clicked=1;      //Assign the clicked element to 1.
                }
                else if(clicked==1) {
                    $(this).rotate({angle: 0, animateTo: 0, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked once it's been clicked a second time.
                    clicked=0;      //Setting clicked to the default value of 0.
                }
            }//close click function

        }

    });



    //Rotate the TriTowers arrow.
    $("img#arrowFirst-tritowers").rotate({

        bind:
        {    //On first click
            click: function(){
                if(clicked==0) {
                    $(this).rotate({angle: 0, animateTo: 90, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked
                    clicked=1;      //Assign the clicked element to 1.
                }
                else if(clicked==1) {
                    $(this).rotate({angle: 0, animateTo: 0, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked once it's been clicked a second time.
                    clicked=0;      //Setting clicked to the default value of 0.
                }
            }//close click function

        }

    });

//Rotate the TOTA arrow.
    $("img#arrowFirst-tota").rotate({

        bind:
        {    //On first click
            click: function(){
                if(clicked==0) {
                    $(this).rotate({angle: 0, animateTo: 90, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked
                    clicked=1;      //Assign the clicked element to 1.
                }
                else if(clicked==1) {
                    $(this).rotate({angle: 0, animateTo: 0, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked once it's been clicked a second time.
                    clicked=0;      //Setting clicked to the default value of 0.
                }
            }//close click function

        }

    });


//Rotate the West arrow.
    $("img#arrowFirst-west").rotate({

        bind:
        {    //On first click
            click: function(){
                if(clicked==0) {
                    $(this).rotate({angle: 0, animateTo: 90, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked
                    clicked=1;      //Assign the clicked element to 1.
                }
                else if(clicked==1) {
                    $(this).rotate({angle: 0, animateTo: 0, easing: $.easing.easeInOutExpo})

                    clicked++;      //increment the click.

                    //reset clicked once it's been clicked a second time.
                    clicked=0;      //Setting clicked to the default value of 0.
                }
            }//close click function

        }

    });





    /*
    ROTATIONS
     */

    //Create clicks for Areas

    //Southeast
    $( "img#arrowFirst-southeast_Group" ).click(function() {
        if(clicks==0){
            //Show sub category rows
            $(".building-elements-SoutheastGroup ").show(200);  //animate 2-milliseconds

            clicks++;        //increment the clicks.

        }else{
            //Hide sub category rows after more one click on the element.
            $(".building-elements-SoutheastGroup").hide(200);  //animate 2-milliseconds

            //Also Hide AFC Complex
            $(".building-elements-afc").hide(200);  //animate 2-milliseconds

            //Also Hide Wood Complex Too
            $("building-elements-wood").hide(200);

            clicks=0;        //reset the clicks.
        }
    });

    //End South east





    //North
    $( "img#arrowFirst-northeast_Group" ).click(function() {
        if(clicks==0){
            //Show sub category rows
            $(".building-elements-NortheastGroup").show(200);  //animate 2-milliseconds

            clicks++;        //increment the clicks.

        }else{
            //Hide sub category rows after more one click on the element.
            $(".building-elements-NortheastGroup").hide(200);  //animate 2-milliseconds

            //Hide Quad
            $(".building-elements-quad").hide(200);  //animate 2-milliseconds



            clicks=0;        //reset the clicks.
        }
    });

    //End North east














    //Create a click for AFC ...
    $( "img#arrowFirst-afc" ).click(function() {
        if(clicks==1){          //Must set Clicks equal to 1 as the first click "Southeast" will already be accomplished.
            //Show sub category rows
            $(".building-elements-afc").show(200);  //animate 2-milliseconds
            clicks++;        //increment the clicks.

        }else{
            //Hide sub category rows after more one click on the element.
            $(".building-elements-afc").hide(200);  //animate 2-milliseconds
            clicks=1;        //reset the clicks.
        }
    });

    //Create a click for Wood ...
    $( "img#arrowFirst-wood" ).click(function() {
        if(clicks==1){
            //Show sub category rows
            $(".building-elements-wood").show(200);
            clicks++;        //increment the clicks.

        }else{
            //Hide sub category rows after more one click on the element.
            $(".building-elements-wood").hide(200);
            clicks=1;        //reset the clicks to 1
        }
    });


    //Create a click for Quad ...
    $( "img#arrowFirst-quad" ).click(function() {
        if(clicks==1){
            //Show sub category rows
            $(".building-elements-quad").show(200);
            clicks++;        //increment the clicks.

        }else{
            //Hide sub category rows after more one click on the element.
            $(".building-elements-quad").hide(200);
            clicks=1;        //reset the clicks.
        }
    });


    //Create a click for TriTowers
    $( "img#arrowFirst-tritowers" ).click(function() {

        if(clicks==0){
            //Show sub category rows
            $(".building-elements-tritowers").show(200);
            clicks++;        //increment the clicks.

        }else{
            //Hide sub category rows after more one click on the element.
            $(".building-elements-tritowers").hide(200);
            clicks=0;        //reset the clicks.
        }
    });

    //Create a click for TOTA
    $( "img#arrowFirst-tota" ).click(function() {

        if(clicks==0){
            //Show sub category rows
            $(".building-elements-tota").show(200);
            clicks++;        //increment the clicks.

        }else{
            //Hide sub category rows after more one click on the element.
            $(".building-elements-tota").hide(200);
            clicks=0;        //reset the clicks.
        }
    });


    //Create a click for West Campus
    $( "img#arrowFirst-west" ).click(function() {

        if(clicks==0){
            //Show sub category rows
            $(".building-elements-west").show(200);
            clicks++;        //increment the clicks.

        }else{
            //Hide sub category rows after more one click on the element.
            $(".building-elements-west").hide(200);
            clicks=0;        //reset the clicks.
        }
    });


});