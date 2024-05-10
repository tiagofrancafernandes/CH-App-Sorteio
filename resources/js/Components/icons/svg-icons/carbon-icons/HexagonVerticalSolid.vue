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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m16.5513,30.8508l11.9165-6.9641c.3301-.1926.5322-.5437.5322-.9224v-13.9287c0-.3787-.2021-.7297-.5322-.9224L16.5513,1.1492c-.3403-.199-.7622-.199-1.1025,0L3.5322,8.1133c-.3301.1926-.5322.5437-.5322.9224v13.9287c0,.3787.2021.7297.5322.9224l11.9165,6.9641c.3403.199.7622.199,1.1025,0Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(180)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
