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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="18.5859 15.4141 16 12.8345 16 12.8345 13.4125 15.4156 12 14 16 10 20 14 18.5859 15.4141"></polygon><polygon points="18.5859 21.4141 16 18.8345 16 18.8345 13.4125 21.4156 12 20 16 16 20 20 18.5859 21.4141"></polygon><path d="m1.5858,17.4142c-.3905-.3905-.5858-.9024-.5858-1.4142s.1953-1.0237.5858-1.4142L14.5858,1.5858c.3905-.3905.9023-.5858,1.4142-.5858s1.0237.1953,1.4142.5858l13,13c.3905.3905.5858.9024.5858,1.4142s-.1953,1.0237-.5858,1.4142l-13,13c-.3905.3905-.9024.5858-1.4142.5858s-1.0237-.1953-1.4142-.5858L1.5858,17.4142ZM16,3L3,16l13,13,13-13L16,3Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
