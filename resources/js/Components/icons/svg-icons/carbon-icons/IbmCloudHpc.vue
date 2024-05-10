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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="22" y="13" width="2" height="2"></rect><rect x="26" y="13" width="2" height="2"></rect><rect x="30" y="13" width="2" height="2"></rect><rect x="30" y="17" width="2" height="2"></rect><rect x="15" y="20" width="2" height="2"></rect><rect x="20" y="28" width="2" height="2"></rect><rect x="24" y="28" width="2" height="2"></rect><path d="m19,26h9v-9h-9v9Zm2-7h5v5h-5v-5Z"></path><path d="m16,3v.0005c-.002,0-.004-.0003-.006-.0003-4.7007.0032-8.9033,3.3306-9.8242,8.1152C2.6037,11.7607.0078,14.8598,0,18.4815c-.0089,4.1434,3.345,7.5096,7.4911,7.5185h9.5089v-2H7.4954c-3.0367-.0065-5.502-2.4802-5.4954-5.5142.0057-2.6569,1.9092-4.9289,4.5259-5.4023l1.3488-.2441.2591-1.3459c.7241-3.7623,4.0386-6.4933,7.8662-6.4935h0c3.7363,0,6.9395,2.5367,7.79,6.169l1.9473-.4561c-1.0635-4.541-5.0674-7.7129-9.7373-7.7129Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" x="0" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
