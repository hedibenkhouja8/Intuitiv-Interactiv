import { createRouter, createWebHashHistory } from "vue-router";

import HomePage from "../components/Home.vue";
import EditItem from '../components/Edit.vue';
import AboutPage from '../components/about.vue';
import UsersPage from '../components/users.vue';
import loginComponent from '../components/login.vue';
import contactusComponent from '../components/ContactUs.vue'
import MemoireComponent from '../components/memoire.vue'
const routes = [
  {
    path: "/",
    name: "Home",
    component: HomePage,
    meta: {
      title: 'home'
    }
  },
  {
    path: "/edit/:id",
    name: "Edit",
    component: EditItem,
    meta: {
      title: 'edit'
    }
  },
  {
    path: "/about",
    name: "about",
    component: AboutPage,
    meta: {
      title: 'About'
    }
  },
  {
    path: "/memoire",
    name: "memoire",
    component: MemoireComponent,
    meta: {
      title: 'Memoire'
    }
  },
  {
    path: "/login",
    name: "login",
    component: loginComponent,
    meta: {
      title: 'Login'
    }
  },{
    path: "/contactus",
    name: "contactus",
    component: contactusComponent,
    meta: {
      title: 'contactus'
    }
  },
  {
    path: "/users",
    name: "users",
    component: UsersPage,
    meta: {
      title: 'users'
    }
  }
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

router.afterEach((to, from) => {
  console.log(from, to);
  document.title = to.meta.title;
})

export default router; 