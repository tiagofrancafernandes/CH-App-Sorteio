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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M22,28H12V26H22V10H6V20H4V10A2.0021,2.0021,0,0,1,6,8H22a2.0021,2.0021,0,0,1,2,2V26A2.0021,2.0021,0,0,1,22,28Z" transform="translate(0 0)"></path><path d="M28,22H26V20h2V4H12V6H10V4a2.0021,2.0021,0,0,1,2-2H28a2.0021,2.0021,0,0,1,2,2V20A2.0021,2.0021,0,0,1,28,22Z" transform="translate(0 0)"></path><polygon points="10 14 10 16 14.586 16 3 27.586 4.414 29 16 17.414 16 22 18 22 18 14 10 14"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
