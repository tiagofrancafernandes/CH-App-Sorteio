import './bootstrap';
import '../css/app.css';
import './assets/css/satoshi.css'
import './assets/css/style.css'
import 'jsvectormap/dist/css/jsvectormap.min.css'
import 'flatpickr/dist/flatpickr.min.css'

import GlobalComponentsAndMethods from '@/extra/plugins/GlobalComponentsAndMethods';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createPinia } from 'pinia'
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { Link } from '@inertiajs/vue3';
import VueApexCharts from 'vue3-apexcharts'
import AppExtra from '@/extra/plugins/AppExtra';

import * as ObjectHelpers from '@/Helpers/object/object-helpers';
import * as StringHelper from '@/Helpers/string/index';
import * as StringHelpers from '@/Libs/Helpers/StringHelpers';
import * as DataHelpers from '@/Libs/Helpers/DataHelpers';
import * as TypesHelper from '@/Helpers/types/index';

globalThis.StringHelper = StringHelper;
globalThis.ObjectHelpers = ObjectHelpers;
globalThis.StringHelpers = StringHelpers;
globalThis.DataHelpers = DataHelpers;
globalThis.TypesHelper = TypesHelper;

let toMap = {
    ...StringHelper,
    ...ObjectHelpers,
    ...StringHelpers,
    ...TypesHelper,
    ...DataHelpers,
};

for (let item of Object.entries(toMap)) {
    let [key, value] = item;
    if (key in window) {
        key = `_${key}`;
    }

    window[key] = value;
}

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(AppExtra)
            .use(GlobalComponentsAndMethods)
            .use(createPinia())
            .use(VueApexCharts)
            .use(ZiggyVue)
            .component('Link', Link)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
