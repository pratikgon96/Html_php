//alert('hi i am here')

console.log('hi')
let userNameValid = false
let pwdValid = false
let pass = /^[A-Za-z]\w{7,14}$/
var email = document.getElementById('exampleInputEmail');
var user_name = document.getElementById('exampleInputUserName');
var phn = document.getElementById('exampleInputMobileNo');

// jQuery('#sub').click(function(e){
// e.preventDefault();
// var email = jQuery('#exampleInputEmail').val();
// })

document.getElementById('sub').addEventListener('click',function(e){
    e.preventDefault()
    // if(email.value == ""){
    //     alert('You need to provide email.');
    //     return false;
    // }else if(user_name.value == ""){
    //     alert("You need to provide user name!");
    //     return false;
    // }
    // else if(!userNameValid){
    //     alert('Enter a longer username')
    //     return
    // }

    jQuery.ajax({
            type: "POST",
            url: 'connect.php',
            data: { UserName: user_name.value, email : email.value,MobileNo:phn.value,Gender:'Male'} ,
            success: function(response)
            {
                console.log(response)
                //var jsonData = JSON.parse(response);
  
                // user is logged in successfully in the back-end
                // let's redirect
               
           }
       });

    console.log(user_name.value);
    console.log("Submitted");
})

document.getElementById('exampleInputUserName').addEventListener('keyup', function(){
    //var user_name = document.getElementById('exampleInputUserName').value;
    if(user_name.value.length <=5){
        //alert()
        userNameValid=false
        document.getElementById('uname_error').innerHTML = 'User Name Should Be Minimum 6 charecters';

        //jQuery('#uname_error').html('User Name Should Be Minimum 6 charecters');
    }
    else{
        userNameValid=true
        document.getElementById('uname_error').innerHTML = '';
    }
    console.log(user_name.value);
})

// document.getElementById('exampleInputPassword1').addEventListener('keypress', function(){
//     var pwd = document.getElementById('exampleInputPassword1');
//     if(!pwd.value.match(pass)){
//         document.getElementById('pwd_strength').innerHTML = 'Weak Password';
//     }
//     else{
//         document.getElementById('pwd_strength').innerHTML = 'Strong Password';
//     }
// })