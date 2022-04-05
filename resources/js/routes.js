import Vue from 'vue'
import VueRouter from 'vue-router'
// Importo i componenti
import HomePage from './components/pages/HomePage'
import ContactsPage from './components/pages/ContactsPage'
import PostDetailPage from './components/pages/PostDetailPage'
import NotFoundPage from './components/pages/NotFoundPage'

// Dico a Vue di usare VueRouter
Vue.use(VueRouter);

// Inizializzo VueRouter
const router = new VueRouter({
	mode: 'history',
	linkExactActiveClass: 'active',
	routes: [
		{ path: '/', component: HomePage },
		{ path: '/home', component: HomePage, name: 'Home' },
		{ path: '/contacts', component: ContactsPage, name: 'Contacts' },
		{ path: '/posts/:id', component: PostDetailPage, name: 'PostDetailPage' },

		// Route di errore
		{ path: '*', component: NotFoundPage },
	]
});

export default router;