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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-1" d="M22,28H10a1,1,0,0,1-.8438-.4631l-7-11a1,1,0,0,1,0-1.0738l7-11A1,1,0,0,1,10,4H22a1,1,0,0,1,.8438.4631l7,11a1,1,0,0,1,0,1.0738l-7,11A1,1,0,0,1,22,28ZM10.5488,26H21.4512l6.3633-10L21.4512,6H10.5488L4.1855,16Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M19.5,24h-7a1.0005,1.0005,0,0,1-.8413-.4592l-4.5-7a1.0016,1.0016,0,0,1,0-1.0816l4.5-7A1.0005,1.0005,0,0,1,12.5,8h7a1.0005,1.0005,0,0,1,.8413.4592l4.5,7a1.0016,1.0016,0,0,1,0,1.0816l-4.5,7A1.0005,1.0005,0,0,1,19.5,24Zm-6.4541-2h5.9082l3.8569-6-3.8569-6H13.0459L9.189,16Z" transform="translate(0 0)" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" transform="translate(32 32) rotate(-180)" style="fill: none"></rect></svg>

</template>
