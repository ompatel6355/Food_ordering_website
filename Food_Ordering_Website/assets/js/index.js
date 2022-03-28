function ressignup() {
    location.replace("res_user_signup.php");
}

function usersignuppage() {
    location.replace("signup.php");
}
function resloginpage() {
    location.replace("reslogin.php");
}

function userloginpage() {
    location.replace("login.php");
}

function searchmodal() {

}

function passwordtype() {
    var x = document.getElementById('signinpassword');
    var y = document.getElementById('hide1');
    var z = document.getElementById('hide2');

    if (x.type === 'password') {
        x.type = 'text';
        y.style.display = "block";
        z.style.display = "none";
    }

    else {
        x.type = 'password';
        y.style.display = "none";
        z.style.display = "block";
    }
}



function additem() {
    var x = document.getElementById('additem');
    // document.getElementById('manage_dishes').style.display = 'none';
    if (x.style.display == 'none') {
        x.style.display = 'block';
    }
    else {
        x.style.display = 'none';
    }
}


function managedishes() {
    var x = document.getElementById('settinghide1');
    var y = document.getElementById('settinghide2');
    var z = document.getElementById('manage_dishes');
    document.getElementById('additem').style.display = 'none';


    if (z.style.display == 'none') {
        x.style.display = 'none';
        y.style.display = 'block';
        z.style.display = 'block';
    }
    else {
        x.style.display = 'block';
        y.style.display = 'none';
        z.style.display = 'none';
    }

}

function loginmodal() {
    var x = document.getElementById('loginmodal');

    if (x.style.display == 'block') {
        x.style.display = 'none';
    }
    else {
        x.style.display = 'block';

    }
}
function closetab() {
    var z = document.getElementById('cross-icon');
    document.getElementById('loginmodal').style.display = 'none';
}

function updatedish() {
    document.getElementById("exampleModalCenter").style.display = 'block';

}
function loginbutton() {

}

// function send_otp(){
//     var email = jQuery('#email').val();
//     jQuery.ajax({
//         url: '../partials/send_otp.php',
//         type:'post',
//         data: 'email =' +email,
//         success: function(result){

//         }
//     })
// }

function totalprice() {
}



// function backbutton(){
//                 document.write('<a href="' + document.referrer + '">Go Back</a>');
// }


// function add_cart_js(){
//     // document.getElementById('home_cart').innerHTML = $sno;
//     var x = document.getElementById("card-button").value;
//   document.getElementById("home_cart").innerHTML = x;
// }


// function validatePassword() {
//     var p = document.getElementById('password').value,
//         errors = [];
//     var password=false;
//     if (p.length < 8) {
//         errors.push("Your password must be at least 8 characters");
//     }
//     if (p.search(/[a-z]/i) < 0) {
//         errors.push("Your password must contain at least one letter.");
//     }
//     if (p.search(/[0-9]/) < 0) {
//         errors.push("Your password must contain at least one digit.");
//     }
//     if (errors.length > 0) {
//         alert(errors.join("\n"));
//         return false;
//     }
//     return true;
//     pass
// }


//succeess message
// function PathLoader(el) {
//     this.el = el;
//     this.strokeLength = el.getTotalLength();

//     // set dash offset to 0
//     this.el.style.strokeDasharray =
//     this.el.style.strokeDashoffset = this.strokeLength;
// }

// PathLoader.prototype._draw = function (val) {
//     this.el.style.strokeDashoffset = this.strokeLength * (1 - val);
// }

// PathLoader.prototype.setProgress = function (val, cb) {
//     this._draw(val);
//     if(cb && typeof cb === 'function') cb();
// }

// PathLoader.prototype.setProgressFn = function (fn) {
//     if(typeof fn === 'function') fn(this);
// }

// var body = document.body,
//     svg = document.querySelector('svg path');

// if(svg !== null) {
//     svg = new PathLoader(svg);

//     setTimeout(function () {
//         document.body.classList.add('active');
//         svg.setProgress(1);
//     }, 200);
// }

// document.addEventListener('click', function () {

//     if(document.body.classList.contains('active')) {
//         document.body.classList.remove('active');
//         svg.setProgress(0);
//         return;
//     }
//     document.body.classList.add('active');
//     svg.setProgress(1);
// });



function InvalidMsg(textbox) {
    if (textbox.value === '') {
        textbox.setCustomValidity('Area name is required');
    } else if (textbox.validity.typeMismatch) {
        textbox.setCustomValidity('please enter a valid area name');
    } else {
        textbox.setCustomValidity('');
    }

    return true;
}



//     function deletefun(){
//         $('button').click(function(){

//             swal({
//             title: 'Are you sure?',
//             text: "It will permanently deleted !",
//             type: 'warning',
//             showCancelButton: true,
//             // confirmButtonText: '',
//             confirmButtonColor: '#3085d6',
//             cancelButtonColor: '#d33',
//             confirmButtonText: '<a style="color:white; text-decoration:none;"href="delete.php">Yes, delete it!</a>',
//             // confirmButtonTextcolor : 'white',
//   customClass: 'history.css',
//             content: {
//                 element: "a",
//                 attributes: {
//                   href : "delete.php",
//                 }
//          }
//           }).then(function() {
//             swal(
//               'Deleted!',
//               'Your file has been deleted.',
//               'success',
//               window.location.replace("history.php")
//             );
//           })

//           })
//     }


function acceptFun() {
    var x = document.getElementById('acceptValue').value;
    var urlAction = 'accept.php?confirm_no=' + x;
    document.getElementById('acceptForm').action = urlAction;


}



function profileModal() {

    var x = document.getElementById('profile_modal');

    if (x.style.display == 'block') {
        x.style.display = 'none';
    }
    else {
        x.style.display = 'block';
    }

}
function closeProfile() {
    jQuery('#profile_modal').hide();
   
    //var z = document.getElementById('profile_modal');
   // document.getElementById('profile_modal').style.display = 'none';
}

function editprofile() {
    var save_icon = document.getElementById('save_profile');
    var edit_profile = document.getElementById('edit_profile');
    var but = document.getElementById('sub_button');
    var x = document.getElementsByTagName('input');
    for (i = 0; i < x.length; i++) {
        if (x[i].disabled == false) {
            x[i].disabled = true;
            save_icon.style.display = 'none';
            but.style.display = 'none';
            edit_profile.style.display = 'unset';
        }
        else {
            x[i].disabled = false;
            but.style.display = 'unset';
            save_icon.style.display = 'unset';
            edit_profile.style.display = 'none';
        }
    }
}



function funLogout(){
    var answer = window.confirm("Are you sure want to logout.");
    if (answer) {
        window.location.replace("logout.php")
    }
    else {
        
    }
}


function login(){
    const form = document.getElementById('login');  
    var email = form.elements['user_email'].value;
    var password = form.elements['password'].value;
    var email_error = document.getElementById('email_error');
    var password_error = document.getElementById('password_error');
    if(email ==="" && password===""){
        alert("Fill all the data which are required");
        email_error.style.display='block';
        password_error.style.display='block';
    }
    else if(email  === ""){
        alert("fill email field");
        email_error.style.display='block';
    }
    else if(password === ""){
        alert("enter password");
        password_error.style.display='block';
        
    }
    else{
        document.forms['login'].submit();
    }

}


const mySearchFun = () =>{
    let filter = document.getElementById('myInput').value.toUpperCase();
     
    let hide = document.getElementsByClassName('form-container');

    var myCard = document.getElementById('card');
        
    var cardBody = document.getElementsByTagName('h5');

    for(var i=0; i<cardBody.length; i++){
        let text = cardBody[i].innerHTML || cardBody.textContent;
        
        if(text.substring(11).toUpperCase().indexOf(filter) > -1){
            hide[i].style.display = '';
        }
        else{
            hide[i].style.display = "none";
            // let changeText = "No Dish found in this area.";
            // document.getElementById('text-show').innerHTML = changeText;
            // text.innerHTML = "hi";
        }
    }
    
}