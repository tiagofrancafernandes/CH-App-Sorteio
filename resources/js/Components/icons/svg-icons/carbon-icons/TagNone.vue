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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23.092,10.3218,30,3.4141,28.5859,2,2,28.5859,3.4141,30l6.9077-6.9077,6.3218,6.3223a2.001,2.001,0,0,0,2.8286,0l9.9424-9.9424a2.001,2.001,0,0,0,0-2.8286ZM18.0579,28l-6.3218-6.3223,9.9419-9.9419L28,18.0576Z" transform="translate(0 0)"></path><path d="M10,14a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,10,14Zm0-6a2,2,0,1,0,1.998,2.0044A2.002,2.002,0,0,0,10,8Z" transform="translate(0 0)"></path><path d="M7.4927,20.2627l1.414-1.4141L4,13.9414V4h9.9417l4.9069,4.9067,1.4141-1.414L15.3555,2.5859A2,2,0,0,0,13.9414,2H4A2,2,0,0,0,2,4v9.9414a2,2,0,0,0,.5857,1.4141Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
