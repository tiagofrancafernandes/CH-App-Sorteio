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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M23,10v-2c0-.5522-.4478-1-1-1h-3v2h2v1.9688s2,1.1238,2,3.48v8.5513h-4v2h5c.5522,0,1-.4478,1-1V14.4487c0-1.7129-.7229-3.3076-2-4.4487Z"></path><path d="M15,10v-2c0-.5522-.4478-1-1-1h-4c-.5522,0-1,.4478-1,1v2c-1.2771,1.1411-2,2.7358-2,4.4487v9.5513c0,.5522,.4478,1,1,1h8c.5522,0,1-.4478,1-1V14.4487c0-1.7129-.7229-3.3076-2-4.4487Zm0,13h-6V14.4487c0-2.356,2-3.48,2-3.48v-1.9688h2v1.9688s2,1.124,2,3.48v8.5513Z"></path><path d="M28,2H4c-1.1046,0-2,.8954-2,2V28c0,1.1046,.8954,2,2,2H28c1.1046,0,2-.8954,2-2V4c0-1.1046-.8954-2-2-2Zm0,26H4V4H28V28Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
