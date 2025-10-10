import '../css/app.css';

import { createInertiaApp, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';

//app layout
import DefaultLayout from './Layouts/DefaultLayout.vue';

//font awesome icons
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import './icons'



const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    resolve: async (name) => {
        const pages = import.meta.glob<DefineComponent>('./pages/**/*.vue')
        const page: any = await resolvePageComponent(`./pages/${name}.vue`, pages);

        const parts = name.split('/')
        if (parts[0] == 'Auth') {
            page.default.layout = null
        } else {
            page.default.layout = page.default.layout || DefaultLayout

        }
        return page

    },



    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("FontAwesomeIcon", FontAwesomeIcon)
            .component("Link", Link) 
            .component("router-link", Link)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
