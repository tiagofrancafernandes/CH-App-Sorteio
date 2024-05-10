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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M13,2A6.0067,6.0067,0,0,0,7,8H9a4,4,0,0,1,8,0h2A6.0067,6.0067,0,0,0,13,2Z"></path><path d="M21,30H16.5606a4,4,0,0,1-2.7088-1.0566L4.6513,20.4771A2.0018,2.0018,0,0,1,4.77,17.4219a2.0743,2.0743,0,0,1,2.6578.1728L11,20.8569V8a2,2,0,0,1,4,0v7a2,2,0,0,1,4,0v1a2,2,0,0,1,4,0v1a2,2,0,0,1,4,0v7A6,6,0,0,1,21,30Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
