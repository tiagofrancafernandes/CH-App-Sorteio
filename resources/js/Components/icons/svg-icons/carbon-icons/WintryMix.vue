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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>wintry-mix</title><rect x="15" y="26" width="2" height="2"></rect><rect x="17" y="28" width="2" height="2"></rect><rect x="19" y="30" width="2" height="2"></rect><rect x="19" y="26" width="2" height="2"></rect><rect x="15" y="30" width="2" height="2"></rect><rect x="13" y="16" width="2" height="2"></rect><rect x="15" y="18" width="2" height="2"></rect><rect x="17" y="20" width="2" height="2"></rect><rect x="17" y="16" width="2" height="2"></rect><rect x="13" y="20" width="2" height="2"></rect><path d="M10,30a1,1,0,0,1-.8944-1.4474l2-4.0005a1,1,0,1,1,1.7888.8947l-2,4A.9981.9981,0,0,1,10,30Z"></path><path d="M24.8008,9.1362a8.9943,8.9943,0,0,0-17.6006,0A6.5321,6.5321,0,0,0,2,15.5V22l1,2,1-2V20.18a6.4891,6.4891,0,0,0,3.4294,1.7246L6.106,24.5527a1,1,0,1,0,1.7885.8946l2-4a1,1,0,0,0-.447-1.3418.977.977,0,0,0-.489-.0894V20H8.5a4.4975,4.4975,0,0,1-.356-8.981l.8155-.0639.0991-.812a6.9938,6.9938,0,0,1,13.8838,0l.0986.812.8154.0639A4.4975,4.4975,0,0,1,23.5,20h-.542v.0083A.9955.9955,0,0,0,22,21v3l1,2,1-2V21.9746a6.4473,6.4473,0,0,0,2-.4761V26l1,2,1-2V20.18A6.4876,6.4876,0,0,0,24.8008,9.1362Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
