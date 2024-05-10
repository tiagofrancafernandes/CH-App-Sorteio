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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,30H20V24a2.002,2.002,0,0,1,2-2h4V18H20V16h6a2.0023,2.0023,0,0,1,2,2v4a2.0023,2.0023,0,0,1-2,2H22v4h6Z"></path><rect x="4.4791" y="15.5001" width="22.0418" height="1.9998" transform="translate(-7.1274 15.7929) rotate(-45)"></rect><g><polygon class="cls-1" points="4.5 15.5 4.5 14.5 7.5 14.5 7.5 3.5 4.5 3.5 4.5 2.5 8.5 2.5 8.5 14.5 11.5 14.5 11.5 15.5 4.5 15.5" style="fill: #fff"></polygon><path d="M8,3V15H8V3M9,2H4V4H7V14H4v2h8V14H9V2Z"></path></g><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
