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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m30.8508,15.4487l-6.9641-11.9165c-.1926-.3301-.5437-.5322-.9224-.5322h-13.9287c-.3787,0-.7297.2021-.9224.5322L1.1492,15.4487c-.199.3403-.199.7622,0,1.1025l6.9641,11.9165c.1926.3301.5437.5322.9224.5322h13.9287c.3787,0,.7297-.2021.9224-.5322l6.9641-11.9165c.199-.3403.199-.7622,0-1.1025Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
