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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26.5,12H19a4,4,0,0,1,0-8h.0835A4.7864,4.7864,0,0,1,23,2a4.9816,4.9816,0,0,1,4.6543,3.2034A3.4667,3.4667,0,0,1,30,8.5,3.5041,3.5041,0,0,1,26.5,12ZM19,6a2,2,0,0,0,0,4h7.5A1.5017,1.5017,0,0,0,28,8.5a1.4855,1.4855,0,0,0-1.2778-1.4739L26.061,6.927l-.1616-.6487a2.9568,2.9568,0,0,0-5.4873-.7121L20.1143,6Z" transform="translate(0 0)"></path><path d="M13,28V24.8882a7.9363,7.9363,0,0,0,4.707-2.2818.9995.9995,0,0,0,0-1.414L13.4644,16.95,16,14.4141,14.5859,13,12.05,15.5356,7.8076,11.293a.9994.9994,0,0,0-1.414,0,7.9993,7.9993,0,0,0,0,11.3134c.1621.1622.3327.3125.5058.459L4.4321,28H2v2H30V28Zm-2,0H6.6685L8.59,24.1567A7.8927,7.8927,0,0,0,11,24.873ZM7.8076,21.1924a6.0036,6.0036,0,0,1-.6489-7.72l8.3686,8.3681a6.0026,6.0026,0,0,1-7.72-.6484Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
