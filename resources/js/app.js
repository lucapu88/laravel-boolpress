/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
$(document).ready(function(){
  // var larghezzaMonitor = $(window).width();
  // if (larghezzaMonitor > 992) {
  var clock = setInterval(function(){ //apro la funzione che fa partire il mio timer
    $(".title h2").slideDown(1500); //appare il titolo nel centro della pagina sfumando in 2 secondi
  }, 1500)
  var clock = setInterval(function(){ //apro la funzione che fa partire il mio timer
    $(".title a").fadeIn(3000); //appare il titolo nel centro della pagina sfumando in 2 secondi
  }, 2500)
  $(".title h1").animate({marginLeft: "15%"}, 1500, 'linear'); //il nome del sottotitolo nell'header scorre verso destra
  // }
  var prevTop = $(window).scrollTop(); //imposto la posizione iniziale sulla posizione corrente sulla pagina
  $(window).on('scroll', function(e) { //quando vado a fare scroll con il mouse
    st = $(this).scrollTop(); //imposto la posizione di scorrimento
    //console.log(st);
    if (st > 300) { //se la posizione di scorrimento è maggiore a 300 (quindi quando faccio scroll in basso fino a 300px)
      $('.title').css('margin-top', '48%'); //il testo scende del 48%
    } else { //altrimenti (se faccio scroll in alto)
      $('.title').css('margin-top', '15%'); //il testo torna in posizione di partenza
    }
    prevTop = st; //la posizione iniziale sulla posizione corrente sulla pagina, diventa la posizione di scorrimento
  });
  $('.js-tilt').tilt({ //utilizzando la libreria tilt.js creo un effetto nella descrizione in info
    scale: 1.2
  })
});
