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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="19" y="26" width="11" height="2"></rect><rect x="19" y="22" width="11" height="2"></rect><path d="M30,20h-11V12h11v8Zm-9-2h7v-4h-7v4Z"></path><rect x="19" y="8" width="11" height="2"></rect><rect x="19" y="4" width="11" height="2"></rect><polygon points="10.293 18.707 8 16.4143 8 12 10 12 10 15.5857 11.707 17.293 10.293 18.707"></polygon><path d="M9,24c-4.4111,0-8-3.5889-8-8s3.5889-8,8-8,8,3.5889,8,8-3.5889,8-8,8Zm0-14c-3.3083,0-6,2.6917-6,6s2.6917,6,6,6,6-2.6917,6-6-2.6917-6-6-6Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
