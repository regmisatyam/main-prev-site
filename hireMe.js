function sendEmail() {
    var fullName = document.getElementById('fullName').value;
    var senderEmail = document.getElementById('senderEmail').value;
    var senderPhone = document.getElementById('senderPhone').value;
    var hireFor = document.getElementById('hireFor').value;
    var timeP = document.getElementById('timeP').value;

    var msgBody = "Name: " + fullName + "<br/> Phone: "  + senderPhone + "<br/> Email: "  + senderEmail + "<br/> Hire For: "  + hireFor + "<br/> Time: "  + timeP;

    Email.send({
        Host: "smtp.elasticemail.com",
        Username: "satyamregmi6@gmail.com",
        Password: "F8EDC2E27696B9E67F89026C3A43A0AEAF72",
        To: "satyamregmi6@gmail.com",
        From: senderEmail,
        Subject: "Hiring",
        Body: msgBody
    }).then(
        message => {
            if(message == 'OK'){
                swal("Success", "Message Send Successfully. You will recieve an email from us.", "success");
            }
            else{
                swal("Error", "Error sending message. Try again!", "error");
            }
        }
    );
}
