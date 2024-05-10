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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path id="inner-path" class="cls-1" d="M14.875,8h2.25V19h-2.25ZM16,25a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,16,25Z" style="fill: none"></path><path d="M30.8508,15.4487,23.8867,3.5322A1.0687,1.0687,0,0,0,22.9643,3H9.0357a1.0687,1.0687,0,0,0-.9224.5322L1.1492,15.4487a1.0933,1.0933,0,0,0,0,1.1026L8.1133,28.4678A1.0687,1.0687,0,0,0,9.0357,29H22.9643a1.0687,1.0687,0,0,0,.9224-.5322l6.9641-11.9165A1.0933,1.0933,0,0,0,30.8508,15.4487ZM14.875,8h2.25V19h-2.25ZM16,25a1.5,1.5,0,1,1,1.5-1.5A1.5,1.5,0,0,1,16,25Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
