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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M30,24v-2h-2.101c-0.13-0.637-0.384-1.229-0.732-1.753l1.49-1.49l-1.414-1.414l-1.49,1.49 c-0.524-0.348-1.116-0.602-1.753-0.732V16h-2v2.101c-0.637,0.13-1.229,0.384-1.753,0.732l-1.49-1.49l-1.414,1.414l1.49,1.49 c-0.348,0.524-0.602,1.116-0.732,1.753H16v2h2.101c0.13,0.637,0.384,1.229,0.732,1.753l-1.49,1.49l1.414,1.414l1.49-1.49 c0.524,0.348,1.116,0.602,1.753,0.732V30h2v-2.101c0.637-0.13,1.229-0.384,1.753-0.732l1.49,1.49l1.414-1.414l-1.49-1.49 c0.348-0.524,0.602-1.116,0.732-1.753H30z M23,26c-1.654,0-3-1.346-3-3s1.346-3,3-3s3,1.346,3,3S24.654,26,23,26z"></path><rect x="12" y="6" width="4" height="2"></rect><path d="M6,28V4h16v9h2V4c0-1.103-0.897-2-2-2H6C4.897,2,4,2.897,4,4v24c0,1.103,0.897,2,2,2h8v-2H6z"></path><rect id="_x3C_Transparent_Rectangle_x3E__589_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
