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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M17.8281,22.0684l1.7937-1.7476A4.2185,4.2185,0,0,0,22.91,21.9534c1.4025,0,2-.5288,2-1.38,0-.69-.4138-1.1267-1.4716-1.2646l-1.1958-.1612c-2.5755-.3217-4.001-1.4484-4.001-3.633,0-2.3225,1.8166-3.7942,4.553-3.7942a5.722,5.722,0,0,1,4.6909,1.8855l-1.7246,1.7246a3.9643,3.9643,0,0,0-2.8743-1.2876c-1.2649,0-1.8166.5059-1.8166,1.2417,0,.8049.4367,1.1726,1.5637,1.3567l1.2187.1609c2.6214.3679,3.886,1.5408,3.886,3.5413,0,2.3225-1.9546,3.9321-4.9438,3.9321A6.0944,6.0944,0,0,1,17.8281,22.0684Z"></path><path d="M5.2471,24V7.95H15.825v2.69H8.2825v3.8862h6.6687v2.6905H8.2825V21.31H15.825V24Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
