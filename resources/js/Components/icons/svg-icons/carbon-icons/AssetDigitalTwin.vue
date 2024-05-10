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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="25" cy="7" r="2"></circle><path d="M12,23a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,12,23Zm0-4a1,1,0,1,0,1,1A1.001,1.001,0,0,0,12,19Z"></path><circle cx="12" cy="14" r="1"></circle><circle cx="17.9088" cy="5.7046" r="1"></circle><circle cx="9.7875" cy="9.9068" r="1"></circle><circle cx="12.4947" cy="8.5061" r="1"></circle><circle cx="15.2014" cy="7.1051" r="1"></circle><circle cx="4.6962" cy="13.1871" r="1"></circle><circle cx="2.1327" cy="21.631" r="1"></circle><circle cx="3.0787" cy="24.5159" r="1"></circle><circle cx="4.8485" cy="26.9824" r="1"></circle><circle cx="7.2722" cy="28.8098" r="1"></circle><circle cx="2.0982" cy="18.5962" r="1"></circle><circle cx="2.9794" cy="15.691" r="1"></circle><circle cx="7.081" cy="11.3081" r="1"></circle><circle cx="20.6162" cy="4.3038" r="1"></circle><circle cx="23.3232" cy="2.9027" r="1"></circle><circle cx="28.9882" cy="8.8898" r="1"></circle><circle cx="27.5868" cy="11.5963" r="1"></circle><circle cx="26.1856" cy="14.3031" r="1"></circle><circle cx="24.7842" cy="17.0101" r="1"></circle><circle cx="23.383" cy="19.7166" r="1"></circle><circle cx="21.982" cy="22.4239" r="1"></circle><circle cx="18.6365" cy="27.4643" r="1"></circle><circle cx="16.0919" cy="29.1215" r="1"></circle><circle cx="13.1661" cy="29.9322" r="1"></circle><circle cx="10.1327" cy="29.8249" r="1"></circle><circle cx="20.5715" cy="25.125" r="1"></circle><circle cx="28.8927" cy="3.2401" r="1"></circle><circle cx="26.1882" cy="2.0041" r="1"></circle><circle cx="12" cy="26" r="1"></circle><circle cx="6" cy="20" r="1"></circle><circle cx="18" cy="20" r="1"></circle><circle cx="6.8038" cy="17" r="1"></circle><circle cx="17.1962" cy="23" r="1"></circle><circle cx="9" cy="25.1962" r="1"></circle><circle cx="15" cy="14.8038" r="1"></circle><circle cx="9" cy="14.8038" r="1"></circle><circle cx="15" cy="25.1962" r="1"></circle><circle cx="6.8038" cy="23" r="1"></circle><circle cx="17.1962" cy="17" r="1"></circle><circle cx="30.0002" cy="6.0256" r="1"></circle><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
