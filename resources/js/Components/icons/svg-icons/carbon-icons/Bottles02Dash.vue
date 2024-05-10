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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M24,9.0513v-3.0513c0-.5522-.4478-1-1-1h-3v2h2v3.02s2,1.1238,2,3.48v11.5h-4v2h5c.5522,0,1-.4478,1-1V13.5c0-1.7129-.7229-3.3076-2-4.4487Z"></path><path d="M16,25h-3v2h4c.5522,0,1-.4478,1-1v-4h-2v3Z"></path><path d="M8,22h-2v4c0,.5522,.4478,1,1,1h4v-2h-3v-3Z"></path><rect x="16" y="16" width="2" height="4"></rect><rect x="6" y="16" width="2" height="4"></rect><path d="M16,9.0513v-3.0513c0-.5522-.4478-1-1-1h-6c-.5522,0-1,.4478-1,1v3.0513c-1.2771,1.1411-2,2.7358-2,4.4487v.5h2v-.5c0-2.356,2-3.48,2-3.48v-3.02h4v3.02s2,1.124,2,3.48v.5h2v-.5c0-1.7129-.7229-3.3076-2-4.4487Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
