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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="8" y="6" width="2" height="2"></rect><rect x="12" y="6" width="2" height="2"></rect><rect x="20" y="6" width="2" height="2"></rect><rect x="24" y="6" width="2" height="2"></rect><rect x="28" y="6" width="2" height="2"></rect><path d="M27.989,28l-.0271-.1631C26.5105,19.0742,24.0662,9.0894,18,8.0889V6H16V8.085c-6.084.978-8.533,10.9775-9.9863,19.7519L5.9866,28H4V8H6V6H4V2H2V28a2,2,0,0,0,2,2H30V28ZM8.0151,28c2.024-12.1084,4.959-18,8.9727-18s6.9487,5.8916,8.9726,18Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
