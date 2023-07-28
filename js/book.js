/*captcha*/
var captcha;
function generate() {

// Clear old input
document.getElementById("submit").value = "";

// Access the element to store
// the generated captcha
captcha = document.getElementById("image");
var uniquechar = "";

const randomchar =
"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

// Generate captcha for length of
// 5 with random character
for (let i = 1; i < 5; i++) {
uniquechar += randomchar.charAt(
Math.random() * randomchar.length)
}

// Store generated input
captcha.innerHTML = uniquechar;
}

function printmsg() {
const usr_input = document
.getElementById("submit").value;

// Check whether the input is equal
// to generated captcha or not
if (usr_input == captcha.innerHTML) {
$(document).ready(function(){
var packageid=$('#txtpackageid').val();
var name=$('#txtname').val()
var email=$('#txtemail').val()
var phone=$('#txtphone').val()
var people=$('#txtpeople').val()
var from=$('#txtfrom').val()
var comment=$('#comment').val()
var currentdate=new Date()
var comparedate=new Date($('#txtfrom').val())

if(packageid==""){
$('#result').html('Please select a tour');
setTimeout(function(){
location.href='package.php'
},2000)
}else if (name=="") {
$('#result').html('What is your name?')
setTimeout(function() {
$('#result').html('')
}, 1800);
}else if (email=="") {
$('#result') .html('Please input your email')  
setTimeout(function() {
$('#result').html('')
}, 1800);    
}else if (phone=="") {
$('#result') .html('Please input your phone no.')
setTimeout(function() {
$('#result').html('')
}, 1800);       
}else if(phone.length<10){
$('#result') .html('Phone number too short!')
setTimeout(function() {
$('#result').html('')
}, 1800);
}else if(phone.length>10){
$('#result') .html('Phone number too long!')
setTimeout(function() {
$('#result').html('')
}, 1800);
}else if (people=="") {
$('#result') .html('How many people?')
setTimeout(function() {
$('#result').html('')
}, 1800);       
}else if (from=="") {
$('#result')  .html('When are you cheking in?')
setTimeout(function() {
$('#result').html('')
}, 1800);       
}else if(people<='0'){
        $('#result').html('Invalid number of people!')
}else if(comparedate.getTime()<currentdate.getTime()){
    $('#result').html('Invalid date!')
    setTimeout(function(){
        $('#result').html('')
    }, 1800)
}else{
$.ajax({

url:'maildb.php',
type:'POST',
data:{
packageid:packageid,
name:name,
email:email,
phone:phone,
people:people,
from:from,
comment:comment
},
success:function(data){
$('#result').html(data)
setTimeout(function() {
$('#result').html('')
}, 2500);  
generate();
}
})
setTimeout (function(){
document.getElementById('txtname').value=""
document.getElementById('txtemail').value=""
document.getElementById('txtphone').value=""
document.getElementById('txtpeople').value=""
document.getElementById('txtfrom').value=""
document.getElementById('txtcomment').value=""
}, 2000)
}
})
}
else {
var s = document.getElementById("result")
.innerHTML = "Captcha not matched";
setTimeout(function(){
var s=document.getElementById('result')
.innerHTML=''
}, 1000)
generate();
}
}
$(document).ready(function(){
$('.subscribe').on('click', function(){
var email=$(this).closest('.input-group').find('.email')[0].value
if(email==""){
    alert('Enter Email')
}else{
$.ajax({
url: "https://formsubmit.co/ajax/info@pulmmertours.co.ke",
//info@pulmertours.co.ke
method: "POST",
data: {
NEWSLETTER: "SUBSCRIPTION EMAIL",
Email:email,
},
dataType: "json"

})
alert('Thank You. You will receive Emails')
location.reload()
}
})
/*inquiries*/
$('.btn-inquiry').on('click', function(){
var name=$(this).closest('.rounded-bottom').find('.form-group').find('.name')[0].value
var email=$(this).closest('.rounded-bottom').find('.form-group').find('.email')[0].value
var message=$(this).closest('.rounded-bottom').find('.form-group').find('.message')[0].value
// $(this).closest('.rounded-bottom').find('.the_response').html('Please fill everything')
if(email==""||name==""||message==""){$(this).closest('.rounded-bottom').find('.the_response').html('All fields are required')
$(this).closest('.rounded-bottom').find('.the_response').html('All fields are required')


}else{

$.ajax({
url: "https://formsubmit.co/ajax/info@pulmmertours.co.ke",
//info@pulmertours.co.ke
method: "POST",
data: {
INQUIRY: "",
NAME:name,
EMAIL:email,
MESSAGE:message,
},
dataType: "json"

})
$(this).closest('.rounded-bottom').find('.the_response').html('Thank You. We will contact you soon')
setTimeout(function(){
location.reload()
}, 1500)
}

})
/*review*/
$('#btn_review').on('click', function(){
var data=$('#frmreview').serialize() + '&btn_review=btn_review'
if(document.getElementById('name').value==""){
$('#revew_response').html('Fill Your Name')
setTimeout(function(){
$('#revew_response').html('')
},1500)
}else if(document.getElementById('review').value==""){
$('#revew_response').html('Tell us something...')
setTimeout(function(){
$('#revew_response').html('')
},1500)
}else{
    $.ajax({
        url:'maildb.php',
        method:'POST',
        data:data,
        success:function(data){
            $('#revew_response').html(data)
setTimeout(function(){
$('#revew_response').html('')
},1500)
        }
    })
}
})
})