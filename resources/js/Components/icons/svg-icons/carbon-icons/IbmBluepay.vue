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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M5,26V15.8281l-3.5859,3.586L0,18l6-6,6,6-1.4141,1.4141-3.5859-3.586v10.1719h12v2H7c-1.104-.0013-1.9987-.896-2-2Z"></path><path d="M31,18h-3v-2h-2v2h-1c-1.1046,0-2,.8954-2,2v2c0,1.1046,.8954,2,2,2h4v2h-6s0,2,0,2h3v2h2v-2h1c1.1046,0,2-.8954,2-2v-2c0-1.1046-.8954-2-2-2h-4v-2h6v-2Z"></path><path d="M28,12V6c-.0012-1.104-.896-1.9988-2-2H12v2h14v6"></path><rect x="2" y="6" width="5" height="2"></rect><rect x="2" y="2" width="8" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
