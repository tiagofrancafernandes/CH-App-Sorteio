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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M7,12H4a2.0023,2.0023,0,0,1-2-2V6A2.0023,2.0023,0,0,1,4,4H7V6H4v4H7Z"></path><rect x="9" y="10" width="6" height="2"></rect><rect x="17" y="10" width="6" height="2"></rect><path d="M28,12H25V10h3V6H25V4h3a2.0023,2.0023,0,0,1,2,2v4A2.0023,2.0023,0,0,1,28,12Z"></path><rect x="17" y="4" width="6" height="2"></rect><rect x="9" y="4" width="6" height="2"></rect><path d="M28,28H4a2.0023,2.0023,0,0,1-2-2V22a2.0023,2.0023,0,0,1,2-2H28a2.0023,2.0023,0,0,1,2,2v4A2.0023,2.0023,0,0,1,28,28ZM4,22v4H28V22Z"></path><rect x="2" y="15" width="28" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
