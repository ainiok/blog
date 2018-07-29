import Dashboard from 'views/Dashboard'

export default [
    {
        path: '/dashboard',
        component: Dashboard,
        beforeEnter: requireAuth,
        children: [
            {
                path: '/',
                redirect: '/dashboard/home'
            },
            {
                path: 'home',
                component: resolve => require(['views/dashboard/Home.vue'], resolve)
            },
        ]
    }
]

function requireAuth(to, from, next) {
    if (window.User) {
        return next()
    } else {
        return next('/')
    }
}