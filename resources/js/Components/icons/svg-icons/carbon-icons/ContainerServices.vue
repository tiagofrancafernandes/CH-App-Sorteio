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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M27,22V17a2.0023,2.0023,0,0,0-2-2H17V10h3a2.0023,2.0023,0,0,0,2-2V4a2.0023,2.0023,0,0,0-2-2H12a2.0023,2.0023,0,0,0-2,2V8a2.0023,2.0023,0,0,0,2,2h3v5H7a2.0023,2.0023,0,0,0-2,2v5H2v8h8V22H7V17h8v5H12v8h8V22H17V17h8v5H22v8h8V22ZM12,4h8V8H12ZM8,28H4V24H8Zm10,0H14V24h4Zm10,0H24V24h4Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
