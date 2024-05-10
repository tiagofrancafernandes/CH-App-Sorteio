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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>direction--merge--filled</title><path d="M28,2H4A2,2,0,0,0,2,4V28a2,2,0,0,0,2,2H28a2,2,0,0,0,2-2V4A2,2,0,0,0,28,2ZM17.8784,15.4648l2.6572,2.6563A4.9682,4.9682,0,0,1,22,21.6567V26H20V21.6567a2.9821,2.9821,0,0,0-.8784-2.1215l-2.6572-2.6563A5.0021,5.0021,0,0,1,16,16.3135a5.0021,5.0021,0,0,1-.4644.5654l-2.6572,2.6567A2.9805,2.9805,0,0,0,12,21.6567V26H10V21.6567a4.9682,4.9682,0,0,1,1.4644-3.5356l2.6572-2.6567A2.9805,2.9805,0,0,0,15,13.3433V8.8281l-4.5859,4.586L9,12l7-7,7,7-1.4141,1.4141L17,8.8281v4.5152A2.9821,2.9821,0,0,0,17.8784,15.4648Z"></path><path id="inner-path" class="cls-1" d="M17.8784,15.4648l2.6572,2.6563A4.9682,4.9682,0,0,1,22,21.6567V26H20V21.6567a2.9821,2.9821,0,0,0-.8784-2.1215l-2.6572-2.6563A5.0021,5.0021,0,0,1,16,16.3135a5.0021,5.0021,0,0,1-.4644.5654l-2.6572,2.6567A2.9805,2.9805,0,0,0,12,21.6567V26H10V21.6567a4.9682,4.9682,0,0,1,1.4644-3.5356l2.6572-2.6567A2.9805,2.9805,0,0,0,15,13.3433V8.8281l-4.5859,4.586L9,12l7-7,7,7-1.4141,1.4141L17,8.8281v4.5152A2.9821,2.9821,0,0,0,17.8784,15.4648Z" style="fill: none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
