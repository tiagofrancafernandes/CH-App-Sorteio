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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>flash--off--filled</title><path d="M30,28.59,3.41,2,2,3.41,8.4,9.82,7,15.77A1,1,0,0,0,8,17h4.83L11,28.85a1,1,0,0,0,.6,1.07A1.09,1.09,0,0,0,12,30a1,1,0,0,0,.79-.39l6.68-8.73L28.59,30Z"></path><path d="M22.53,16.87l3.26-4.26a1,1,0,0,0,.11-1A1,1,0,0,0,25,11H20.25L22,3.22a1,1,0,0,0-.2-.85A1,1,0,0,0,21,2H11a1,1,0,0,0-1,.77l-.3,1.3Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
