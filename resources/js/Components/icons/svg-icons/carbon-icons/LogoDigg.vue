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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>logo--digg</title><path d="M6.48,7.6v3.92H2V21H9.28V7.6Zm0,11.2H4.8v-5H6.48Z"></path><rect x="10.4" y="11.52" width="2.8" height="9.52"></rect><rect x="10.4" y="7.6" width="2.8" height="2.8"></rect><path d="M14.32,11.52V21H18.8v1.12H14.32V24.4H21.6V11.52ZM18.8,18.8H17.12v-5H18.8Z"></path><path d="M22.72,11.52V21H27.2v1.12H22.72V24.4H30V11.52ZM27.2,18.8H25.52v-5H27.2Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
