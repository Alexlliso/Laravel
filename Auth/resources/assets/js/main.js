var Vue = require('vue');
var $ = require('jquery');

var vm = new Vue({
    el: '#email',
    data: {
        placeholder: "youremail@gmail.com",
        url:"http://auth.app/checkEmailExists"
    },
    methods: {
        /*sayHello: function () {
            alert("hola");
        },*/
        checkEmailExists: function () {
            var email = $('#email').value();
            console.debug("checkEmailExists EXECUTED!");
            console.debug("A punt de cridar:");
            console.debug(this.url);
            console.debug(email);
            var url = this.url + "email=" +  email;
            console.debug(url);

            $.ajax(url).done(function(data) {
                //Funciona bé
                console.debug(data);
                if(data == "true"){
                    //TODO email esta lliure DO NOTHING
                }else{
                    alert('email ocupat');
                }
            }).fail(function(data){
                //error
                alert("Estas que lo petas");
            }).always(function(data){
                //sempre
                console.debug("Xivato");
            });
        }
    }
});