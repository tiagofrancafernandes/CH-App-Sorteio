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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>snowflake</title><path d="M21.4148,12H28V10H23.4148l4.5857-4.5854L26.5864,4,22,8.5869V4H20v6.5869L18.5867,12H17V8H15v4H13.4133L12,10.5869V4H10V8.5869L5.4136,4,4,5.4146,8.5852,10H4v2h6.5852L12,13.415V15H8v2h4v1.5869L10.5867,20H4v2H8.5867L4,26.5864l1.4141,1.4141L10,23.415V28h2V21.415L13.4148,20H15v4h2V20h1.5852L20,21.415V28h2V23.415l4.5854,4.5855L28,26.5864,23.4133,22H28V20H21.4133L20,18.5869V17h4V15H20V13.415ZM18,18H14V14h4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
