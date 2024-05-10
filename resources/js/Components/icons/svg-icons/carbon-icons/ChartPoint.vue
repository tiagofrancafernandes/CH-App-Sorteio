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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M30,30H4a2.0023,2.0023,0,0,1-2-2V2H4V28H30Z"></path><circle cx="9" cy="6" r="3"></circle><circle cx="9" cy="22" r="3"></circle><circle cx="18" cy="14" r="3"></circle><path d="M9,17a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,9,17Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,9,13Z"></path><circle cx="27" cy="6" r="3"></circle><circle cx="27" cy="22" r="3"></circle><path d="M27,17a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,27,17Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,27,13Z"></path><path d="M18,26a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,18,26Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,18,22Z"></path><path d="M18,8a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,18,8Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,18,4Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
