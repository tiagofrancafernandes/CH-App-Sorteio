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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-1" d="M19.386,15.2105l9-7A1,1,0,0,1,30,9V23a1,1,0,0,1-1.614.79l-9-7a1,1,0,0,1,0-1.5791Z" style="fill:currentColor"></path><rect class="cls-1" x="15" y="2" width="2" height="28" transform="translate(32 32) rotate(-180)" style="fill:currentColor"></rect><path class="cls-1" d="M13,16a1.001,1.001,0,0,1-.386.79l-9,7A1,1,0,0,1,2,23V9a1,1,0,0,1,1.614-.79l9,7A1.001,1.001,0,0,1,13,16ZM4,20.9556,10.3711,16,4,11.0444Z" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
