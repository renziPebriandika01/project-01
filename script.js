const button = document.querySelector('.btn')
const form   = document.querySelector('.form')
var keyword=document.getElementById('keyword')
var tabel= document.getElementById("tabel")
var cari= document.getElementById( "cari")

button.addEventListener('click', function() {
   form.classList.add('form--no') 
});

keyword.addEventListener('keyup',function() {
//buat object ajax
   var xhr = new XMLHttpRequest();

   // cek kesiapan ajax
   xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200){

      }
   }

});