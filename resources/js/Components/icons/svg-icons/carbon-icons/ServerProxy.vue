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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M6,30H26a2,2,0,0,0,2-2V22a2,2,0,0,0-2-2H6a2,2,0,0,0-2,2v6A2,2,0,0,0,6,30Zm0-8H26v6H6Z" transform="translate(0 0)"></path><circle cx="9" cy="25" r="1"></circle><path d="M26,2,24.59,3.41,27.17,6H22.315A6.9835,6.9835,0,0,0,9.08,10H4.83L7.41,7.41,6,6,1,11l5,5,1.41-1.41L4.83,12H9.685A6.9835,6.9835,0,0,0,22.92,8h4.25l-2.58,2.59L26,12l5-5ZM21,9a4.983,4.983,0,0,1-8.9745,3H16V10H11.1011a4.9852,4.9852,0,0,1,8.8734-4H16V8h4.8989A5.0019,5.0019,0,0,1,21,9Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
