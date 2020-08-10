
jQuery(document).ready(function($){



var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="email" name="" class="form-control" style="float:left"/><a href="#" class="remove_field"><i class="fa fa-times" aria-hidden="true"></i></a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });



 $( function() {
    $( "#selectable" ).selectable();
    $("#selectable2").selectable();
  } );
 $( function() {
    $( "#add-range" ).click(
function(){
 $( ".one-range" ).hide();
$( ".salary-range" ).show();

});   
  $("#back-one-range").click(
  	function(){
 $( ".one-range" ).show();
$( ".salary-range" ).hide();

}); 
 });

 $(function(){
 	 $("#firstcontinue").click(function(){
    var s=$("#jobtitle").val();
    var c=$("#company").val();
    var l=$("#location").val();
    $(".j-title").html(s+"<br>");
    $(".j-company").html(" "+c+"-");
    $(".j-location").html(" "+l+" ");
    $(".l-location").html("Are you in "+l+".");
 });
 });
 $('#jobtitle, #company, #location').bind('keyup', function() {
    if(allFilled()){
    	$('#firstcontinue').removeAttr('disabled');
    } 
});
 function allFilled() {
    var filled = true;
    $('#first-item input').each(function() {
        if($(this).val() == '') filled = false;
    });
    return filled;
}

//hiding and displaying of sections
 $("#firstcontinue").click(function(){
   $("#first-item").hide();
   $("#second-item").show();
   $("#third-item").hide();
   $("#fourth-item").hide();
   $("#fifth-item").hide();
   $(".progress-bar").css("width", "40%");
 });
 $("#secondcontinue").click(function(){
 $("#first-item").hide();
$("#second-item").hide();
$("#third-item").show();
$(".progress-bar").css("width", "60%");
 });
  $("#thirdcontinue").click(function(){
 	$("#first-item").hide();
$("#second-item").hide();
$("#third-item").hide();
$("#fourth-item").show();
$(".progress-bar").css("width", "80%");
 });
    $("#fourthcontinue").click(function(){
 	$("#first-item").hide();
$("#second-item").hide();
$("#third-item").hide();
$("#fourth-item").hide();
$("#fifth-item").show();
$(".progress-bar").css("width", "100%");
 });

 //fifth item div hiding and displaying

    $("#experience").click(function(e){ //on add input button click
    	$("#ex-div").collapse();
       $("#ex-div").append('<div class="border"><div class="form-group first-input"><label for="exampleInputName2">This job requires</label><select class="form-control"><option>one Year</option><option>two Day</option><option>five Week</option><option>ten MOnth</option></select></div><div class="form-group second-input"><label for="exampleInputEmail2">of</label><input type="text" class="form-control" id="" placeholder=""><label for="exampleInputEmail2">experience</label></div><button type="submit" id="preview-one" class="btn btn-default">preview</button><a href="#" class="remove" ><i class="fa fa-times" aria-hidden="true"></i></a></div>'); //add input box
        
    });
    
    $("#ex-div").on("click",".remove", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
    });

  $("#education").click(function(e){ //on add input button click
    	$(".education").toggle();
    	$("#education").hide(); 
    });
   $(".education").on("click",".remove", function(e){ //user click on remove text
       $(".education").toggle(); 
        $("#education").show();

    });

    $("#locations").click(function(e){ //on add input button click
    	$(".locations").toggle();
    	$("#locations").hide(); 
    });
   $(".locations").on("click",".remove", function(e){ //user click on remove text
       $(".locations").toggle(); 
        $("#locations").show();

    });
       $("#language").click(function(e){ //on add input button click
    	$("#lang-div").collapse();
       $("#lang-div").append('<div class="border"><div class="form-group edu-input"><label for="exampleInputName2">This job requires the following language: </label><input type="text" class="form-control" id="" placeholder=""></div><button type="submit" id="preview-one" class="btn btn-default">preview</button><a  class="remove"><i class="fa fa-times" aria-hidden="true"></i></a></div>'); //add input box
        
    });
    
    $("#lang-div").on("click",".remove", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove();
    });

//back buttons functions.....
$("#secondback").click(function(){
 	$("#first-item").show();
   $("#second-item").hide();
   $("#third-item").hide();
   $("#fourth-item").hide();
   $("#fifth-item").hide();
   $(".progress-bar").css("width", "20%");
 });
$("#thirdback").click(function(){
 	$("#first-item").hide();
   $("#second-item").show();
   $("#third-item").hide();
   $("#fourth-item").hide();
   $("#fifth-item").hide();
   $(".progress-bar").css("width", "40%");
 });
$("#fourthback").click(function(){
 	$("#first-item").hide();
   $("#second-item").hide();
   $("#third-item").show();
   $("#fourth-item").hide();
   $("#fifth-item").hide();
   $(".progress-bar").css("width", "60%");
 });
$("#fifthback").click(function(){
 	$("#first-item").hide();
   $("#second-item").hide();
   $("#third-item").hide();
   $("#fourth-item").show();
   $("#fifth-item").hide();
   $(".progress-bar").css("width", "80%");
 });

});

