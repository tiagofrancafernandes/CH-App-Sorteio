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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="2" y="28" width="9" height="2"></rect><rect x="21" y="28" width="9" height="2"></rect><polygon points="17 26.167 17 17.832 19.586 20.414 21 19 16 14 11 19 12.413 20.415 15 17.832 15 26.167 12.413 23.584 11 25 16 30 21 25 19.586 23.586 17 26.167"></polygon><path d="M23,16H21V14h2a3,3,0,0,0,0-6c-.0938.0144-.1538.0219-.2153.0263l-.8037.0572L21.7544,7.31a5.9927,5.9927,0,0,0-11.1758-.8655l-.2832.5994-.8423-.0455A3.5008,3.5008,0,0,0,9.5,14H11v2H9.5A5.5,5.5,0,0,1,9.07,5.0166,7.9909,7.9909,0,0,1,23.42,6.0175,5,5,0,0,1,23,16Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
