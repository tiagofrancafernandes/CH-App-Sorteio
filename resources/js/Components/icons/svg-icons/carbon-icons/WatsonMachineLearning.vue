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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>watson--machine-learning</title><path d="M22,26H20V17.76l-3.23,3.88a1,1,0,0,1-1.54,0L12,17.76V26H10V15a1,1,0,0,1,.66-.94,1,1,0,0,1,1.11.3L16,19.44l4.23-5.08a1,1,0,0,1,1.11-.3A1,1,0,0,1,22,15Z" transform="translate(0)"></path><path d="M4.16,14.65l-3-1.75a.76.76,0,1,0-.76,1.32L3.4,16a.76.76,0,1,0,.76-1.31Z" transform="translate(0)"></path><path d="M8.29,10.52a.73.73,0,0,0,1,.27.75.75,0,0,0,.28-1l-1.74-3a.76.76,0,1,0-1.32.76Z" transform="translate(0)"></path><path d="M16,9a.76.76,0,0,0,.76-.76V4.76a.76.76,0,1,0-1.52,0V8.25A.76.76,0,0,0,16,9Z" transform="translate(0)"></path><path d="M22.68,10.79a.75.75,0,0,0,.37.11.76.76,0,0,0,.66-.38l1.75-3a.76.76,0,0,0-1.32-.76l-1.74,3A.75.75,0,0,0,22.68,10.79Z" transform="translate(0)"></path><path d="M31.9,13.18a.76.76,0,0,0-1-.28l-3,1.75A.76.76,0,0,0,28.6,16l3-1.74A.77.77,0,0,0,31.9,13.18Z" transform="translate(0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
