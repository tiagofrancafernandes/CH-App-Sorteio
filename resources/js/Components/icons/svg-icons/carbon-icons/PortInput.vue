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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M18,28c-3.5928,0-6.9666-1.5903-9.2566-4.3632l1.542-1.2737c1.9087,2.3113,4.7207,3.6368,7.7146,3.6368,5.5139,0,10-4.486,10-10s-4.4861-10-10-10c-2.9939,0-5.8059,1.3256-7.7146,3.6368l-1.542-1.2737c2.29-2.7728,5.6638-4.3632,9.2566-4.3632,6.6169,0,12,5.3832,12,12s-5.3831,12-12,12Z"></path><polygon points="23 16 16 9 14.5859 10.4141 19.1719 15 2 15 2 17 19.1719 17 14.5859 21.5859 16 23 23 16"></polygon><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
