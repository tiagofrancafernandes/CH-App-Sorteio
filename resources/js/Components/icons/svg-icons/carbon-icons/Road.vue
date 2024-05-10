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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="13" y="13" width="6" height="2"></rect><path d="M25.4409,8,24.1687,3.45A2.009,2.009,0,0,0,22.2456,2H9.7544A2.0089,2.0089,0,0,0,7.8313,3.4507L6.5315,8H4v2H6v7a2.0025,2.0025,0,0,0,2,2v3h2V19H22v3h2V19a2.0025,2.0025,0,0,0,2-2V10h2V8ZM9.7544,4H22.2458l1.4285,5H8.3257ZM24,13H22v2h2v2H8V15h2V13H8V11H24Z" transform="translate(0 0)"></path><rect x="2" y="16" width="2" height="14"></rect><rect x="28" y="16" width="2" height="14"></rect><rect x="15" y="21" width="2" height="3"></rect><rect x="15" y="26" width="2" height="4"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
