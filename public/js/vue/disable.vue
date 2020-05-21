let phone = new Vue({
el:'#phone_div',
data:{
fam : ''

},
methods:{
noLetters : function(evt){
var regex = new RegExp("[0-9]");
var key = String.fromCharCode(!evt.charCode ? evt.which : evt.charCode);
if(!regex.test(key)) {
event.preventDefault();
return false;
}
}
}
});

