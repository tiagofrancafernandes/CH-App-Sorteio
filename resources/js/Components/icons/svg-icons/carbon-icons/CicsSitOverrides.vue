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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M31.707,20.293l-3-3c-.3901-.3906-1.0239-.3906-1.4141,0l-9.293,9.293v4.4141h4.4143l9.2927-9.293c.3906-.3906,.3906-1.0234,0-1.4141Zm-7.4141,6l-2.7073,2.707h-1.5857v-1.5859l2.707-2.707,2.293-2.293,1.5859,1.5859-2.293,2.293Zm3.707-3.707l-1.5859-1.5859,1.5859-1.5859,1.5857,1.5859-1.5857,1.5859Z"></path><path d="M20,20v-2h-4v-7h10v2h2V6c0-1.6543-1.3457-3-3-3H5c-1.6543,0-3,1.3457-3,3V26c0,1.6543,1.3457,3,3,3h11v-9h4Zm-6-2H4v-7H14v7ZM5,5H25c.5515,0,1,.4482,1,1v3H4v-3c0-.5518,.4485-1,1-1ZM14,27H5c-.5515,0-1-.4482-1-1v-6H14v7Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
