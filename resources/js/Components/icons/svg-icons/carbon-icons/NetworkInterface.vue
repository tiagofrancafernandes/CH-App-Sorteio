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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m28,18h-2V6h-13v-2h13c1.1028,0,2,.8972,2,2v12Z"></path><path d="m18,28H6c-1.1028,0-2-.8972-2-2v-13h2v13h12v2Z"></path><path d="m26,21l-1.793,1.793-5.5076-5.5078c.187-.3911.3005-.8232.3005-1.2852,0-1.6543-1.3457-3-3-3-.4617,0-.894.1133-1.2852.3008l-5.2817-5.2817c.3513-.5947.5669-1.2793.5669-2.019,0-2.2056-1.7944-4-4-4S2,3.7944,2,6s1.7944,4,4,4c.7395,0,1.4241-.2153,2.019-.5669l5.2815,5.2817c-.187.3911-.3005.8232-.3005,1.2852,0,1.6543,1.3457,3,3,3,.4617,0,.894-.1133,1.2852-.3008l5.5078,5.5078-1.793,1.793,5,5,5-5-5-5ZM4,6c0-1.1025.8972-2,2-2s2,.8975,2,2-.8972,2-2,2-2-.8975-2-2Zm11,10c0-.5513.4485-1,1-1s1,.4487,1,1-.4485,1-1,1-1-.4487-1-1Zm8.8286,10l2.1714-2.1714,2.1714,2.1714-2.1714,2.1714-2.1714-2.1714Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
