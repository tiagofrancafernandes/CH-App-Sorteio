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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m27.9248,19.4282c-1.123,1.6104-2.9641,2.5718-4.9248,2.5718-2.1233,0-4.0464-1.0874-5.1438-2.9092l-1.7129,1.0322c1.4624,2.4277,4.0256,3.877,6.8567,3.877,1.4231,0,2.7925-.3911,3.9922-1.0835-2.3442,3.6958-6.4814,6.0835-10.9922,6.0835-5.7104,0-10.8347-3.8184-12.4617-9.2852l-1.917.5703c1.8774,6.3086,7.79,10.7148,14.3787,10.7148s12.5012-4.4062,14.3787-10.7148l-2.4539-.8569Z"></path><circle cx="30" cy="16" r="2"></circle><circle cx="2" cy="16" r="2"></circle><circle cx="16" cy="16" r="2"></circle><path d="m16,1C9.4114,1,3.4988,5.4062,1.6213,11.7148l2.4539.8569c1.123-1.6104,2.9641-2.5718,4.9248-2.5718s3.8018.9614,4.9248,2.5718l1.6406-1.144c-1.4971-2.1465-3.9514-3.4277-6.5654-3.4277-1.4231,0-2.7925.3911-3.9922,1.0835,2.3442-3.6953,6.4814-6.0835,10.9922-6.0835,5.7104,0,10.8347,3.8184,12.4617,9.2852l1.917-.5703c-1.8774-6.3086-7.79-10.7148-14.3787-10.7148Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" x="0" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
