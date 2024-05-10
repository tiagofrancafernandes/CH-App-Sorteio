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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>categories</title><path d="M6.76,6l.45.89L7.76,8H12v5H4V6H6.76m.62-2H3A1,1,0,0,0,2,5v9a1,1,0,0,0,1,1H13a1,1,0,0,0,1-1V7a1,1,0,0,0-1-1H9L8.28,4.55A1,1,0,0,0,7.38,4Z" transform="translate(0 0)"></path><path d="M22.76,6l.45.89L23.76,8H28v5H20V6h2.76m.62-2H19a1,1,0,0,0-1,1v9a1,1,0,0,0,1,1H29a1,1,0,0,0,1-1V7a1,1,0,0,0-1-1H25l-.72-1.45a1,1,0,0,0-.9-.55Z" transform="translate(0 0)"></path><path d="M6.76,19l.45.89L7.76,21H12v5H4V19H6.76m.62-2H3a1,1,0,0,0-1,1v9a1,1,0,0,0,1,1H13a1,1,0,0,0,1-1V20a1,1,0,0,0-1-1H9l-.72-1.45a1,1,0,0,0-.9-.55Z" transform="translate(0 0)"></path><path d="M22.76,19l.45.89L23.76,21H28v5H20V19h2.76m.62-2H19a1,1,0,0,0-1,1v9a1,1,0,0,0,1,1H29a1,1,0,0,0,1-1V20a1,1,0,0,0-1-1H25l-.72-1.45a1,1,0,0,0-.9-.55Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
