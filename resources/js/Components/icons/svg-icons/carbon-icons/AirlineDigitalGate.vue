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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M18,23H16V21a3.0033,3.0033,0,0,0-3-3H9a3.0033,3.0033,0,0,0-3,3v2H4V21a5.0058,5.0058,0,0,1,5-5h4a5.0059,5.0059,0,0,1,5,5Z" transform="translate(0 0)"></path><path d="M11,6A3,3,0,1,1,8,9a3,3,0,0,1,3-3m0-2a5,5,0,1,0,5,5A5,5,0,0,0,11,4Z" transform="translate(0 0)"></path><rect x="2" y="26.0001" width="28" height="2"></rect><path d="M31.9658,11.7413a1.0007,1.0007,0,0,0-1.2246-.707l-3.0861.826L24,7l-1,.2676,1.4584,5.4483-2.7663.7405L20,11.2066l-1,.2676.9337,3.4883a.9993.9993,0,0,0,1.2246.707l10.1005-2.7036A1,1,0,0,0,31.9658,11.7413Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
