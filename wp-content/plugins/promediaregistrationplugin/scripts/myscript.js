/*
  -------------------------------------------------------------------------
		      JavaScript Form Validator (gen_validatorv31.js)
              Version 3.1.2
	Copyright (C) 2003-2008 JavaScript-Coder.com. All rights reserved.
	You can freely use this script in your Web pages.
	You may adapt this script for your own needs, provided these opening credit
    lines are kept intact.
		
	The Form validation script is distributed free from JavaScript-Coder.com
	For updates, please visit:
	http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
	
	Questions & comments please send to form.val at javascript-coder.com
  -------------------------------------------------------------------------  
*/
jQuery(document).ready(function(){
var locitem=localStorage.getItem('username');
//console.log(locitem);
if(locitem != null){
				console.log(locitem);
				jQuery('#hiMsg').html("hi "+" "+locitem);
				jQuery("#formShow,#registerform").hide();
				jQuery("#welcomeShow").show();
			}
});


function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
/*
  -------------------------------------------------------------------------
		      JavaScript Form Validator (gen_validatorv31.js)
              Version 3.1.2
	Copyright (C) 2003-2008 JavaScript-Coder.com. All rights reserved.
	You can freely use this script in your Web pages.
	You may adapt this script for your own needs, provided these opening credit
    lines are kept intact.
		
	The Form validation script is distributed free from JavaScript-Coder.com
	For updates, please visit:
	http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
	
	Questions & comments please send to form.val at javascript-coder.com
  -------------------------------------------------------------------------  
*/
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
/*var frmvalidator  = new Validator("contact_form");
//remove the following two lines if you like error message box popups
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
*/


var myurl = jQuery("#pluginurl").val();
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	jQuery("#letters_code").val("");
	console.log(img);
}
jQuery(document).ready(function(){
	var sc = jQuery( "#security_check" ).val()
   jQuery("#registerform").validate({
      rules: {
         name: { required: true },
		 lname: { required: true },
		 email: {required: true, email: true },
		 confemail : { equalTo : '#email'},
		 pass : { required: true },
		 con_password : { equalTo : '#pass'},
		 gender: { required: true },
		 sday: { required: true },
		 smon :{ required: true },
		 syr :{ required: true },
		 city: { required: true },
		city: { required: true },
		country : { required: true },
		nationality: { required: true},
		optcancontact : {required: true},
		tpartycontact : {required: true},
		comp_nm : { required: true },
		job_title : { required: true },
		industry_main : { required: true },
		security_code : {required: true , 
							remote : {
									url: myurl+'content.php',
									type: "post",
									data: {
									security_check : function() {
									return jQuery( "#security_check" ).val();
									}
									}
							}
		}
         },
		  messages: {
        security_code: {
            required:"Please enter the code",
			remote:"Please enter the valid code"
        }
    }
		 
     });//end of validation
	 

});
jQuery(document).ready(function(){
   jQuery("#loginform").validate({
      rules: {
		 username : {required: true, email: true },
		 password : { required: true }
         }
     });//end of validation
});
jQuery('#logout').click(function()
{       
			 //localStorage.removeItem('username');
			 //delete window.localStorage["username"];
			 localStorage.clear();
             location.reload();
});
jQuery('#test_send').click(function()
{       

             jQuery.ajax({
		  url: myurl+'occupation.php',
		  type: "POST",
		  success: function(data){
			
			console.log('Success ' + data);
		
		  }
		});
});
function getSubList(val,divid){

	jQuery.ajax({
		  url: myurl+'occupation.php',
		  type: "POST",
		  data : "industry_main="+val,
		  success: function(data){
			jQuery(divid).html(data)
		  },
		  error: function (jqXHR, textStatus, errorThrown){
			console.log('Error ' + jqXHR);
			alert('Error ' + jqXHR);
		  }
		});
}
jQuery("#industry_main").change(function(){
    jQuery('#industry,#occupation').find('option').remove().end(); //clear the city ddl
    var industry_main = jQuery(this).find("option:selected").text();
    alert(industry_main);
    //do the ajax call
    jQuery.ajax({
        url: myurl+'occupation.php',
        type:'POST',
        data:{Main:industry_main},
        dataType:'json',
        cache:false,
        success:function(data){

        var obj=jQuery.parseJSON(data)
			console.log('Success ' + obj);
         var ddl = document.getElementById('industry');                      

         for(var c=0;c<obj.length;c++)
              {              
               var option = document.createElement('option');
               option.value = obj[c];
               option.text  = obj[c];                           
               ddl.appendChild(option);
              }


    },
        error:function(jxhr){
        alert(jxhr.responseText);

    }
    }); //end of specific industry
	   jQuery.ajax({
        url: myurl+'occupation2.php',
        type:'POST',
        data:{ind_main:industry_main},
        dataType:'json',
        cache:false,
        success:function(data){

        var obj=jQuery.parseJSON(data)
			console.log('Success ' + obj);
         var ddl = document.getElementById('occupation');                      

         for(var c=0;c<obj.length;c++)
              {              
               var option = document.createElement('option');
               option.value = obj[c];
               option.text  = obj[c];                           
               ddl.appendChild(option);
              }
    },
        error:function(jxhr){
        alert(jxhr.responseText);

    }
    }); //end of occupation
	

});
//datepicker
 jQuery(function() {
jQuery( "#sday" ).datepicker();
});
function validation_form() {
	var myurl1 = jQuery("#pluginurl").val();
	//alert(jQuery("#registerform").validate().form());
	var dat=jQuery("#registerform").serializeArray();
	dat=jQuery.param(dat);
 if(jQuery("#registerform").validate().form()){
	 
	  jQuery.ajax({
		  url: myurl1+'commonregister.php',
		  type: "POST",
		  data : dat,
		  success: function(data){
			
			var obj=jQuery.parseJSON(data)
			console.log('Success ' + obj);
			var status=obj.status;
			
			if(status=='fail'){
				
				jQuery('#message').html(obj.message).fadeIn();
				 jQuery('html, body').animate({
        scrollTop: jQuery("#message").offset().top
    }, 2000);
			/*setInterval(function() {
   jQuery('#message').html('').fadeOut();

  }, 5000); // the "3000"  */
				
			}
			else if(status==""){
				jQuery('#message').html("oops something went wrong").scroll() ;
				 jQuery('html, body').animate({
        scrollTop: jQuery("#message").offset().top
    }, 2000);
				jQuery('#message').removeClass('showdiv');
				location.reload();
			}
			else {
				jQuery('#message').html("Registered Successfully").scroll();
				 jQuery('html, body').animate({
        scrollTop: jQuery("#message").offset().top
    }, 2000);
				 jQuery('#registerform').each(function(){
				   this.reset();
				});
			}
			//alert('Success ' + data);
			 /*jQuery('#message').html(data).fadeIn();
			setInterval(function() {
   jQuery('#message').html('').fadeOut();

  }, 5000); // the "3000"  */
		  },
		  error: function (jqXHR, textStatus, errorThrown){
			console.log('Error ' + jqXHR);
			alert('Error ' + jqXHR);
		  }
		});
/*	  //hang on event of form with id=myform
		jQuery(document).ajaxStart(function() {
//jQuery('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...'); // show the gif image when ajax starts
}).ajaxStop(function() {

});
jQuery.ajaxPrefilter(function(options) {
if(options.crossDomain && jQuery.support.cors) {
var http = (window.location.protocol === 'http:' ? 'http:' : 'https:');
options.url = http + '//cors-anywhere.herokuapp.com/' + options.url;
}
});
        //do your own request an handle the results
         jQuery.ajax({
                url: "http://services.itp.com/ITPauth/Register",
                type: 'post',
                dataType: 'json',
                data: jQuery("#registerform").serialize(),
                success: function(data) {
					//var obj = jQuery.parseJSON( data );
					console.log(data.type);
                           jQuery('#err').html(data);
                         }
            });*/
 }
}
function login_validate(){
	var myurl2 = jQuery("#pluginurl").val();
	var dat_login=jQuery("#loginform").serializeArray();
	dat_login = jQuery.param(dat_login);
  if(jQuery("#loginform").validate().form()){
	  jQuery.ajax({
		  url: myurl2+'commonlogin.php',
		  type: "POST",
		  data : dat_login,
		  success: function(data){
			
			var obj=jQuery.parseJSON(data)
			console.log('Success ' + obj);
			var status=obj.status;
			var name=obj.name;
			localStorage.setItem('username', name);
			// Retrieve the object from storage
			var retrievedObject = localStorage.getItem('username');
			console.log('retrievedObject: ',retrievedObject );
			if(status=='fail'){
				
				jQuery('#loginmsg').html(obj.message).fadeIn().scroll();
				 jQuery('#loginmsg').animate({
        scrollTop: jQuery("#loginmsg").offset().top
    }, 2000);
			/*setInterval(function() {
   jQuery('#message').html('').fadeOut();

  }, 5000); // the "3000"  */
				
			}
			else if(status==""){
				jQuery('#loginmsg').html("oops something went wrong").scroll() ;
				jQuery('#loginmsg').animate({
        scrollTop: jQuery("#loginmsg").offset().top
    }, 2000);
				jQuery('#loginmsg').removeClass('showdiv');
			}
			else if(localStorage.getItem("username") != ""){
				jQuery('#loginmsg').html("Logged in Successfully").scroll();
				jQuery('#hiMsg').html("hi "+" "+retrievedObject);
				jQuery("#formShow,#registerform").hide();
				jQuery("#welcomeShow").show();
			}
			//alert('Success ' + data);
			 /*jQuery('#message').html(data).fadeIn();
			setInterval(function() {
   jQuery('#message').html('').fadeOut();

  }, 5000); // the "3000"  */
		  },
		  error: function (jqXHR, textStatus, errorThrown){
			console.log('Error ' + jqXHR);
			alert('Error ' + jqXHR);
		  }
		});
  }
}