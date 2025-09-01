import { createRouter, createWebHistory } from 'vue-router'
import CleanHomePage from './components/CleanHomePage.vue'
import Documentation from './components/Documentation.vue'
import About from './components/About.vue'
import PrivacyPolicy from './components/PrivacyPolicy.vue'
import TermsOfService from './components/TermsOfService.vue'
import CookiePolicy from './components/CookiePolicy.vue'
import WordPressPlugin from './components/WordPressPlugin.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: CleanHomePage
  },
  {
    path: '/wordpress',
    name: 'WordPressPlugin',
    component: WordPressPlugin
  },
  {
    path: '/docs',
    name: 'Documentation',
    component: Documentation
  },
  {
    path: '/about',
    name: 'About',
    component: About
  },
  {
    path: '/privacy',
    name: 'Privacy',
    component: PrivacyPolicy
  },
  {
    path: '/terms',
    name: 'Terms',
    component: TermsOfService
  },
  {
    path: '/cookies',
    name: 'Cookies',
    component: CookiePolicy
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
