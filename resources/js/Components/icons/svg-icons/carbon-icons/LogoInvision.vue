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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M4,4v24h24V4H4z M12.1,9c0.8,0,1.4,0.6,1.4,1.4c0,0.8-0.6,1.4-1.4,1.4c0,0,0,0,0,0c-0.8,0-1.4-0.6-1.4-1.4 C10.8,9.6,11.4,9,12.1,9z M21.5,22.2c-1.4,0-2.1-0.8-2.1-2c0-0.3,0-0.7,0.1-1l0.7-2.4c0.1-0.2,0.1-0.5,0.1-0.7 c0-0.8-0.5-1.3-1.2-1.3c-1,0-1.6,0.7-1.9,2L15.9,22h-2.3l0.4-1.7c-0.7,1.1-1.6,1.8-2.8,1.8c-1.4,0-2.1-0.8-2.1-2c0-0.3,0-0.7,0.1-1 l1.1-4.3H8.7L9.2,13h3.9l-1.5,6.1c-0.1,0.3-0.1,0.6-0.1,0.9c0,0.4,0.2,0.5,0.5,0.6c0.2,0,1.6,0,2.4-1.8l1-4.1h-1.6l0.5-1.8h3.5 l-0.5,2.1c0.6-1.2,1.9-2.2,3.1-2.2c1.3,0,2.4,0.9,2.4,2.7c0,0.5-0.1,1-0.2,1.5l-0.7,2.4c-0.1,0.2-0.1,0.4-0.1,0.6 c0,0.4,0.2,0.6,0.5,0.6c0.3,0,0.7-0.2,1.2-1.5l0.9,0.4C23.7,21.4,22.7,22.2,21.5,22.2z"></path><rect id="_x3C_Transparent_Rectangle_x3E__363_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
