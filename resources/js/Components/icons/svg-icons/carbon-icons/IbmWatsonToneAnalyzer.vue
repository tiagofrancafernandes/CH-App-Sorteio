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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M23.9,10c-0.6-0.6-1.5-1-2.4-1s-1.8,0.4-2.4,1l-1.4-1.4c1-1,2.4-1.6,3.8-1.6s2.9,0.6,3.8,1.6L23.9,10z"></path><circle cx="24" cy="5" r="1"></circle><circle cx="19" cy="5" r="1"></circle><path d="M15,0l13,0c1.1,0,2,0.9,2,2v10c0,1.1-0.9,2-2,2h-3.5l-1.7,3L21,16l2.3-4H28V2H15v10h5v2h-5c-1.1,0-2-0.9-2-2V2 C13,0.9,13.9,0,15,0z"></path><path d="M20,19v6c0,0.6-0.4,1-1,1h-5v2h5c1.7,0,3-1.3,3-3v-6H20z"></path><path d="M15.4,20.4c-0.8,1-2.1,1.6-3.4,1.6s-2.6-0.6-3.4-1.6L7,21.6c1.2,1.4,3,2.4,5,2.4s3.8-0.9,5-2.4L15.4,20.4z"></path><circle cx="15.5" cy="17.5" r="1.5"></circle><circle cx="8.5" cy="17.5" r="1.5"></circle><path d="M10.1,26H5c-0.6,0-1-0.4-1-1V14c0-0.6,0.4-1,1-1h5v-2H5c-1.7,0-3,1.3-3,3v11c0,1.7,1.3,3,3,3h4l2.3,4l1.7-1L10.1,26z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
