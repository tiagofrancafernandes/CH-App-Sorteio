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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon class="cls-2" points="15 24 15 22 11.4 22 22 11.4 22 15 24 15 24 8 17 8 17 10 20.6 10 10 20.6 10 17 8 17 8 24 15 24" style="stroke-width: 0px"></polygon><path class="cls-2" d="m25,20v2h3c1.1,0,2-.9,2-2v-3h-2v3h-3Z" style="stroke-width: 0px"></path><rect class="cls-2" x="28" y="10" width="2" height="4" style="stroke-width: 0px"></rect><path class="cls-2" d="m25,2v2h3v3h2v-3c0-1.1-.9-2-2-2h-3Z" style="stroke-width: 0px"></path><rect class="cls-2" x="18" y="2" width="4" height="2" style="stroke-width: 0px"></rect><path class="cls-2" d="m10,4v3h2v-3h3V2h-3c-1.1,0-2,.9-2,2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m12,10H4c-1.1,0-2,.9-2,2v16c0,1.1.9,2,2,2h16c1.1,0,2-.9,2-2v-8h-2v8H4V12h8v-2Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
