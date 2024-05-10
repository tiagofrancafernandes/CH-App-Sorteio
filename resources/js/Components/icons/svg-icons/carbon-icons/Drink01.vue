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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23,10.4141l3-3-1.4141-1.4141-3.293,3.293c-.1875,.1875-.293,.4419-.293,.707v4h-7.0742l1.1436,16h8.8613l1.1436-16h-2.0742v-3.5859Zm-.9307,17.5859h-5.1387l-.8564-12h6.8516l-.8564,12Z"></path><path d="M15,1h-5c-.5522,0-1,.4478-1,1v7.3706c-1.0674,.6055-3,2.1777-3,5.6294v14c0,.5527,.4478,1,1,1h5v-2h-4V15c0-3.7536,3-4.2793,3-4.2793V3h3v7h2V2c0-.5522-.4478-1-1-1Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
