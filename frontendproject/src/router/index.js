import { createRouter, createWebHashHistory } from "vue-router";

import HomePage from "../components/Home.vue";
import DetailMemoire from "../components/DetailMemoire.vue";
import DetailEncadreurComponent from "../components/DetailEncadreur.vue";
import EditItem from '../components/Edit.vue';
import AboutPage from '../components/about.vue';
import encadreursComponent from '../components/encadreurs.vue';
import loginComponent from '../components/login.vue';
import myprofileComponent from '../components/myprofile.vue';
import mesempruntsComponent from '../components/mesemprunts.vue'
import fichierComponent from '../components/fichier.vue'
import historyprofileComponent from '../components/historyprofile.vue'
import registerComponent from '../components/register.vue';
import contactusComponent from '../components/ContactUs.vue'
import MemoireComponent from '../components/memoire.vue'
import AddDemandeDepotComponent from '../components/adddemandedepot.vue'
import mesdemandesComponent from '../components/mesdemandes.vue'


import AdminComponent from '../components/Admin/adminindex.vue'
import activityComponent from '../components/Admin/activity.vue'
import chartsComponent from '../components/Admin/charts.vue'
import emailComponent from '../components/Admin/email.vue'
import settingsComponent from '../components/Admin/settings.vue'
import usersComponent from '../components/Admin/users.vue'
import etabetencadComponent from '../components/Admin/etabetencad.vue'
import profileComponent from '../components/Admin/profile.vue'
import demandedepotComponent from '../components/Admin/demandedepot.vue'
import demandeempruntComponent from '../components/Admin/demandeemprunt.vue'
import historiqueempruntComponent from '../components/Admin/historique.vue'
import demandedepotdetailsComponent from '../components/Admin/demandedepotdetails.vue'
import demandeempruntdetailsComponent from '../components/Admin/demandeempruntdetails.vue'
import memoireadminComponent from '../components/Admin/memoireadmin.vue'
import memoireadmindetailComponent from '../components/Admin/memoireadmindetail.vue'
import etudiantsenattenteComponent from '../components/Admin/etudiantsenattente.vue'
import domainecritereComponent from '../components/Admin/domainecritere.vue'
import archiveComponent from '../components/Admin/archive.vue'




const routes = [
  {
    path: "/",
    name: "Home",
    component: HomePage,
    meta: {
      title: 'home',
      needsetudiant :true
    }
  },
  {
    path: "/demandesdepot",
    name: "demandedepot",
    component: demandedepotComponent,
    meta: {
      title: 'demandesdepot',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/historyprofile",
    name: "historyprofile",
    component: historyprofileComponent,
    meta: {
      title: 'History',
      needsAuth : true,
      needsetudiant :true
    }
  }, {
    path: "/fichier/:fichierpdf",
    name: "fichier",
    component: fichierComponent,
    meta: {
      title: 'fichier',
      needsAuth : true,
      needsetudiant :true
    }
  },
  {
    path: "/archive",
    name: "archive",
    component: archiveComponent,
    meta: {
      title: 'archive',
      needsAuth : true,
      needsAdmin :true
    }
  }, {
    path: "/etudiantsenattente",
    name: "etudiantsenattente",
    component: etudiantsenattenteComponent,
    meta: {
      title: 'Etudiants En Attente',
      needsAuth : true,
      needsAdmin :true
    }
  }, {
    path: "/domainecritere",
    name: "domainecritere",
    component: domainecritereComponent,
    meta: {
      title: 'Domaines Et Critere',
      needsAuth : true,
      needsAdmin :true
    }
  }, {
    path: "/mesemprunts",
    name: "mesemprunts",
    component: mesempruntsComponent,
    meta: {
      title: 'Mes Emprunts',
      needsAuth : true,
      needsetudiant :true
    }
  },
  {
    path: "/memoireadmin",
    name: "memoireadmin",
    component: memoireadminComponent,
    meta: {
      title: 'Memoires',
      needsAuth : true,
      needsAdmin :true
    }
  },{
    path: "/memoireadmindetail/:id/:c",
    name: "memoireadmindetail",
    component: memoireadmindetailComponent,
    meta: {
      title: ' Detail Memoire',
      needsAuth : true,
      needsAdmin :true
    }
  },{
    path: "/demandesemprunt",
    name: "demandeemprunt",
    component: demandeempruntComponent,
    meta: {
      title: 'demandeemprunt',
      needsAuth : true,
      needsAdmin :true
    }
  },{
    path: "/historiquesemprunt",
    name: "historiqueemprunt",
    component: historiqueempruntComponent,
    meta: {
      title: 'Historique demprunts',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/email",
    name: "email",
    component: emailComponent,
    meta: {
      title: 'email',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/settings",
    name: "settings",
    component: settingsComponent,
    meta: {
      title: 'settings',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/charts",
    name: "charts",
    component: chartsComponent,
    meta: {
      title: 'charts',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/etudiants",
    name: "etudiants",
    component: usersComponent,
    meta: {
      title: 'etudiants',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/activity",
    name: "activity",
    component: activityComponent,
    meta: {
      title: 'activity',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/etabetencad",
    name: "etabetencad",
    component: etabetencadComponent,
    meta: {
      title: 'Etablissements et encareurs',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/profile/:id",
    name: "profile",
    component: profileComponent,
    meta: {
      title: 'profile',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/myprofile/:id",
    name: "myprofile",
    component: myprofileComponent,
    meta: {
      title: 'profile',
      needsAuth : true,
      needsetudiant :true
    }
  },
  {
    path: "/Admin",
    name: "Admin",
    component: AdminComponent,
    meta: {
      title: 'Admin',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
    path: "/Register",
    name: "register",
    component: registerComponent,
    meta: {
      title: 'register',
      needslogout :true
    
    }
  },
  {
    path: "/edit/:id",
    name: "Edit",
    component: EditItem,
    meta: {
      title: 'edit',
      needsAuth : true,
      needsetudiant :true
    }
  },
  {
    path: "/Demandedepot/:id",
    name: "Demandedepotdetails",
    component: demandedepotdetailsComponent,
    meta: {
      title: 'Demande Depot Details',
      needsAuth : true,
      needsAdmin :true
    }
  },{
    path: "/Demandeemprunt/:id/:c",
    name: "Demandeempruntdetails",
    component: demandeempruntdetailsComponent,
    meta: {
      title: 'Demande Emprunt Details',
      needsAuth : true,
      needsAdmin :true
    }
  },
  {
   path: "/memoire/details/:id/:c",
   name: "DetailMemoire",
   component: DetailMemoire,
   meta: {
     title: 'Memoire Details',
     needsetudiant :true
   }
 },
 {
  path: "/encadreur/details/:id",
  name: "DetailEncadreur",
  component: DetailEncadreurComponent,
  meta: {
    title: 'Details de l encadreur',
    needsetudiant :true
  }
},
  {
    path: "/about",
    name: "about",
    component: AboutPage,
    meta: {
      title: 'About',
      needsetudiant :true
    }
  },
  {
    path: "/adddemandedepot",
    name: "adddemandedepot",
    component: AddDemandeDepotComponent,
    meta: {
      title: 'Add new demande depot',
      needsAuth : true,
      needsetudiant :true
    }
  },
  {
    path: "/mesemprunts",
    name: "mesempruntsComponent",
    component: mesempruntsComponent,
    meta: {
      title: 'Mes Emprunts',
      needsAuth : true,
      needsetudiant :true
    }
  },
  {
    path: "/mesdemandes",
    name: "mesdemandes",
    component: mesdemandesComponent,
    meta: {
      title: 'Mes Demandes de depot',
      needsAuth : true,
      needsetudiant :true
    }
  },
  {
    path: "/memoire",
    name: "memoire",
    component: MemoireComponent,
    meta: {
      title: 'Memoire',
      needsetudiant :true
    }
  },
  {
    path: "/login",
    name: "login",
    component: loginComponent,
    meta: {
      title: 'Login',
      needslogout :true
    }
  },{
    path: "/contactus",
    name: "contactus",
    component: contactusComponent,
    meta: {
      title: 'contactus',
      needsetudiant :true
    }
  },
  {
    path: "/encadreurs",
    name: "encadreurs",
    component: encadreursComponent,
    meta: {
      title: 'Nos Encadreurs',
      needsetudiant :true
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



router.beforeEach((to,from,next) => {
const username= localStorage.getItem("name");
const role = localStorage.getItem("role");
var loggedin =false;
if (username !== null){
  loggedin=true;
       if(to.meta.needslogout){
         next('/');
       }
  
} else {
  loggedin=false;
}
  if(to.meta.needsAuth){
    if(loggedin){
      
       if(to.meta.needsAdmin){
        if(role == "admin"){
          next();
        }
        else{
          next("/Memoire");
        }
      }
       else if(to.meta.needsetudiant){
          if(role == "etudiant"){
            next();
          }
          else{
            next("/Admin");
          }
        }
      else{
        next();
      }   
    }else {
      next("/login");

    }
  } 
  else if(to.meta.needsetudiant){
    if(loggedin){
    if(role == "etudiant"){
      next();
    }
    else{
      next("/Admin");
    }
  }
  else{
    next();
  }
  }
  else{
    next();
  }
})
export default router; 