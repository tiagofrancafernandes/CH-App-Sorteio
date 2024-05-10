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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m15,24c-3.8594,0-7-3.1401-7-7s3.1406-7,7-7,7,3.1401,7,7-3.1406,7-7,7Zm0-12c-2.7568,0-5,2.2432-5,5s2.2432,5,5,5,5-2.2432,5-5-2.2432-5-5-5Z"></path><path d="m30,13h-2V4h-9v-2h9c1.1025,0,2,.897,2,2v9Z"></path><path d="m15,30c-7.168,0-13-5.8315-13-13S7.832,4,15,4v2c-6.0654,0-11,4.9346-11,11s4.9346,11,11,11,11-4.9346,11-11v-1h2v1c0,7.1685-5.832,13-13,13Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
