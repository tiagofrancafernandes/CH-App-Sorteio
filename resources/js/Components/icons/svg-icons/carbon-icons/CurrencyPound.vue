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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M12.4531,25A8.7775,8.7775,0,0,0,14,20a10.6,10.6,0,0,0-.18-2H22V16H13.2175c-.0842-.2109-.17-.4194-.2556-.624A9.8586,9.8586,0,0,1,12,11a4.792,4.792,0,0,1,5-5,6.1234,6.1234,0,0,1,5.2222,2.6279l1.5556-1.2558A8.11,8.11,0,0,0,17,4a6.7781,6.7781,0,0,0-7,7,11.65,11.65,0,0,0,1.0559,5H8v2h3.7729A8.209,8.209,0,0,1,12,20c0,2.5234-1.4858,5-3,5v2H24V25Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
