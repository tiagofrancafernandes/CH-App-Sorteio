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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M26,32l-2.1387-1.0117c-1.7383-.8232-2.8613-2.5977-2.8613-4.5205v-6.4678h10v6.4678c0,1.9238-1.123,3.6973-2.8613,4.5195l-2.1387,1.0127Zm-1.2832-2.8203l1.2832,.6074,1.2832-.6074c1.043-.4932,1.7168-1.5576,1.7168-2.7119v-4.4678h-6v4.4678c0,1.1543,.6738,2.2188,1.7168,2.7119h0Z"></path><path d="M17,10.5859c-.3752-.375-.8838-.5859-1.4143-.5859h-5.5857c-1.1045,0-2,.8955-2,2v14c0,1.1045,.8955,2,2,2h9v-2H10V12h4v4c0,1.1045,.8955,2,2,2h4.2917c.6929,0,1.312-.4136,1.5771-1.0537,.2656-.6406,.1201-1.3711-.3701-1.8613l-4.4988-4.499Zm-1,5.4141v-3.5859l3.5852,3.5859h-3.5852Z"></path><path d="M28,6H16l-3.4141-3.4141c-.3752-.375-.8838-.5859-1.4143-.5859H4c-1.1045,0-2,.8955-2,2V24c0,1.1045,.8955,2,2,2h2v-2H4V4h7.1716l4,4h12.8284v10h2V8c0-1.1045-.8955-2-2-2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
