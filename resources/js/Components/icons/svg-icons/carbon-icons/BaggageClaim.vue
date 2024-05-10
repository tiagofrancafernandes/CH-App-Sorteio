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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="6" cy="26" r="2"></circle><path d="M28,18H25V16a2.0023,2.0023,0,0,0-2-2H19a2.0023,2.0023,0,0,0-2,2v2H14a2.0023,2.0023,0,0,0-2,2v8a2.0023,2.0023,0,0,0,2,2H28a2.0023,2.0023,0,0,0,2-2V20A2.0023,2.0023,0,0,0,28,18Zm-9-2h4v2H19Zm9,12H14V20H28Z" transform="translate(0 0)"></path><path d="M10,6h4v6h2V6h4v6h2V6h4v6h2V6.0049A2.0047,2.0047,0,0,0,25.9951,4H4.0049A2.0047,2.0047,0,0,0,2,6.0049v13.99A2.0047,2.0047,0,0,0,4.0049,22H10ZM8,20H4V6H8Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
