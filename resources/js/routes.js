import VueRouter from "vue-router";

import UserCreate from './pages/users/Create'
import UserEdit from './pages/users/Edit'
import UserShow from './pages/users/Show'
import  UserIndex from './pages/users/Index'


const routes =  [
    {
        path: '/user',
        name: 'user',
        component: UserIndex,
    },
    {
        path: '/user/create',
        name: 'user.create',
        component: UserCreate
    },
    {
        path: '/user/edit/{user}',
        name: 'user.edit',
        component: UserEdit
    },
    {
        path: '/user/show/{user}',
        name: 'user.show',
        component: UserShow
    },
];


const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})
export default router
