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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M20,20V17a4,4,0,0,0-8,0v3a2.0025,2.0025,0,0,0-2,2v6a2.0025,2.0025,0,0,0,2,2h8a2.0025,2.0025,0,0,0,2-2V22A2.0025,2.0025,0,0,0,20,20Zm-6-3a2,2,0,0,1,4,0v3H14ZM12,28V22h8v6Z" transform="translate(0 0)"></path><path d="M6.105,7.105,7.5188,8.5186a11.9808,11.9808,0,0,1,16.9624,0L25.8949,7.105a13.9782,13.9782,0,0,0-19.79,0Z" transform="translate(0 0)"></path><path d="M16,8a8.9709,8.9709,0,0,0-6.3608,2.6392l1.4133,1.4135a6.9887,6.9887,0,0,1,9.895,0l1.4135-1.4135A8.9717,8.9717,0,0,0,16,8Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
