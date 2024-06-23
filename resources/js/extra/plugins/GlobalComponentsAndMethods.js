import globalComponents from '@/global-components';
import * as ObjectHelpers from '@/Helpers/object/object-helpers';
import { sprintf } from 'sprintf-js';

const GlobalComponentsAndMethods = {
    install(app, options) {
        const methods = {
            // getWhere,
            sprintf,
        }

        app.mixin({
            methods: methods,
        });


        if (parseInt(app.version) > 2) {
            Object.entries(methods).forEach(item => {
                let [name, func] = item;

                app.provide(name, func);
            })
        }

        Object.entries(globalComponents).forEach(item => {
            let [componentName, component] = item;

            app.component(componentName, component);
        })
    },
};

export default GlobalComponentsAndMethods;
