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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M22.5,13c-4.7,0-8.5,3.8-8.5,8.5s3.8,8.5,8.5,8.5s8.5-3.8,8.5-8.5S27.2,13,22.5,13z M29,21h-3c0-2-0.3-4-0.9-5.5 C27.2,16.5,28.8,18.5,29,21z M22.5,28C22.5,28,22.5,28,22.5,28c-0.4-0.2-1.3-1.8-1.5-5h2.9C23.7,26.2,22.9,27.8,22.5,28z M21,21 c0.1-3.8,1.1-5.8,1.4-6c0,0,0,0,0,0c0.4,0.2,1.4,2.2,1.5,6H21z M19.9,15.5C19.3,17,19.1,19,19,21h-3C16.2,18.5,17.8,16.5,19.9,15.5z M16.2,23H19c0.1,1.6,0.4,3.2,0.9,4.5C18.1,26.7,16.7,25,16.2,23z M25.1,27.5c0.5-1.3,0.8-2.8,0.9-4.5h2.9 C28.3,25,26.9,26.7,25.1,27.5z"></path><path d="M25.8,10c-0.9-4.6-5-8-9.8-8c-4.8,0-8.9,3.4-9.8,8.1C2.7,10.8,0,13.8,0,17.5C0,21.6,3.4,25,7.5,25H11v-2H7.5 c-3,0-5.5-2.5-5.5-5.5c0-2.9,2.2-5.3,5.1-5.5L8,12L8,11.1C8.5,7.1,11.9,4,16,4c3.7,0,6.8,2.6,7.7,6H25.8z"></path><rect id="_x3C_Transparent_Rectangle_x3E__232_" y="0" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
