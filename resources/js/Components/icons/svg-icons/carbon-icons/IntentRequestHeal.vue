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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M27,20c-0.8,0-1.5,0.3-2.1,0.9l-0.4,0.5l-0.4-0.5C23.5,20.3,22.7,20,22,20s-1.5,0.3-2.1,0.9c-1.2,1.2-1.2,3.1,0,4.3l4.6,4.8 l4.6-4.8c1.2-1.2,1.2-3.1,0-4.3C28.6,20.3,27.8,20,27,20L27,20z"></path><path d="M16.6,28.6L4,16L16,4l12.6,12.6l1.4-1.4L17.5,2.6c-0.8-0.8-2.1-0.8-2.9,0L2.6,14.5c-0.8,0.8-0.8,2.1,0,2.9L15.1,30 L16.6,28.6z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
