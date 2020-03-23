require('./bootstrap');

window.Vue = require('vue');

Vue.component('calendar', require('./components/Calendar.vue').default);
Vue.component('event-form', require('./components/EventForm.vue').default);
Vue.component('event-list', require('./components/EventList.vue').default);

const app = new Vue({
	el: '#app'
});