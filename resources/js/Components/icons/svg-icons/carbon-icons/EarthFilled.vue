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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>earth--filled</title><path d="M16,2A14,14,0,1,0,30,16,14.0158,14.0158,0,0,0,16,2ZM4.02,16.394l1.3384.4458L7,19.3027v1.2831a1,1,0,0,0,.2929.7071L10,24v2.3765A11.9941,11.9941,0,0,1,4.02,16.394ZM16,28a11.9682,11.9682,0,0,1-2.5718-.2847L14,26l1.8046-4.5116a1,1,0,0,0-.0964-.9261l-1.4113-2.117A1,1,0,0,0,13.4648,18h-4.93L7.2866,16.1274,9.4141,14H11v2h2V13.2656l3.8682-6.7695-1.7364-.9922L14.2769,7H11.5352l-1.086-1.6289A11.861,11.861,0,0,1,20,4.7V8a1,1,0,0,0,1,1h1.4648a1,1,0,0,0,.8321-.4453l.8769-1.3154A12.0331,12.0331,0,0,1,26.8945,11H22.82a1,1,0,0,0-.9806.8039l-.7221,4.4708a1,1,0,0,0,.54,1.0539L25,19l.6851,4.0557A11.9793,11.9793,0,0,1,16,28Z"></path><g id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;"><rect class="cls-1" width="32" height="32" style="fill:none"></rect></g></svg>

</template>
