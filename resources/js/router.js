import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Home.vue';
import About from './components/About.vue';
import Contact from './components/Contact.vue';
import Services from './components/Services.vue';
import MainLayout from './components/MainLayout.vue';
import AdminLayout from './components/Admin/AdminLayout.vue';
import AdminLogin from './components/Admin/Login.vue';
import NotFound from './components/NotFound.vue';
import AdminProfileLayout from './components/Admin/Profile/ProfileLayout.vue';
import AdminProfileUsers from './components/Admin/Profile/Users.vue';
import AdminProfileSettings from './components/Admin/Profile/Settings.vue';
import AdminAddUser from './components/Admin/Profile/AddAdmin.vue';
import AdminOurServices from './components/Admin/Profile/OurServices.vue';
import AdminOurServicesEdit from './components/Admin/Profile/OurServicesEdit.vue';
import AdminUserEdit from './components/Admin/Profile/UserEdit.vue';


const routes = [
  {
    path: '/admin',
    component: AdminLayout,
    children: [
      {
        path: '/admin',
        component: AdminLogin
      },
      {
        path: '/admin/profile',
        component: AdminProfileLayout,
        children: [
          {
            path: '/admin/profile',
            name: AdminProfileUsers,
            component: AdminProfileUsers,
          },
          {
            path: '/admin/profile/users',
            name: AdminProfileUsers,
            component: AdminProfileUsers
          },
          {
            path: '/admin/profile/settings',
            name: AdminProfileSettings,
            component: AdminProfileSettings
          },
          {
            path: '/admin/profile/add/user',
            name: AdminAddUser,
            component: AdminAddUser
          },
          {
            path: '/admin/profile/services',
            name: AdminOurServices,
            component: AdminOurServices
          },
          {
            path: '/admin/profile/services/:id(\\d+)',
            name: AdminOurServicesEdit,
            component: AdminOurServicesEdit,
          },
          {
            path: '/admin/profile/users/:id(\\d+)',
            name: AdminUserEdit,
            component: AdminUserEdit,
          },
        ]
      },
    ]
  },
  {
    path: '/',
    component: MainLayout,
    children: [
      {
        path: '/',
        component: Home
      },
      {
        path: '/about',
        component: About
      },
      {
        path: '/contact',
        component: Contact
      },
      {
        path: '/about',
        component: About
      },
      {
        path: '/services',
        component: Services
      }
    ]
  },
   {
    path: '/:catchAll(.*)',
    component: NotFound
  }
  
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
