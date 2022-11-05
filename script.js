    var btn = document.getElementById('btn__submit');
    btn.addEventListener('click', function(e) {
        e.preventDefault()
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var message = document.getElementById('message').value;
        var body = 'name: ' +name + '<br/> email: ' + email + '<br/> message: ' + message;

        function sendEmail() {
        email.send({
            Host : "smtp.gmail.com",
            Username : "jimmy27.gorecki01@gmail.com",
            Password : "bmlzozwybxjdegva",
            To : 'jimmy27.gorecki01@gmail.com',
            From : email,
            Subject : name,
            Body : body
        }).then(
        message => alert(message)
        );
    }
    })
