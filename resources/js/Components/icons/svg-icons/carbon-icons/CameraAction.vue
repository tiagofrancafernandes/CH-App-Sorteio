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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>camera-action</title><path d="M12,23a6,6,0,1,1,6-6A6,6,0,0,1,12,23Zm0-10a4,4,0,1,0,4,4A4,4,0,0,0,12,13Z" transform="translate(0)"></path><path d="M29,27H3a1,1,0,0,1-1-1V6A1,1,0,0,1,3,5H29a1,1,0,0,1,1,1V26A1,1,0,0,1,29,27ZM4,25H28V7H4Z" transform="translate(0)"></path><rect x="19" y="9" width="7" height="2"></rect><circle cx="12" cy="17" r="1"></circle><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
