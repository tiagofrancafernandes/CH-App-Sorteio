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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="16" cy="16" r="2"></circle><path class="cls-1" d="M30.8638,15.4961l-7-12A1,1,0,0,0,23,3H9a1,1,0,0,0-.8638.4961l-7,12a1,1,0,0,0,0,1.0078l7,12A1,1,0,0,0,9,29H23a1,1,0,0,0,.8638-.4961l7-12a1,1,0,0,0,0-1.0078ZM22.4258,27H9.5742L3.1577,16,9.5742,5H22.4258l6.4165,11Z" transform="translate(0 0)" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" transform="translate(32 32) rotate(-180)" style="fill: none"></rect></svg>

</template>
