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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M23.1,16l6.3-6.3c0.8-0.8,0.8-2,0-2.8l-4.2-4.2c-0.8-0.8-2-0.8-2.8,0L16,8.9L9.7,2.6c-0.8-0.8-2-0.8-2.8,0L2.6,6.8 c-0.8,0.8-0.8,2,0,2.8L8.9,16L2,22.9V30h7.1l6.9-6.9l6.3,6.3c0.8,0.8,2,0.8,2.8,0l4.2-4.2c0.8-0.8,0.8-2,0-2.8L23.1,16z M23.8,4 L28,8.2l-6.3,6.3l-4.2-4.2L23.8,4z M8.2,28H4v-4.2l6.3-6.3l4.2,4.2L8.2,28z M23.8,28L4,8.2L8.2,4l3.5,3.5L9.6,9.6l1.4,1.4l2.1-2.1 l4.2,4.2l-2.1,2.1l1.4,1.4l2.1-2.1l4.2,4.2L21,20.9l1.4,1.4l2.1-2.1l3.5,3.5L23.8,28z"></path><rect id="_x3C_Transparent_Rectangle_x3E_" x="0" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
