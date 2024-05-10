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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>earth--southeast-asia</title><rect x="14" y="24" width="3" height="2"></rect><rect x="17" y="22" width="2" height="2"></rect><rect x="17" y="18" width="2" height="2"></rect><path d="M16,2A14,14,0,1,0,30,16,14.0158,14.0158,0,0,0,16,2Zm-.603,2.03,2.5073,5.0156L16.3228,13H10.271l-1.41,4.3872,2.8521,2.8521L10.7056,21.751,6.2856,19H4.395A11.9363,11.9363,0,0,1,15.397,4.03ZM5.1055,21h.6089l3.9345,2.4487A1.9912,1.9912,0,0,0,12.37,22.86l1.0078-1.5118a2.005,2.005,0,0,0-.25-2.5234l-1.9887-1.9888L11.729,15h4.5938A1.9906,1.9906,0,0,0,18.18,13.7427L19.7612,9.79a2.0019,2.0019,0,0,0-.0674-1.6382L17.6843,4.1323A11.9592,11.9592,0,0,1,26.8945,21H23a2.0023,2.0023,0,0,0-2,2v3.8945A11.9477,11.9477,0,0,1,5.1055,21ZM23,25.7266V23h2.7268A12.0762,12.0762,0,0,1,23,25.7266Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
