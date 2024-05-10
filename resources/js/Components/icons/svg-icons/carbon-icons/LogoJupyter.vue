<script setup>
import { computed } from 'vue';

const props = defineProps({
    size: {
        type: String,
        required: false,
    }
})

const allowedSizes = {
    default: '7',
    sm: '5',
    md: '7',
    lg: '16',
    xl: '32',
    xxl: '64',
}

const computedSize = computed(() => {
    if (!props?.size) {
        return allowedSizes.default;
    }

    if (!isNaN(parseInt(props?.size ?? null))) {
        let numVal = parseInt(props?.size ?? null);

        if (numVal < 0 || numVal > 100) {
            return allowedSizes.default;
        }

        return numVal;
    }

    if (props?.size in allowedSizes) {
        return allowedSizes[`${props?.size}`] ?? allowedSizes.default;
    }

    return allowedSizes.default;
})
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>logo--jupyter</title><g id="path"><g id="path16_fill" data-name="path16 fill"><path id="path7_fill" data-name="path7 fill" d="M26.0766,3.5878a1.69,1.69,0,1,1-1.76-1.5853,1.67,1.67,0,0,1,1.76,1.5853Z"></path></g></g><g id="path-2" data-name="path"><g id="path17_fill" data-name="path17 fill"><path id="path8_fill" data-name="path8 fill" d="M16.2191,23.1113c-4.4866,0-8.43-1.61-10.4688-3.9882a11.1618,11.1618,0,0,0,20.9377,0C24.6541,21.5011,20.7257,23.1113,16.2191,23.1113Z"></path></g></g><g id="path-3" data-name="path"><g id="path18_fill" data-name="path18 fill"><path id="path9_fill" data-name="path9 fill" d="M16.2191,7.6483c4.4867,0,8.43,1.61,10.4689,3.9881a11.1618,11.1618,0,0,0-20.9377,0C7.7892,9.2535,11.7126,7.6483,16.2191,7.6483Z"></path></g></g><g id="path-4" data-name="path"><g id="path19_fill" data-name="path19 fill"><path id="path10_fill" data-name="path10 fill" d="M10.0427,27.7388a2.1085,2.1085,0,1,1-.2031-.7976,2.1278,2.1278,0,0,1,.2031.7976Z"></path></g></g><g id="path-5" data-name="path"><g id="path20_fill" data-name="path20 fill"><path id="path11_fill" data-name="path11 fill" d="M6.26,7.1064A1.2263,1.2263,0,1,1,7.4517,5.83,1.2415,1.2415,0,0,1,6.26,7.1064Z"></path></g></g><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
