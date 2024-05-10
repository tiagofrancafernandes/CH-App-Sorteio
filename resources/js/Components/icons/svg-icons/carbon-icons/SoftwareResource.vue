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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 32 32" xml:space="preserve" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><path d="M29.391,14.527L17.473,2.609C17.067,2.203,16.533,2,16,2c-0.533,0-1.067,0.203-1.473,0.609L2.609,14.527 C2.203,14.933,2,15.466,2,16s0.203,1.067,0.609,1.473l11.917,11.917C14.933,29.797,15.467,30,16,30c0.533,0,1.067-0.203,1.473-0.609 l11.917-11.917C29.797,17.067,30,16.534,30,16S29.797,14.933,29.391,14.527z M16,28.036L3.965,16L16,3.964L28.036,16L16,28.036z"></path><rect id="_x3C_Transparent_Rectangle_x3E__00000119812012335990934660000018356235523389216153_" class="st0" width="32" height="32" style="fill:none"></rect></svg>

</template>
