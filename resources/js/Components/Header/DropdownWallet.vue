<script setup lang="ts">
import { onClickOutside } from '@vueuse/core'
import { ref, computed } from 'vue'
import WalletIcon from '@/Components/icons/svg-icons/carbon-icons/Wallet.vue';
import DropdownWalletItem from '@resources/js/Components/Header/DropdownWalletItem.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const target = ref(null)
const dropdownOpen = ref(false)
const keepOpenWalletList = ref(null)
const notifying = ref(true)

console.log('usePage().props.activeWallet', usePage().props);
const userActiveWallet = computed(() => usePage().props.activeWallet || null);
const activeWallet = ref(userActiveWallet.value || null); // WIP

const dropdownOpenHandler = () => {
    return {
        get: () => keepOpenWalletList.value || false,
        set: (value: any) => keepOpenWalletList.value = value,
    }
}

onClickOutside(target, () => {
    dropdownOpen.value = dropdownOpenHandler().get();
})

const walletList = ref([
    {
        uuid: 'f9fc0349-557d-4017-9bad-2f0cf455d0da',
        title: 'Enjoy',
        description: 'My wallet',
        balance: null,
        currency: {
            code: 'BRL',
            sign: '$',
            locale: 'pt-BR',
        },
        time: '12 May, 2025',
        lastUpdate: '12 May, 2025',
    },
    {
        uuid: 'f9fc0349-557d-4017-9bad-2f0cf455d0db',
        title: 'Hobby',
        description: 'My wallet',
        balance: null,
        currency: {
            code: 'USD',
            sign: '$',
            locale: 'pt-BR',
        },
        time: '12 May, 2025',
        lastUpdate: '12 May, 2025',
    },
    {
        uuid: 'f9fc0349-557d-4017-9bad-2f0cf455d0dc',
        title: 'Money maker',
        description: 'My wallet',
        balance: null,
        currency: {
            code: 'USD',
            sign: '$',
            locale: 'pt-BR',
        },
        time: '12 May, 2025',
        lastUpdate: '12 May, 2025',
    },
])

const updateUserWallet = (walletData: any) => {
    if (walletData && walletData.uuid) {
        activeWallet.value = walletData.uuid;
    }
}

const parentHandler = () => {
    return {
        activeWallet: {
            get: () => activeWallet.value,
            set: (value: any) => activeWallet.value = value,
        },
    }
};
</script>

<template>
    <li class="relative" ref="target">
        <button
            type="button"
            class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-primary dark:border-strokedark dark:bg-meta-4 dark:text-white"
            @click.prevent="(dropdownOpen = !dropdownOpen), (notifying = false)"
        >
            <WalletIcon
                className="fill-current duration-300 ease-in-out"
                width="18"
                height="18"
                size="sm"
            />
        </button>

        <!-- Dropdown Start -->
        <div
            v-show="dropdownOpen"
            class="absolute -right-27 mt-2.5 flex max-h-90 w-75 flex-col rounded-lg border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark sm:right-0 sm:w-80"
        >
            <div class="px-4.5 py-3">
                <h5 class="text-sm font-medium text-bodydark2">Wallet <span>{{ dropdownOpen }}</span></h5>
            </div>

            <ul class="flex h-auto flex-col overflow-y-auto">
                <template v-for="(item, index) in walletList" :key="index">
                    <DropdownWalletItem
                        :walletInfo="item"
                        :activeWallet="activeWallet"
                        :keepOpenWalletList="dropdownOpenHandler()"
                        v-on:selected="updateUserWallet"
                        :parentHandler="parentHandler()"
                    />
                </template>
            </ul>
        </div>
        <!-- Dropdown End -->
    </li>
</template>
