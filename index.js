function sendMail(){
    var params ={
        name:document.getElementById("name").value,
        email:document.getElementById("email").value,
        subject:document.getElementById("subject").value,
    };


const serviceID = "service_2cw5quk";
const templateID = "template_17aizof"

emailjs.send(serviceID,templateID,params)
.then(
    res=>{
    document.getElementById("name").value = "";
    document.getElementById("email").value = "";
    document.getElementById("subject").value = "";
    console.log(res);
    alert("Your Message Sent Successfully");
    }
)
.catch((err)=>console.log(err));
}