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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,9H22v2h6v4H24v2h4v4H22v2h6a2.0027,2.0027,0,0,0,2-2V11A2.0023,2.0023,0,0,0,28,9Z"></path><path d="M20,23H12V17a2.002,2.002,0,0,1,2-2h4V11H12V9h6a2.0023,2.0023,0,0,1,2,2v4a2.0023,2.0023,0,0,1-2,2H14v4h6Z"></path><g><polygon class="cls-1" points="2.5 22.5 2.5 21.5 5.5 21.5 5.5 10.5 2.5 10.5 2.5 9.5 6.5 9.5 6.5 21.5 9.5 21.5 9.5 22.5 2.5 22.5" style="fill: #fff"></polygon><path d="M6,10V22H6V10M7,9H2v2H5V21H2v2h8V21H7V9Z"></path></g><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
