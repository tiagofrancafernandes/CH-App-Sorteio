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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,10H23V6a2.0023,2.0023,0,0,0-2-2H11A2.0023,2.0023,0,0,0,9,6v4H4a2.0023,2.0023,0,0,0-2,2V28a2.0023,2.0023,0,0,0,2,2H28a2.0023,2.0023,0,0,0,2-2V12A2.0023,2.0023,0,0,0,28,10ZM4,28V12H9v2H7v2H9v2H7v2H9v2H7v2H9v4Zm17,0H11V6H21Zm7,0H23V24h2V22H23V20h2V18H23V16h2V14H23V12h5Z" transform="translate(0 0)"></path><rect x="14" y="8" width="4" height="2"></rect><rect x="14" y="12" width="4" height="2"></rect><rect x="14" y="16" width="4" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
