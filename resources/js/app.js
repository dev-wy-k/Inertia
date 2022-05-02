import './bootstrap'
import Vue from 'vue'
import { createInertiaApp, InertiaLink } from '@inertiajs/inertia-vue'
Vue.component('Link', InertiaLink)

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        Vue.use(plugin)

        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})