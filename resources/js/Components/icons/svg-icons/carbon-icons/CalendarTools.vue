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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23.981,24.4333A3.9549,3.9549,0,0,0,26,25a4.0045,4.0045,0,0,0,4-4,3.9427,3.9427,0,0,0-.1492-1.0228l-2.4367,2.4369-.0005-.0005a1.9991,1.9991,0,1,1-2.8272-2.8272l-.0005-.0005,2.4368-2.4368A3.95,3.95,0,0,0,26,17a4.0045,4.0045,0,0,0-4,4,3.9544,3.9544,0,0,0,.5669,2.0191L17,28.586,18.4141,30Z" transform="translate(0 0)"></path><path class="cls-1" d="M26,4H22V2H20V4H12V2H10V4H6A2,2,0,0,0,4,6V26a2,2,0,0,0,2,2h8V26H6V6h4V8h2V6h8V8h2V6h4v8h2V6A2,2,0,0,0,26,4Z" transform="translate(0 0)" style="fill-rule: evenodd"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
