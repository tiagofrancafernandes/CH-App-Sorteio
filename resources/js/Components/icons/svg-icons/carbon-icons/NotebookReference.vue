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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>notebook--reference</title><polygon points="4 20 4 22 7.586 22 2 27.586 3.414 29 9 23.414 9 27 11 27 11 20 4 20"></polygon><rect x="19" y="10" width="7" height="2"></rect><rect x="19" y="15" width="7" height="2"></rect><rect x="19" y="20" width="7" height="2"></rect><path d="M28,5H4A2.002,2.002,0,0,0,2,7V17H4V7H15V27H28a2.002,2.002,0,0,0,2-2V7A2.002,2.002,0,0,0,28,5ZM17,25V7H28l.0015,18Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
