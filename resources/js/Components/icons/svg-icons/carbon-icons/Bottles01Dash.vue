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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,9.3706V3c0-.5522-.4478-1-1-1h-3v2h2v6.7207s3,.5066,3,4.2793v13h-3v2h4c.5522,0,1-.4478,1-1V15c0-3.4517-1.9326-5.0239-3-5.6294Z"></path><path d="M19,9.3706V3c0-.5522-.4478-1-1-1h-3v2h2v6.7207s3,.5066,3,4.2793v13h-3v2h4c.5522,0,1-.4478,1-1V15c0-3.4517-1.9326-5.0239-3-5.6294Z"></path><path d="M13,28h-3v2h4c.5522,0,1-.4478,1-1v-4h-2v3Z"></path><path d="M5,25H3v4c0,.5522,.4478,1,1,1h4v-2h-3v-3Z"></path><rect x="13" y="18" width="2" height="5"></rect><rect x="3" y="18" width="2" height="5"></rect><path d="M12,9.3706V3c0-.5522-.4478-1-1-1H7c-.5522,0-1,.4478-1,1v6.3706c-1.0674,.6055-3,2.1777-3,5.6294v1h2v-1c0-3.7725,3-4.2793,3-4.2793V4h2v6.7207s3,.5068,3,4.2793v1h2v-1c0-3.4517-1.9326-5.0239-3-5.6294Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
