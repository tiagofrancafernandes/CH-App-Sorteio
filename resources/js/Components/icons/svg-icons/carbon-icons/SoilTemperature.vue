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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="5" cy="13" r="1"></circle><circle cx="11" cy="19" r="1"></circle><circle cx="15" cy="25" r="1"></circle><circle cx="17" cy="15" r="1"></circle><circle cx="13" cy="11" r="1"></circle><circle cx="9" cy="27" r="1"></circle><circle cx="3" cy="21" r="1"></circle><path d="M25,30a4.9863,4.9863,0,0,1-3-8.98V15a3,3,0,0,1,6,0v6.02A4.9863,4.9863,0,0,1,25,30Zm0-16a1.0011,1.0011,0,0,0-1,1v7.13l-.4971.2893A2.9676,2.9676,0,0,0,22,25a3,3,0,0,0,6,0,2.9676,2.9676,0,0,0-1.5029-2.5811L26,22.13V15A1.0011,1.0011,0,0,0,25,14Z" transform="translate(0 0)"></path><rect x="2" y="6" width="28" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
