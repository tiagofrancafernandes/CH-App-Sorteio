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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-1" d="M4,12H2V4A2.0021,2.0021,0,0,1,4,2h8V4H4Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M12,30H4a2.0021,2.0021,0,0,1-2-2V20H4v8h8Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M28,30H20V28h8V20h2v8A2.0021,2.0021,0,0,1,28,30Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M30,12H28V4H20V2h8a2.0021,2.0021,0,0,1,2,2Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M16,22a6,6,0,1,1,6-6A6.0067,6.0067,0,0,1,16,22Zm0-10a4,4,0,1,0,4,4A4.0045,4.0045,0,0,0,16,12Z" transform="translate(0 0)" style="fill:currentColor"></path><circle cx="16" cy="16" r="2"></circle><circle cx="16" cy="7" r="1"></circle><circle cx="16" cy="3" r="1"></circle><circle cx="16" cy="25" r="1"></circle><circle cx="16" cy="29" r="1"></circle><circle cx="25" cy="16" r="1"></circle><circle cx="29" cy="16" r="1"></circle><circle cx="7" cy="16" r="1"></circle><circle cx="3" cy="16" r="1"></circle><circle cx="9.636" cy="9.636" r="1"></circle><circle cx="7" cy="7" r="1"></circle><circle cx="22.364" cy="22.364" r="1"></circle><circle cx="25" cy="25" r="1"></circle><circle cx="22.364" cy="9.636" r="1"></circle><circle cx="25" cy="7" r="1"></circle><circle cx="9.636" cy="22.364" r="1"></circle><circle cx="7" cy="25" r="1"></circle><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" transform="translate(32 32) rotate(-180)" style="fill: none"></rect></svg>

</template>
