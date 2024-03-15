 // Defining a function to display error message
         function printError(elemId, hintMsg) {
             document.getElementById(elemId).innerHTML = hintMsg;
         }
         
         // Defining a function to validate form 
         function validateForm() {
            alert("amit");
             // Retrieving the values of form elements 
             var name     = document.regForm.name.value;
             var dob      = document.regForm.dob.value;
             var mobile   = document.regForm.mobile.value;
             var aadhar   = document.regForm.aadhar.value;
             var pan_no   = document.regForm.pan_no.value;
             var email    = document.regForm.email.value;
             var district = document.regForm.district.value;
             var address  = document.regForm.address.value;
             var business = document.regForm.business.value;
             var vahan    = document.regForm.vahan.value;

             alert(name);
         
           // Defining error variables with a default value
         
             var nameErr = dobErr = mobileErr = aadharErr = pan_noErr = emailErr = districtErr =addressErr = businessErr = vahanErr = true;
             
             // Validate name
             if(name == "") {
                 printError("nameErr", "Please enter your name");
             } else {
                 var regex = /^[a-zA-Z\s]+$/;                
                 if(regex.test(name) === false) {
                     printError("nameErr", "Please enter a valid name");
                 } else {
                     printError("nameErr", "");
                     nameErr = false;
                 }
             }
             
             // Validate email address
             if(email == "") {
                 printError("emailErr", "Please enter your email address");
             } else {
                 // Regular expression for basic email validation
                 var regex = /^\S+@\S+\.\S+$/;
                 if(regex.test(email) === false) {
                     printError("emailErr", "Please enter a valid email address");
                 } else{
                     printError("emailErr", "");
                     emailErr = false;
                 }
             }
             
             // Validate mobile number
             if(mobile == "") {
                 printError("mobileErr", "Please enter your mobile number");
             } else {
                 var regex = /^[1-9]\d{9}$/;
                 if(regex.test(mobile) === false) {
                     printError("mobileErr", "Please enter a valid 10 digit mobile number");
                 } else{
                     printError("mobileErr", "");
                     mobileErr = false;
                 }
             }
         
             // Validate aadhar number
             if(aadhar == "") {
                 printError("aadharErr", "Please enter your aadhar number");
             } else {
                 var regex = /^[1-9]\d{9}$/;
                 if(regex.test(mobile) === false) {
                     printError("aadharErr", "Please enter a valid 12 digit aadhar number");
                 } else{
                     printError("aadharErr", "");
                     mobileErr = false;
                 }
             }
         
             // Validate PAN
             if(pan_no == "") {
                 printError("pan_noErr", "Please enter your PAN No");
             } else {
                 printError("pan_noErr", "");
                 pan_noErr = false;
             }
         
             // Validate address
             if(address == "") {
                 printError("addressErr", "Please enter your address");
             } else {
                 printError("addressErr", "");
                 addressErr = false;
             }
         
              // Validate business
             if(business == "") {
                 printError("businessErr", "Please enter your business");
             } else {
                 printError("businessErr", "");
                 businessErr = false;
             }
             
             // Validate district
             if(district == "Select") {
                 printError("districtErr", "Please select your district");
             } else {
                 printError("districtErr", "");
                 districtErr = false;
             }
         
             // Validate vahan
             if(vahan == "Select") {
                 printError("vahanErr", "Please select your vahan");
             } else {
                 printError("vahanErr", "");
                 vahanErr = false;
             }

             // Validate dob
             if(dob == "") {
                 printError("dobErr", "Please select your dob");
             } else {
                 printError("dobErr", "");
                 dobErr = false;
             }
             
             // Prevent the form from being submitted if there are any errors

             if((nameErr || dobErr || mobileErr || aadharErr || pan_noErr || emailErr  districtErr || addressErr || businessErr || vahanErr) == true) {

                return false;
             } 
         };