


function loadData(){
    let selectoption =document.querySelector("#ct");
    let xhttp= new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let myObj = JSON.parse(this.response);
            for (i in myObj){
                let option= document.createElement("option");
                option.innerText=myObj[i].city;
                selectoption.appendChild(option);
            }

        }
      };

    xhttp.open("POST","loaddata.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    }



    function insertData(){

        let selectoption =document.querySelector("#ct");
        let xhttp= new XMLHttpRequest();
        let fn= document.querySelector("#fn").value;
        let ln= document.querySelector("#ln").value;
        let un= document.querySelector("#un").value;
        let pw= document.querySelector("#pw").value;
        let rp= document.querySelector("#rp").value;
        let bd= document.querySelector("#bd").value;
        let ct= document.querySelector("#ct").value;
        let gender= document.getElementsByName('gender');
        for (i in gender){
            if (gender[i].checked){
                gender=gender.value;
            }
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let resp = JSON.parse(this.response);
                let success=document.querySelector("#success");
                    success.innerHTML= resp;
                    success.style.color="green";
                    window.location.href = "profileadmin.php";
            }
          };
    
        xhttp.open("POST","insertdata.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("fn="+fn+"&ln="+ln+"&un="+un+"&pw="+pw+"&bd="+bd+"&ct="+ct+"&role=1"+"&sex="+gender);
        
    }