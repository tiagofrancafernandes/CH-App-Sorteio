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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>snow--scattered--night</title><rect x="2" y="26" width="2" height="2"></rect><rect x="4" y="28" width="2" height="2"></rect><rect x="6" y="30" width="2" height="2"></rect><rect x="6" y="26" width="2" height="2"></rect><rect x="2" y="30" width="2" height="2"></rect><rect x="20" y="26" width="2" height="2"></rect><rect x="22" y="28" width="2" height="2"></rect><rect x="24" y="30" width="2" height="2"></rect><rect x="24" y="26" width="2" height="2"></rect><rect x="20" y="30" width="2" height="2"></rect><rect x="11" y="26" width="2" height="2"></rect><rect x="13" y="28" width="2" height="2"></rect><rect x="15" y="30" width="2" height="2"></rect><rect x="15" y="26" width="2" height="2"></rect><rect x="11" y="30" width="2" height="2"></rect><path d="M29.8439,13.0347a1.517,1.517,0,0,0-1.23-.8658,5.3552,5.3552,0,0,1-3.4095-1.7158,6.4655,6.4655,0,0,1-1.286-6.3926,1.6025,1.6025,0,0,0-.2989-1.5459,1.4543,1.4543,0,0,0-1.36-.4931l-.0191.0039a7.7685,7.7685,0,0,0-5.8847,5.5737A7.3706,7.3706,0,0,0,13.5,7a7.5511,7.5511,0,0,0-7.1494,5.2441A5.9926,5.9926,0,0,0,8,24H19a6.0066,6.0066,0,0,0,6-6c0-.0571-.0123-.1113-.0139-.1685a7.5076,7.5076,0,0,0,4.7611-3.2768A1.5369,1.5369,0,0,0,29.8439,13.0347ZM19,22H8a3.9926,3.9926,0,0,1-.6733-7.9292l.663-.1128.1456-.6562a5.496,5.496,0,0,1,10.7294,0l.1456.6562.6626.1128A3.9925,3.9925,0,0,1,19,22Zm5.5974-6.1289a5.9661,5.9661,0,0,0-3.948-3.627,7.49,7.49,0,0,0-2.489-3.58,5.9018,5.9018,0,0,1,3.6381-4.4473,8.4577,8.4577,0,0,0,1.94,7.5967A7.4007,7.4007,0,0,0,27.64,14.041,5.4487,5.4487,0,0,1,24.5974,15.8711Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
