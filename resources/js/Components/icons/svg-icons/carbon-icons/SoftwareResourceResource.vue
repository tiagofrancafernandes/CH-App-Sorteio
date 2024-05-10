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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><rect x="6.9" y="8.3" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.8493 9.2931)" width="4.8" height="2"></rect><path d="M4.9,19.7l-2.3-2.3C2.2,17,2,16.5,2,16s0.2-1,0.6-1.4l2.3-2.3l1.4,1.4L4,16l2.3,2.3L4.9,19.7z"></path><rect x="8.3" y="20.3" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -13.3343 13.2219)" width="2" height="4.8"></rect><path d="M16,30c-0.5,0-1-0.2-1.4-0.6l-2.3-2.3l1.4-1.4L16,28l2.3-2.3l1.4,1.4l-2.3,2.3C17,29.8,16.5,30,16,30z"></path><rect x="20.3" y="21.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -9.4055 22.7069)" width="4.8" height="2"></rect><path d="M27.1,19.7l-1.4-1.4L28,16l-2.3-2.3l1.4-1.4l2.3,2.3C29.8,15,30,15.5,30,16s-0.2,1-0.6,1.4L27.1,19.7z"></path><rect x="21.7" y="6.9" transform="matrix(0.7071 -0.7071 0.7071 0.7071 7.949218e-02 18.7781)" width="2" height="4.8"></rect><path d="M16,2c-0.5,0-1,0.2-1.4,0.6l-2.3,2.3l1.4,1.4L16,4l2.3,2.3l1.4-1.4l-2.3-2.3C17,2.2,16.5,2,16,2z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
