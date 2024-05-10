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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29,26H23V22a2.002,2.002,0,0,1,2-2h2V18H23V16h4a2.0023,2.0023,0,0,1,2,2v2a2.0023,2.0023,0,0,1-2,2H25v2h4Z" transform="translate(0 0)"></path><path d="M19,22H15a2.0023,2.0023,0,0,1-2-2V10a2.002,2.002,0,0,1,2-2h4a2.002,2.002,0,0,1,2,2V20A2.0023,2.0023,0,0,1,19,22ZM15,10V20h4V10Z" transform="translate(0 0)"></path><path d="M11,22H5a2.0023,2.0023,0,0,1-2-2V10A2.002,2.002,0,0,1,5,8h6v2H5V20h6Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
