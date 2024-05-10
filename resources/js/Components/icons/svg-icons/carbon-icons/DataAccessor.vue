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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,20H26v2h2v6H4V22H6V20H4a2.0024,2.0024,0,0,0-2,2v6a2.0024,2.0024,0,0,0,2,2H28a2.0024,2.0024,0,0,0,2-2V22A2.0024,2.0024,0,0,0,28,20Z" transform="translate(0 0)"></path><circle cx="7" cy="25" r="1"></circle><path d="M21,13a2.9609,2.9609,0,0,0-1.2854.3008L17.4141,11l2.3-2.3008A2.9609,2.9609,0,0,0,21,9a3,3,0,1,0-3-3,2.9665,2.9665,0,0,0,.3,1.2852L16,9.5859,13.7,7.2852A2.9665,2.9665,0,0,0,14,6a3,3,0,1,0-3,3,2.9609,2.9609,0,0,0,1.2854-.3008L14.5859,11l-2.3005,2.3008A2.9609,2.9609,0,0,0,11,13a3,3,0,1,0,3,3,2.9665,2.9665,0,0,0-.3-1.2852L16,12.4141l2.3,2.3007A2.9665,2.9665,0,0,0,18,16a3,3,0,1,0,3-3Zm0-8a1,1,0,1,1-1,1A1.0009,1.0009,0,0,1,21,5ZM10,6a1,1,0,1,1,1,1A1.0009,1.0009,0,0,1,10,6Zm1,11a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,11,17Zm10,0a1,1,0,1,1,1-1A1.0009,1.0009,0,0,1,21,17Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
