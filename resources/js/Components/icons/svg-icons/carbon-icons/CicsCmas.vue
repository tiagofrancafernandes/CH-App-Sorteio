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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M30.3335,30H26V28h4V26H28a2.002,2.002,0,0,1-2-2V21.6665A1.6684,1.6684,0,0,1,27.6665,20H32v2H28v2h2a2.002,2.002,0,0,1,2,2v2.3335A1.6684,1.6684,0,0,1,30.3335,30Z" transform="translate(0 0)"></path><path d="M22.3335,20h-2.667A1.6665,1.6665,0,0,0,18,21.6665V30h2V26h2v4h2V21.6665A1.6665,1.6665,0,0,0,22.3335,20ZM20,24V22h2v2Z" transform="translate(0 0)"></path><polygon points="12.5 24 11 20 9 20 9 30 11 30 11 23 12.5 27 14 23 14 30 16 30 16 20 14 20 12.5 24"></polygon><path d="M1,22v6.5A1.4727,1.4727,0,0,0,2.5,30H7V28H3V22H7V20H3A2.0059,2.0059,0,0,0,1,22Z" transform="translate(0 0)"></path><polygon points="13 8 11 8 11 11 8 11 8 13 11 13 11 16 13 16 13 13 16 13 16 11 13 11 13 8"></polygon><path d="M6,6H26V18h2V6a2.0059,2.0059,0,0,0-2-2H6A2.0059,2.0059,0,0,0,4,6V18H6Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
