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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M16,23c-0.2,0-0.4,0-0.5-0.1l-5-3C10.2,19.7,10,19.4,10,19v-6c0-0.4,0.2-0.7,0.5-0.9l5-3C15.6,9,15.8,9,16,9 c0.2,0,0.4,0,0.5,0.1l5,3c0.3,0.2,0.5,0.5,0.5,0.9v6c0,0.4-0.2,0.7-0.5,0.9l-5,3C16.4,23,16.2,23,16,23z M12,18.4l4,2.4l4-2.4v-4.9 l-4-2.4l-4,2.4V18.4z"></path><path d="M16,31c-0.2,0-0.3,0-0.5-0.1l-12-7C3.2,23.7,3,23.4,3,23V9c0-0.4,0.2-0.7,0.5-0.9l12-7C15.7,1,15.8,1,16,1 c0.2,0,0.3,0,0.5,0.1l12,7l-1,1.7L16,3.2L5,9.6v12.9l11,6.4l11-6.4V15h2v8c0,0.4-0.2,0.7-0.5,0.9l-12,7C16.3,31,16.2,31,16,31z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
