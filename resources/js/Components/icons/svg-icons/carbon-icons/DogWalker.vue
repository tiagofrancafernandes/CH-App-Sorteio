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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="20" y="20" width="2" height="10"></rect><rect x="4" y="23" width="2" height="7"></rect><path d="M16,30H14V26a1.0011,1.0011,0,0,0-1-1H11v5H9V23h4a3.0033,3.0033,0,0,1,3,3Z" transform="translate(0 0)"></path><path d="M7.5,22A3.5041,3.5041,0,0,1,4,18.5V17H2V15H6v3.5a1.5,1.5,0,0,0,3,0V15h4v2H11v1.5A3.5041,3.5041,0,0,1,7.5,22Z" transform="translate(0 0)"></path><path d="M27,10H21.354a2.9861,2.9861,0,0,0-2.7856,1.8857l-1.4419,3.6055-3.6079,4.51,1.562,1.249,3.7-4.625,1.645-3.9961A.9949.9949,0,0,1,21.354,12H27a1.0009,1.0009,0,0,1,1,1v7H25V30h2V22h1a2.0023,2.0023,0,0,0,2-2V13A3.0033,3.0033,0,0,0,27,10Z" transform="translate(0 0)"></path><path d="M24,9a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,24,9Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,24,3Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
