/*
var name = "a";
var pattern = /^[abc]$/; // only accept a,b,c only
var pattern = /^[abc]+$/; // only accept a,b,c,ab,ac,abc only
var pattern = /^[a-z]+$/; // only accept a to z only
var pattern = /^[A-Z]+$/; // only accept A to Z only
var pattern = /^[A-Za-z]+$/; // only accept A to Z and a to z only
var pattern = /^[A-Za-z]*$/; // only accept A to Z and a to z or blank only
var pattern = /^[-]*$/; // only accept A to Z and a to z or blank only
if(pattern.test(name)){
    alert(name+" Pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
name = "b";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}

name = "c";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
name = "d";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}

name = "ab";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}

name = "ac";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
name = "abc";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}

name = "cba";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
name = "A";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
name = "2";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
name = "1";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}

name = "22222-2222";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
name = "-";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
name = "";
if(pattern.test(name)){
    alert(name+" pattern Match");
}else{
    alert(name+" pattern Not Matching");
}
*/ 

/**   
 * Rules 
 * cannot start from number, special character like _, ., -
 * 
*/
/*
email = "gmail@example.com"
emailPattern=/^[a-zA-Z]+(_|\.)?[a-zA-Z0-9]*@[a-zA-Z]+\.[a-z]+$/i;
alert(emailPattern.test(email));
if(emailPattern.test(email)){

} 
// validate password 
var password = "admin123A";
var password = "admin1A";
var pattern = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;
alert(pattern.test(password));*/