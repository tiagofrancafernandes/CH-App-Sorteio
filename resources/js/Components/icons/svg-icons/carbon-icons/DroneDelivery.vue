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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M20,30H12V22h8Zm-6-2h4V24H14Z" transform="translate(0 0)"></path><polygon points="32 11 22 11 22 13 26 13 26 16 6 16 6 13 10 13 10 11 0 11 0 13 4 13 4 18 9.132 18 6 22.697 6 27 8 27 8 23.303 11.535 18 20.465 18 24 23.303 24 27 26 27 26 22.697 22.868 18 28 18 28 13 32 13 32 11"></polygon><path d="M16,6a5.9817,5.9817,0,0,0-4.2407,1.7593l1.4136,1.4136a3.9936,3.9936,0,0,1,5.6542,0l1.4136-1.4136A5.9814,5.9814,0,0,0,16,6Z" transform="translate(0 0)"></path><path d="M8.9324,4.9321l1.4133,1.4136a7.9877,7.9877,0,0,1,11.3086,0l1.4136-1.4136a9.9844,9.9844,0,0,0-14.1355,0Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
