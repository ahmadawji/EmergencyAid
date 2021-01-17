
/* document.addEventListener("DOMContentLoaded",(event)=>{
   
    loadData();
    loadNurseData();
}); */
window.onload=function(){
    loadData();
    loadNurseCities();
    loadNurseData();
    loadNurseOperating();
    loadNursesHistory()

}



function loadData(){
    let ct =document.querySelector("#ct");//for grabbing cities to update user's profile
    let hos=document.querySelector("#hos");
    let xhttp= new XMLHttpRequest();
    let xhttpHos= new XMLHttpRequest();
    let xhttpUsers= new XMLHttpRequest();
    let CT=document.querySelector("#userCity");//for preview the first option of select
    let CT1=document.querySelector("#userCity1");//for taking the value of the first option related to select value with id ct1
    
    let fn= document.querySelector("#fn");
    let ln= document.querySelector("#ln");
    let un= document.querySelector("#un");
    let bd= document.querySelector("#bd");
    let hosp=document.querySelector("#userHosp");
    let proIma=document.querySelector("#proImag");
    let gender= document.getElementsByName('gender');
    
    
    
    xhttpUsers.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let resp = JSON.parse(this.response);
            fn.value=resp[0].fname;
            ln.value=resp[0].lname;
            un.value=resp[0].username;
            bd.value=resp[0].bdate;
            proIma.setAttribute("src",resp[0].profileImag);
            hosp.setAttribute("value",resp[0].hid);
            hosp.innerText="Youre assigned in: "+resp[0].hname;
            CT.setAttribute("value",resp[0].city);
            CT.innerText="Youre located in: "+resp[0].city;
            CT1.setAttribute("value",resp[0].city);//for setting the default city for nurses in the second section 
            CT1.innerText="Youre located in: "+resp[0].city;
            
        }
        
    } 
    
    
    xhttpHos.onreadystatechange = function() {//fetching info about hospitals 
        if (this.readyState == 4 && this.status == 200) {
            let myObj1 = JSON.parse(this.responseText);
            for (i in myObj1){
                let option1= document.createElement("option");
                option1.setAttribute("value",myObj1[i].hid);
                option1.innerText=myObj1[i].hname;
                hos.appendChild(option1);
            }
            
        }
    }
    xhttp.onreadystatechange = function() {//fetching data for cities 
        if (this.readyState == 4 && this.status == 200) {
            let myObj = JSON.parse(this.responseText);
            for (i in myObj){
                let option= document.createElement("option");
                option.setAttribute("value",myObj[i].city);
                option.innerText=myObj[i].city;
                ct.appendChild(option);
            }
            
        }
    }
    xhttp.open("POST","loaddata.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    
    xhttpHos.open("POST","loadHospData.php", true);
    xhttpHos.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttpHos.send();

    xhttpUsers.open("POST","loadUserData.php", true);
    xhttpUsers.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttpUsers.send();
}

//This function is used to load the nurse data after the nurse's has been loaded since the data 
function loadNurseCities(){

let ct1 =document.querySelector("#ct1");//The select option 
let request= new XMLHttpRequest();
//request.addEventListener("load",transferComplete);


request.onreadystatechange=function(){
    if (this.readyState == 4 && this.status == 200) {
        let myObj = JSON.parse(this.responseText);
        console.log(myObj);
        for (i in myObj){
            let option= document.createElement("option");
            option.setAttribute("value",myObj[i].city);
            option.innerText=myObj[i].city;
            ct1.appendChild(option);
        }
        
        }   
        

    }
    

request.open("POST","loaddata.php", true);
request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
request.send();

/* function transferComplete(){
    loadNurseData();
} */


}


function loadNurseData(){//It will load the data as what chosen in the select option, the manager's city is chosen by default 


let reqNurLoc= new XMLHttpRequest(); //this insatnce is used to get the data of the nurses where the manager is located


let city=document.querySelector("#managerCity").value;
console.log(city);
let tableNur= document.querySelector("#nursedata");

reqNurLoc.onreadystatechange=function(){
    if (this.readyState == 4 && this.status == 200) {
        let myObj = JSON.parse(this.responseText);
        console.log(myObj);

         for(var i=0; i<myObj.length; i++){
            var userName=document.createTextNode(myObj[i].username);
            var firstName=document.createTextNode(myObj[i].fname);
            var lastName=document.createTextNode(myObj[i].lname);
            var whours=document.createTextNode(myObj[i].whours);
            var available=document.createTextNode('available');
            let row=document.createElement('tr');
            let tduN=document.createElement('td');
            tduN.appendChild(userName);
            row.appendChild(tduN);
            let tdfN=document.createElement('td');
            tdfN.appendChild(firstName);
            row.appendChild(tdfN);
            let tdlN=document.createElement('td');
            tdlN.appendChild(lastName);
            row.appendChild(tdlN);
            let tdwH=document.createElement('td');
            tdwH.appendChild(whours);
            row.appendChild(tdwH);
            let tdaV=document.createElement('td');
            tdaV.appendChild(available);
            row.appendChild(tdaV);
            var tdButton=document.createElement("td");
            tdButton.innerHTML=`<button onclick="assignNurses(${myObj[i].username})" id='${myObj[i].username}' value='${myObj[i].username}'>Assign</button>`;
            row.appendChild(tdButton);
            tableNur.appendChild(row);
              } 
        
        }   
}
reqNurLoc.open("GET","loadNursedata.php?city="+city+"&hid=-1", true);
reqNurLoc.send(); 

}


function assignNurses(id){//this function will call the function that update the nurses's hid to be equal to the manager's which indicate that they are now operating at the hospital
    console.log(id);
    let username=id.value;//the value that we get from the button when clicked 
    insertHistory(username);
    updateNurse(username);


}

function insertHistory(username){
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        }
    }
    xhttp.open("POST", "insertNurseHistory.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(`username=${username}`);
}

function updateNurse(username){//this function is used for updating the user and then preview this user to the table of users that are in the hosp as manager
    let xhttp = new XMLHttpRequest();

    console.log(username);
    xhttp.open("POST", "updateNurse.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send(`username=${username}`);

    document.querySelector("#nursedata").innerHTML='';
    document.querySelector("#nursedata1").innerHTML='';
    document.querySelector("#nurseHistory").innerHTML='';
    loadNurseData();
    loadNurseOperating();
    loadNursesHistory();
     
}

function loadNurseOperating(){
    let xhttp = new XMLHttpRequest();
    let tableNur= document.querySelector("#nursedata1");
    let hid=document.getElementById("managerHid").value;
    let city=document.getElementById("managerCity").value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let myObj = JSON.parse(this.responseText);
            for(var i=0; i<myObj.length; i++){
                var userName=document.createTextNode(myObj[i].username);
                var firstName=document.createTextNode(myObj[i].fname);
                var lastName=document.createTextNode(myObj[i].lname);
                var whours=document.createTextNode(myObj[i].whours);
                let row=document.createElement('tr');
                let tduN=document.createElement('td');
                tduN.appendChild(userName);
                row.appendChild(tduN);
                let tdfN=document.createElement('td');
                tdfN.appendChild(firstName);
                row.appendChild(tdfN);
                let tdlN=document.createElement('td');
                tdlN.appendChild(lastName);
                row.appendChild(tdlN);
                let tdwH=document.createElement('td');
                tdwH.appendChild(whours);
                row.appendChild(tdwH);
                var tdButton=document.createElement("td");
                tdButton.innerHTML=`<button onclick="dismiss(${myObj[i].username})" id='${myObj[i].username}' value='${myObj[i].username}' >Dismiss</button>`;
                row.appendChild(tdButton);
                tableNur.appendChild(row);
            } 
            
        }
    
    }
/*             */
            xhttp.open("GET","loadNursedata.php?city="+city+"&hid="+hid, true);
            xhttp.send(); 

    }

function loadNursesHistory(){
    let xhttp = new XMLHttpRequest();
    let tableNur= document.querySelector("#nurseHistory");
    let hid=document.getElementById("managerHid").value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let myObj = JSON.parse(this.responseText);
            for(var i=0; i<myObj.length; i++){
                var userName=document.createTextNode(myObj[i].username);
                var firstName=document.createTextNode(myObj[i].fname);
                var lastName=document.createTextNode(myObj[i].lname);
                var city=document.createTextNode(myObj[i].city);
                let row=document.createElement('tr');
                let tduN=document.createElement('td');
                tduN.appendChild(userName);
                row.appendChild(tduN);
                let tdfN=document.createElement('td');
                tdfN.appendChild(firstName);
                row.appendChild(tdfN);
                let tdlN=document.createElement('td');
                tdlN.appendChild(lastName);
                row.appendChild(tdlN);
                let tdCt=document.createElement('td');
                tdCt.appendChild(city);
                row.appendChild(tdCt);
                tableNur.appendChild(row);
            } 
            
        }
    
    }
/*             */
            xhttp.open("GET","loadNurseHistory.php?hid="+hid, true);
            xhttp.send(); 
}

function dismiss(id){//this function is used when the manager dismiss the user
    console.log(id);
        let username=id.value;//the value that we get from the button when clicked 
        let xhttp = new XMLHttpRequest();

        xhttp.open("POST", "dismissNurse.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(`username=${username}`);

        document.querySelector("#nursedata").innerHTML='';
        document.querySelector("#nursedata1").innerHTML='';
        loadNurseData();
        loadNurseOperating();
    }



    function loadNursesCity(){//this function is called when the user changes the on the select option
        let city=document.querySelector("#ct1");
        city=city.value;
        console.log(city);
        document.querySelector("#nursedata").innerHTML='';
        let tableNur= document.querySelector("#nursedata");

        let reqNurLoc= new XMLHttpRequest();
        reqNurLoc.onreadystatechange=function(){
    if (this.readyState == 4 && this.status == 200) {
        let myObj = JSON.parse(this.responseText);
        console.log(myObj);

        for(var i=0; i<myObj.length; i++){
            var userName=document.createTextNode(myObj[i].username);
            var firstName=document.createTextNode(myObj[i].fname);
            var lastName=document.createTextNode(myObj[i].lname);
            var whours=document.createTextNode(myObj[i].whours);
            var available=document.createTextNode('available');
            let row=document.createElement('tr');
            let tduN=document.createElement('td');
            tduN.appendChild(userName);
            row.appendChild(tduN);
            let tdfN=document.createElement('td');
            tdfN.appendChild(firstName);
            row.appendChild(tdfN);
            let tdlN=document.createElement('td');
            tdlN.appendChild(lastName);
            row.appendChild(tdlN);
            let tdwH=document.createElement('td');
            tdwH.appendChild(whours);
            row.appendChild(tdwH);
            let tdaV=document.createElement('td');
            tdaV.appendChild(available);
            row.appendChild(tdaV);
            var tdButton=document.createElement("td");
            tdButton.innerHTML=`<button onclick="assignNurses()" id='assignedNurses' value='${myObj[i].username}'>Assign</button>`;
            row.appendChild(tdButton);
            tableNur.appendChild(row);
              } 
        
        }   
}
reqNurLoc.open("GET","loadNursedata.php?city="+city+"&hid=-1", true);
reqNurLoc.send(); 
    }







function insertUserData(){
    alert("hiiii");
    let xhttp= new XMLHttpRequest();
    let CT=document.getElementById("ct").value;
    let fn= document.querySelector("#fn").value;
    let ln= document.querySelector("#ln").value;
    let un= document.querySelector("#un").value;
    let pw= document.querySelector("#pw").value;
    let rp= document.querySelector("#rp").value;
    let bd= document.querySelector("#bd").value;
    let role=document.getElementsByName('role');
    let hid=document.querySelector('.hid').value;
    if(role[0].checked)role=role[0].value;
        else role=role[1].value;

        if(role==='3' && hid===""){
            hid='-1';
        }
     
        console.log(hid);
        if(role==='2' && hid===""){
            let alert=document.querySelector(".alert");
            alert.style.color="red";
            alert.innerHTML="Please choose a hospital for the manager.";
        }

        let gender= document.getElementsByName('gender');

         if (gender[0].checked)gender=gender[0].value;
         else gender=gender[1].value;
         
         if(fn==""||ln==""||un==""||pw==""||rp==""||bd==""){
            let alert=document.querySelector(".alert");
            alert.style.color="red";
            alert.innerHTML="Please fill all the information needed.";

         }else if(pw != rp){
            let alert=document.querySelector(".alert");
            alert.style.color="red";
            alert.innerHTML="Two password should be identical.";
         }else{
            let xhttp= new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                    let resp = this.responseText;
                    if(resp==="success!"){
                    let success=document.querySelector("#success");         
                    success.innerHTML= resp;
                    success.style.color="green";
                }
                else{
                    let error =document.querySelector("#error");
                    error.style.color="red";
                    error.innerHTML=resp;
                }
                
            }
            
          } 
    
        xhttp.open("POST","insertdata.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fn="+fn+"&ln="+ln+"&un="+un+"&pw="+pw+"&bd="+bd+"&ct="+CT+"&role="+role+"&sex="+gender+"&hid="+hid);
        
         }

    }




    function insertHosp(){
        alert("hiiii");
        let xhttp= new XMLHttpRequest();
        let hn=document.querySelector("#hn").value;
    
        let ct= document.querySelector("#ct").value;
     

        
         if(hn==""||ct==""){
            let alert=document.querySelector("#alert");
            alert.style.color="red";
            alert.innerHTML="Please fill all the information needed.";

         }
         else{
             xhttp.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                    let resp = this.responseText;
                    if(resp==="success!"){
                    let success=document.querySelector("#success");         
                    success.style.color="green";
                    success.innerHTML= resp;
                }
                else{
                    let error =document.querySelector("#alert");
                    error.style.color="red";
                    error.innerHTML=this.responseText;
                
                }
               }
              } 
    
    
        xhttp.open("POST","insertHosp.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("hn="+hn+"&ct="+ct);
            }
         }
    

         function getUploadImageUrl(input) {

            if (input.files && input.files[0]) {
              var reader = new FileReader();
          
              reader.onload = function (e) {
                document.getElementById('proImag').setAttribute('src', e.target.result);
              };
          
              reader.readAsDataURL(input.files[0]);
            }
          }

      