let navhom=document.getElementById('navhom');
let edit=document.getElementById('edit-profile');
let navserv=document.getElementById('navserv');
let navcont=document.getElementById('navcont');
let username=document.getElementById('user-name-b');
let usernameinput=document.getElementById('user-name-input');
let hisjobpre=document.getElementById('his-job-pre');
let hisjobinput=document.getElementById('his-job-input');

let aboutcontent=document.getElementById('about-content');
// let aboutinput=document.getElementById('about-input');
let educationscontent=document.getElementById('educations-content');
let educationsinput=document.getElementById('educations-input');
let skillcontent=document.getElementById('skill-content');
let skillinput=document.getElementById('skill-input');
let workcontent=document.getElementById('work-content');
let workinput=document.getElementById('work-input');

let mod ="good";

let HOME=document.getElementById('HOME');
navhom.style.color=('white')
navhom.style.backgroundColor=(' #db1bbe')

edit.onclick=function(){
    if(mod=="good"){


edit.innerHTML="save"

mod="save"
username.style.display=("none")
usernameinput.style.display=("block")
hisjobpre.style.display=("none")
hisjobinput.style.display=("block")

aboutcontent.style.display=("none")
aboutinput.style.display=("block")
educationscontent.style.display=("none")
educationsinput.style.display=("block")

skillcontent.style.display=("none")
skillinput.style.display=("block")
workcontent.style.display=("none")
workinput.style.display=("block")

 }else{
    edit.innerHTML="edit profile"
    mod ="good"
    username.style.display=("block")
usernameinput.style.display=("none")
hisjobpre.style.display=("block")
hisjobinput.style.display=("none")

aboutcontent.style.display=("block")
aboutinput.style.display=("none")
educationscontent.style.display=("block")
educationsinput.style.display=("none")

skillcontent.style.display=("block")
skillinput.style.display=("none")
workcontent.style.display=("block")
workinput.style.display=("none")

 }
}
navabout.onclick=function(){


}

navserv.onclick=function(){

}
navcont.onclick=function(){

}

