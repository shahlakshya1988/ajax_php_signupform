var name = "a";
var pattern = /^[abc]$/; // only accept a,b,c only
var pattern = /^[abc]+$/; // only accept a,b,c,ab,ac,abc only
var pattern = /^[a-z]+$/; // only accept a to z only
var pattern = /^[A-Z]+$/; // only accept A to Z only
var pattern = /^[A-Za-z]+$/; // only accept A to Z and a to z only
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