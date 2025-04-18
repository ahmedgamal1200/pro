let home=document.getElementById('home')
let manag=document.getElementById('manag')
let hid=document.getElementById('hid')
let hid1=document.getElementById('hid1')

let name=document.getElementById('name')
let nameinput=document.getElementById('name-input')

let aboutcontent=document.getElementById('about-content')
let aboutinput=document.getElementById('about-input')

let jobscontent=document.getElementById('jobs-content')
let jobsinput=document.getElementById('jobs-input')

let mustcontent=document.getElementById('must-content')
let mustinput=document.getElementById('must-input')




let Ownercontent=document.getElementById('Owner-content')
let Ownerinput=document.getElementById('Owner-input')

let Managercontent=document.getElementById('Manager-content')
let Managerinput=document.getElementById('Manager-input')

let Teamcontent=document.getElementById('Team-content')
let Teaminput=document.getElementById('Team-input')

let Contactcontent=document.getElementById('Contact-content')
let Contactinput=document.getElementById('Contact-input')


let edite=document.getElementById('edite')



let edite1=document.getElementById('edite1')






let mod="good"


hid.onclick=function(){

    home.style.display="none"
    manag.style.display="block"
}
hid1.onclick=function(){
    
    home.style.display="block"
    manag.style.display="none"
}
edite.onclick=function(){
    if(mod=="good"){
        edite.innerHTML="save"
       name.style.display="none" 
    nameinput.style.display="block"  
  
    aboutcontent.style.display="none" 
    aboutinput.style.display="block"  
   
    jobscontent.style.display="none" 
    jobsinput.style.display="block"  
   
    mustcontent.style.display="none" 
    mustinput.style.display="block"  
  
    mod="save" 
    }else{
        mod="good"
          edite.innerHTML="edite"
        name.style.display="block" 
        nameinput.style.display="none"  
        aboutcontent.style.display="block" 
        aboutinput.style.display="none"  
       
        jobscontent.style.display="block" 
        jobsinput.style.display="none"  
       
        mustcontent.style.display="block" 
        mustinput.style.display="none"  
    }

   
}


edite1.onclick=function(){
    if(mod=="good"){
        edite1.innerHTML="save"
        Ownercontent.style.display="none" 
        Ownerinput.style.display="block"  
  
        Managercontent.style.display="none" 
        Managerinput.style.display="block"  
   
        Teamcontent.style.display="none" 
        Teaminput.style.display="block"  
   
        Contactcontent.style.display="none" 
    Contactinput.style.display="block"  
  
    mod="save" 
    }else{
        mod="good"
          edite1.innerHTML="edite"
          Ownercontent.style.display="block" 
          Ownerinput.style.display="none"  
          Managercontent.style.display="block" 
          Managerinput.style.display="none"  
       
          Teamcontent.style.display="block" 
          Teaminput.style.display="none"  
       
          Contactcontent.style.display="block" 
          Contactinput.style.display="none"  
    }
}