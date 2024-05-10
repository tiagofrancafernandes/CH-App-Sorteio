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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M4,21H2v3a2.0059,2.0059,0,0,0,2,2H7V24H4Z"></path><path d="M4,8H7V6H4A2.0059,2.0059,0,0,0,2,8v3H4Z"></path><rect x="17" y="6" width="6" height="2"></rect><rect x="9" y="6" width="6" height="2"></rect><rect x="17" y="24" width="6" height="2"></rect><polygon points="28 15 4 15 4 13 2 13 2 19 4 19 4 17 28 17 28 19 30 19 30 13 28 13 28 15"></polygon><path d="M28,24H25v2h3a2.0059,2.0059,0,0,0,2-2V21H28Z"></path><path d="M28,6H25V8h3v3h2V8A2.0059,2.0059,0,0,0,28,6Z"></path><rect x="9" y="24" width="6" height="2"></rect><circle cx="7" cy="12" r="1"></circle><circle cx="7" cy="20" r="1"></circle><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
