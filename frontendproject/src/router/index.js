import { createRouter, createWebHashHistory } from "vue-router";

import HomePage from "../components/Home.vue";
import EditItem from '../components/Edit.vue';
import AboutPage from '../components/users.vue';
import UsersPage from '../components/about.vue';


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
    path: "/edit",
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