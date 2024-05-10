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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m16,32c-5.0793,0-9.7449-2.3319-12.7998-6.3979l1.5991-1.2014c2.6736,3.5585,6.7561,5.5994,11.2007,5.5994s8.5281-2.0413,11.2014-5.6005l1.5991,1.2012c-3.0547,4.0668-7.7202,6.3993-12.8005,6.3993Z"></path><path d="m30,22h-5v-2h5v-3h-3c-1.1028,0-2-.8972-2-2v-3c0-1.1028.8972-2,2-2h5v2h-5v3h3c1.1028,0,2,.8972,2,2v3c0,1.1028-.8972,2-2,2Z"></path><path d="m21,22h-4c-1.1028,0-2-.8972-2-2v-8c0-1.1028.8972-2,2-2h4c1.1028,0,2,.8972,2,2v8c0,1.1028-.8972,2-2,2Zm-4-10v8h4v-8h-4Z"></path><polygon points="11.4458 10 7.4458 22 9.5542 22 13.5542 10 11.4458 10"></polygon><polygon points="6 22 0 22 0 19.6973 3.7981 14 0 14 0 12 6 12 6 14.3027 2.2019 20 6 20 6 22"></polygon><path d="m16.0001,0C10.9207,0,6.2552,2.3319,3.2003,6.3979l1.5991,1.2014c2.6736-3.5585,6.7561-5.5994,11.2007-5.5994s8.5281,2.0413,11.2014,5.6005l1.5991-1.2012C25.7459,2.3325,21.0804,0,16.0001,0Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
