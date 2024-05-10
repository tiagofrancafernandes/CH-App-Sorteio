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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="16" cy="14" r="2"></circle><path d="M29.8682,10.5039l-4-7a.9992.9992,0,0,0-1.3828-.3613L19.7231,6H12.2769L7.5146,3.1426a.9992.9992,0,0,0-1.3828.3613l-4,7a1,1,0,0,0,.3536,1.3535l4.7758,2.8657L11,21.2656V27a1,1,0,0,0,1,1h8a1,1,0,0,0,1-1V21.2656l3.7388-6.5425,4.7758-2.8657A1,1,0,0,0,29.8682,10.5039ZM18.8484,21H13.1516L8.5757,12.9922,11.4287,8h9.1426l2.853,4.9922Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" transform="translate(32 32) rotate(-180)" style="fill: none"></rect></svg>

</template>
