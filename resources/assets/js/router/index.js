import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter);

export default new VueRouter({
    saveScrollPosition: true,
    routes: [
        {
            path: '/',
            component: resolve => void(require(['../components/searchComponent.vue'], resolve))
        },
        {
            path: '/change',
            component: resolve => void(require(['../components/changeComponent.vue'], resolve))
        },
        {
            path: '/delete',
            component: resolve => void(require(['../components/deleteComponent.vue'], resolve))
        },

    ]
})