
function loadData(){
    let ct =document.querySelector("#ct");
    let xhttp= new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let myObj = JSON.parse(this.response);
            console.log(myObj);
            for (i in myObj){
                let option= document.createElement("option");
                option.setAttribute("value",myObj[i].city);
                option.innerText=myObj[i].city;
                ct.appendChild(option);
            }

        }
      };

    xhttp.open("POST","loaddata.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    }



    function insertAdminData(){
        
        let xhttp= new XMLHttpRequest();
        let CT=document.getElementById("ct").value;
        let fn= document.querySelector("#fn").value;
        let ln= document.querySelector("#ln").value;
        let un= document.querySelector("#un").value;
        let pw= document.querySelector("#pw").value;
        let rp= document.querySelector("#rp").value;
        let bd= document.querySelector("#bd").value;
        let hid=document.querySelector('.hid').value;
        let role=document.querySelector('.role').value;

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



