import { createRouter, createWebHashHistory } from "vue-router";

import HomePage from "../components/Home.vue";

import DetailMemoire from "../components/DetailMemoire.vue";
import EditItem from '../components/Edit.vue';
import AboutPage from '../components/about.vue';
import UsersPage from '../components/users.vue';
import loginComponent from '../components/login.vue';
import registerComponent from '../components/register.vue';
import contactusComponent from '../components/ContactUs.vue'
import MemoireComponent from '../components/memoire.vue'
import AddDemandeDepotComponent from '../components/adddemandedepot.vue'
import AdminComponent from '../components/Admin/adminindex.vue'
import activityComponent from '../components/Admin/activity.vue'
import chartsComponent from '../components/Admin/charts.vue'
import emailComponent from '../components/Admin/email.vue'
import settingsComponent from '../components/Admin/settings.vue'
import usersComponent from '../components/Admin/users.vue'
import tableComponent from '../components/Admin/table.vue'
import profileComponent from '../components/Admin/profile.vue'
import demandedepotComponent from '../components/Admin/demandedepot.vue'
import demandeempruntComponent from '../components/Admin/demandeemprunt.vue'
import demandedepotdetailsComponent from '../components/Admin/demandedepotdetails.vue'
import demandeempruntdetailsComponent from '../components/Admin/demandeempruntdetails.vue'



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
    path: "/demandesdepot",
    name: "demandedepot",
    component: demandedepotComponent,
    meta: {
      title: 'demandesdepot'
    }
  },{
    path: "/demandesemprunt",
    name: "demandeemprunt",
    component: demandeempruntComponent,
    meta: {
      title: 'demandeemprunt'
    }
  },
  {
    path: "/email",
    name: "email",
    component: emailComponent,
    meta: {
      title: 'email'
    }
  },
  {
    path: "/settings",
    name: "settings",
    component: settingsComponent,
    meta: {
      title: 'settings'
    }
  },
  {
    path: "/charts",
    name: "charts",
    component: chartsComponent,
    meta: {
      title: 'charts'
    }
  },
  {
    path: "/etudiants",
    name: "etudiants",
    component: usersComponent,
    meta: {
      title: 'etudiants'
    }
  },
  {
    path: "/activity",
    name: "activity",
    component: activityComponent,
    meta: {
      title: 'activity'
    }
  },
  {
    path: "/table",
    name: "table",
    component: tableComponent,
    meta: {
      title: 'table'
    }
  },
  {
    path: "/profile/:id",
    name: "profile",
    component: profileComponent,
    meta: {
      title: 'profile'
    }
  },
  {
    path: "/Admin",
    name: "Admin",
    component: AdminComponent,
    meta: {
      title: 'Admin'
    }
  },
  {
    path: "/Register",
    name: "register",
    component: registerComponent,
    meta: {
      title: 'register'
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
    path: "/Demandedepot/:id",
    name: "Demandedepotdetails",
    component: demandedepotdetailsComponent,
    meta: {
      title: 'Demande Depot Details'
    }
  },{
    path: "/Demandeemprunt/:id/:c",
    name: "Demandeempruntdetails",
    component: demandeempruntdetailsComponent,
    meta: {
      title: 'Demande Emprunt Details'
    }
  },
   {
    path: "/memoire/details/:id/:c",
    name: "DetailMemoire",
    component: DetailMemoire,
    meta: {
      title: 'Memoire Details'
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
    path: "/adddemandedepot",
    name: "adddemandedepot",
    component: AddDemandeDepotComponent,
    meta: {
      title: 'Add new demande depot'
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