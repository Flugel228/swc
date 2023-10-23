import * as VueRouter from 'vue-router';

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('@/views/user/Login.vue'),
            name: 'login',
        },
        {
            path: '/register',
            component: () => import('@/views/user/Register.vue'),
            name: 'register',
        },
        {
            path:'/events',
            component: () => import('@/views/event/Index.vue'),
            name: 'events.index'
        }
    ]
});

router.beforeEach((to, from, next) => {
    const access_token = localStorage.getItem('access_token');
    if (access_token) {
        if (to.name === 'login' || to.name === 'register') {
            next({name: 'events.index'});
        }
    } else {
        if (
            to.name === 'events.index'
        ) {
            next({name: 'login'});
        }
    }
    next();
})

export default router;
