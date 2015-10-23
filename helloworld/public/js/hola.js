/**
 * Created by balrog on 20/10/15.
 */
function hello(){
    console.info("hola mon");
}

function bye(){
    console.info("adeu mon");
}

/*$(function(){
    $('#helloworld').show();
});*/

function sayhello(){
    $('#helloworld').show();
}

//or

$(function(){
    $('#sayhello').click( function() {
        //console.debug("prova");
        //alert("HOLA");
        //$('#helloworld').show();
        $('#sayhello').click( sayhello())
    })
});