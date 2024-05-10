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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m27.3803,28h-6.7625l3.3822-6.7642,3.3803,6.7642Zm-3.3803-10c-.3915,0-.7305.2251-.8947.5527l-5,10c-.0674.1348-.1053.2866-.1053.4473,0,.5522.4477,1,1,1h10c.5523,0,1-.4478,1-1,0-.1382-.028-.2695-.0786-.3892l-5.0269-10.0581c-.1641-.3276-.5031-.5527-.8946-.5527h0Z"></path><path d="m15,28h-6V8h14v7h2V4c0-1.103-.8975-2-2-2h-14c-1.103,0-2,.897-2,2v24c0,1.1025.897,2,2,2h6v-2ZM9,4h14v2h-14v-2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
