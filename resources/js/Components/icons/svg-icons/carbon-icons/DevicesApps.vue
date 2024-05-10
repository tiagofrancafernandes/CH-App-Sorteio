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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="26" y="2" width="4" height="4"></rect><rect x="26" y="8" width="4" height="4"></rect><rect x="20" y="2" width="4" height="4"></rect><rect x="20" y="8" width="4" height="4"></rect><path d="m28,20h-14v2h2v4h-2v2h9v-2h-5v-4h10c.5304,0,1.0392-.2108,1.4142-.5858s.5858-.8838.5858-1.4142v-6h-2v6Z"></path><path d="m6,6h12v-2H6c-.5304,0-1.0392.2107-1.4142.5858-.3751.375-.5858.8838-.5858,1.4142v6h2v-6Z"></path><path d="m10,14H4c-.5304,0-1.0392.2107-1.4142.5858-.3751.375-.5858.8838-.5858,1.4142v12c0,.5304.2107,1.0392.5858,1.4142.375.375.8838.5858,1.4142.5858h6c.5304,0,1.0392-.2108,1.4142-.5858.3751-.375.5858-.8838.5858-1.4142v-12c0-.5304-.2107-1.0392-.5858-1.4142-.375-.3751-.8838-.5858-1.4142-.5858Zm0,14H4v-12h6v12Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
