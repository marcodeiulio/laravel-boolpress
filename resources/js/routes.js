import Vue from 'vue'
import VueRouter from 'vue-router'
// Importo i componenti
import HomePage from './components/pages/HomePage'
import ContactsPage from './components/pages/ContactsPage'
import NotFoundPage from './components/pages/NotFoundPage'

// Dico a Vue di usare VueRouter
Vue.use(VueRouter);

// Inizializzo VueRouter
const router = new VueRouter({
	mode: 'history',
	routes: [
		{ path: '/', component: HomePage },
		{ path: '/home', component: HomePage, name: 'Home' },
		{ path: '/contacts', component: ContactsPage, name: 'Contacts' },

		// Route di errore
		{ path: '*', component: NotFoundPage },
	]
});

export default router;