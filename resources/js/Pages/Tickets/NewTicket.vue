<script setup lang="js">
import { Head, Link } from '@inertiajs/vue3';
import { generateRandomString } from '@/Helpers/string/index';
import { useSelectedTicket } from '@/stores/selectedTicketStore';
import * as ObjectHelpers from '@/Helpers/object/object-helpers';
import * as StringHelpers from '@/Libs/Helpers/StringHelpers';
import { dataGet } from '@/Helpers/object/object-helpers';

import BasicTooltip from '@/Components/Tooltips/BasicTooltip.vue';
import CustomSelect from '@/Components/custom-html/CustomSelect.vue'
import Card from '@/Components/laravel/Card.vue'
import ModalBottomDrawer from '@/Components/Modals/ModalBottomDrawer.vue';
import UserIcon from '@/Components/icons/svg-icons/heroicons/MUser.vue'
import MPlus from '@/Components/icons/svg-icons/heroicons/MPlus.vue'
import UserGroup from '@/Components/icons/svg-icons/heroicons/MUserGroup.vue'
import CurrencyDollar from '@/Components/icons/svg-icons/carbon-icons/CurrencyDollar.vue'
import PercentageFilled from '@resources/js/Components/icons/svg-icons/carbon-icons/PercentageFilled.vue'
import UpToTop from '@resources/js/Components/icons/svg-icons/carbon-icons/UpToTop.vue'
import ArrowUpRight from '@resources/js/Components/icons/svg-icons/carbon-icons/ArrowUpRight.vue'
import ArrowUp from '@resources/js/Components/icons/svg-icons/carbon-icons/ArrowUp.vue'
import ArrowDown from '@resources/js/Components/icons/svg-icons/carbon-icons/ArrowDown.vue'
import Filter from '@resources/js/Components/icons/svg-icons/carbon-icons/Filter.vue'
import { computed, ref, onBeforeMount } from 'vue';

const props = defineProps({
    ticketGroupList: {
        type: Object,
    },
    userWalletList: {
        type: Object,
    },
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    pageTitle: {
        type: String,
    },
    pageSubtitle: {
        type: String,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const pageTitle = computed(() => props?.pageTitle || 'Buy new ticket');
const pageSubtitle = computed(() => props?.pageSubtitle || '');

let {
    selectedTicketBuildQuery,
    selectedTicketCurrency,
    removeSelectedTicketBuildQuery,
    setSelectedTicketBuildQuery,
    setSelectedTicketCurrency,
    removeSelectedTicketCurrency,
    setSelectedTicket,
    clearTicketAllSelections,
    sortTicketsBy,
    setSortTicketsBy,
    removeSortTicketsBy,
} = useSelectedTicket();

let sortBy = ref(sortTicketsBy || null);
let preFilter = ref(sortBy.value || null);
let showAdvancedFilter = ref(true);
let showOrderDetail = ref(false);
let showRefreshWalletListButton = ref(true);
let groupSelectionMode = ref('random_group');
let selectedGroup = ref(null);
let preSelectedGroup = ref(null);
let showGroupRequestPassModal = ref(false);
let groupRequestPassModalError = ref('Erro exemplo');
let selectedGroupProtectedPass = ref(null);

const setPreFilter = (type = null) => {
    preFilter.value = type;

    if (!type) {
        removeSortTicketsBy();
        return;
    }

    setSortTicketsBy(type);
};

let cartCollapsed = ref(false);
const cartCollapseHandle = (collapsed = null) => {
    cartCollapsed.value = Boolean(collapsed);
    console.log('cartCollapseHandle collapsed', cartCollapsed.value);
}

let selectedPriceItemHash = ref(null);
let selectedPriceItem = ref(null);
let loadingWalletList = ref(false);
let userWalletList = ref(props?.userWalletList || []);

let loadingRaffleGroupList = ref(false);
let showRefreshRaffleGroupListButton = ref(true);
let availableRaffleGroupList = ref([]);

const walletsForCurrency = computed(() => {
    let walletList = userWalletList.value;
    let currencyToFilter = dataGet(selectedPriceItem.value ?? {}, 'currency');
    console.log('currencyToFilter', currencyToFilter, selectedPriceItem.value);
    walletList = Array.isArray(userWalletList.value) ? walletList : [];

    if (!currencyToFilter) {
        return [];
    }

    return ObjectHelpers.filterWhere(
        walletList,
        'currency.code',
        'ilike',
        currencyToFilter
    );
});

const removeSelectedPriceItem = () => {
    selectedPriceItem.value = null;
    selectedPriceItemHash.value = '';
    availableRaffleGroupList.value = [];
    groupSelectionMode.value = 'random_group';
    selectedGroup.value = null;
    preSelectedGroup.value = null;
    showGroupRequestPassModal.value = false;
    selectedGroupProtectedPass.value = null;
}

const cancelGroupRequestPass = () => {
    showGroupRequestPassModal.value = false;
}

const confirmGroupRequestPass = async () => { // WIP
    if (showGroupRequestPassModal.value && !selectedGroupProtectedPass.value) {
        groupRequestPassModalError.value = 'Pass code is required!';
        console.log(groupRequestPassModalError.value);
        return;
    }

    let groupId = '123';// TODO: usar id|uid valido

    let requestUrl = route('api.group.check_pass', groupId);

    const response = await fetch(requestUrl, {// TODO: remover. Usar requisição real de validação de senha e retornar token
        method: 'POST',
        headers: {
            'accept': 'application/json',
            'content-type': 'application/json',
            'Authorization': 'Bearer xyz1234',
        },
        body: JSON.stringify({
            a: 'AAAA',
            pass_code: selectedGroupProtectedPass.value,
            groupId,
        }),
    });

    if (!response || !response.ok) {
        groupRequestPassModalError.value = 'An error has occurred!';
        // return;
    }

    let data = await response.json();

    console.log('data+', data);

    if (!data || typeof data !== 'object') {
        groupRequestPassModalError.value = 'An error has occurred!';
        return;
    }

    if ('error' in data && data['error'] && typeof(data['error']) === 'string') {
        groupRequestPassModalError.value = data['error'];
        return;
    }

    let passCodeTokenKey = 'token'; // TODO: mudar para um token válido retornado da API

    if (!(passCodeTokenKey in data)) {
        groupRequestPassModalError.value = 'An error has occurred! Inválid pass code token!';
        return;
    }

    selectedGroupProtectedPass.value = data[passCodeTokenKey] ?? null;

    if (!selectedGroupProtectedPass.value) {
        selectedGroupProtectedPass.value = null;
        showGroupRequestPassModal.value = true;
        return;
    }

    showGroupRequestPassModal.value = false;

    selectedGroup.value = preSelectedGroup.value;
    preSelectedGroup.value = null;
}

const selectGroup = (raffleGroup) => { // WIP
    groupRequestPassModalError.value = null;
    selectedGroupProtectedPass.value = null;
    selectedGroup.value = null;
    preSelectedGroup.value = null;
    console.log('raffleGroup', raffleGroup);
    showGroupRequestPassModal.value = Boolean(raffleGroup?.password_required);

    if (showGroupRequestPassModal.value && selectedGroupProtectedPass.value === null) {
        preSelectedGroup.value = raffleGroup;
        return;
    }

    selectedGroup.value = raffleGroup;
    preSelectedGroup.value = null;
}

const showSelectedItem = computed(() => {
    return selectedPriceItem.value &&
    selectedPriceItemHash.value;
})

const cancelSelectedItem = (event = null) => {
    removeSelectedPriceItem();
    console.log(
        'selectedPriceItem', selectedPriceItem.value,
        'selectedPriceItemHash', selectedPriceItemHash.value,
        'availableRaffleGroupList', availableRaffleGroupList.value,

        'selectedGroup', selectedGroup.value,
        'preSelectedGroup', preSelectedGroup.value,
    );
}

const closingHandle = (eventData) => {
    console.log('closingHandle', eventData);
    cancelSelectedItem();
}

const setSelectedPriceItem = (priceItem = null) => {
    if (!priceItem) {
        return;
    }

    if (selectedPriceItemHash.value && selectedPriceItemHash.value === priceItem?.hash) {
        removeSelectedPriceItem();
        clearTicketAllSelections();
        return;
    }

    setSelectedTicketBuildQuery(priceItem?.buildQuery);
    setSelectedTicketCurrency(priceItem.currency);

    let currencyFmt = StringHelpers.asCurrency(priceItem.currency);

    selectedPriceItem.value = {
        ...priceItem,
        prize_fmt: currencyFmt && priceItem.prize ? currencyFmt.format(priceItem.prize) : priceItem.prize,
        amountStr_fmt: currencyFmt && priceItem.amountStr ? currencyFmt.format(priceItem.amountStr) : priceItem.amountStr,
        admFee_fmt: currencyFmt && priceItem.admFee ? currencyFmt.format(priceItem.admFee) : priceItem.admFee,
    };
    refreshRaffleGroupList();

    let data = JSON.parse(JSON.stringify(priceItem));
    selectedPriceItemHash.value = priceItem?.hash;
};

const getItemFromTicketGroupListBy = (compareKey, value) => {
    props?.ticketGroupList?.find(item => item && item[compareKey] === value)
}

onBeforeMount(() => {
    let selectedFromStore = ObjectHelpers.findWhere(
        props?.ticketGroupList?.all,
        'buildQuery',
        '==',
        selectedTicketBuildQuery
    );

    if (!selectedPriceItem.value && selectedFromStore) {
        setSelectedPriceItem(selectedFromStore);
    }
});

let probabilityOptions = {
    label: 'probability',
    emptyOption: 'No filter',
    defaultValue:  null,
    options: [
        {
            value:'0.10',
            label: '10%',
        },
        {
            value:'0.5',
            label: '5%',
        },
        {
            value:'0.25',
            label: '2.5%',
        },
    ]
};

let prizeOptions = {
    label: 'prize',
    emptyOption: 'No filter',
    defaultValue:  null,
    options: [
        {
            value: '20.00',
            label: 'R$ 20,00',
        },
        {
            value: '50.00',
            label: 'R$ 50,00',
        },
        {
            value: '50.00',
            label: 'R$ 50,00',
        },
        {
            value: '100.00',
            label: 'R$ 100,00',
        },
        {
            value: '105.00',
            label: 'R$ 150,00',
        },
    ]
};

let priceOptions = {
    label: 'price',
    emptyOption: 'No filter',
    defaultValue:  null,
    options: [
        {
            value: '2.00',
            label: 'R$ 2,00',
        },
        {
            value: '5.00',
            label: 'R$ 5,00',
        },
        {
            value: '5.00',
            label: 'R$ 5,00',
        },
        {
            value: '10.00',
            label: 'R$ 10,00',
        },
        {
            value: '15.00',
            label: 'R$ 15,00',
        },
    ]
};

let fakePriceList = ([
    {
        maximumNumberOfParticipants: 10,
        currency: 'BRL',
        prize: '25.00',
        probability: "0.100",
        probabilityInPercent: "10.00",
        probabilityAsStr: "0.100",
        probabilityAsText: "A probabilidade de ser sorteado é de 1 pra 10 (0.100) ou 10.00%",
        admFee: 5.00,
        amount: 5,
        amountStr: "5.00",
    },
    {
        maximumNumberOfParticipants: 10,
        currency: 'BRL',
        prize: '17.5',
        probability: "0.100",
        probabilityInPercent: "10.00",
        probabilityAsStr: "0.100",
        probabilityAsText: "A probabilidade de ser sorteado é de 1 pra 10 (0.100) ou 10.00%",
        admFee: 2.5,
        amount: 2,
        amountStr: "2.00",
    }
]);

let computedPriceList = computed(() => {
    if (
            !preFilter.value
            || !props?.ticketGroupList?.filtered
    ) {
        return props?.ticketGroupList['all'] ?? [];
    }

    if (!(preFilter.value in props?.ticketGroupList?.filtered)) {
        return [];
    }

    return (props?.ticketGroupList?.filtered[`${preFilter?.value}`] ?? []);
})

const filterCardColSpan = [
    'col-span-4 sm:col-span-2 md:col-span-2 xl:col-span-1 mb-2 lg:mb-3',
]

const refreshWalletList = async () => {
    loadingWalletList.value = true;
    showRefreshWalletListButton.value = false;
    setTimeout(() => {
        showRefreshWalletListButton.value = true;
    }, 5000);

    let requestBody = ({
        //
    });

    fetch(
        route('api.wallet.list'),
        {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(requestBody),
        }
    )
        ?.then(response => {
            if (!response || !response.ok) {
                console.log('Error', response);
                return null;
            }

            return response?.json();
        })
        ?.then(data => {
            loadingWalletList.value = false;

            if (!data || typeof data !== 'object' || data?.success === false) {
                throw `Fail on get wallet list`;
            }

            let walletsFromResponse = dataGet(data, 'wallets');

            if (!walletsFromResponse || !Array.isArray(walletsFromResponse)) {
                return;
            }

            userWalletList.value = walletsFromResponse;

            console.log('wallets', Array.isArray(walletsFromResponse), walletsFromResponse,);
        })
        ?.catch(error => {
            loadingWalletList.value = false;
            console.error(error);
        })
        ?.finally(() => {
            loadingWalletList.value = false;
        });
}

const refreshRaffleGroupList = async () => {
    loadingRaffleGroupList.value = true;
    showRefreshRaffleGroupListButton.value = false;
    setTimeout(() => {
        showRefreshRaffleGroupListButton.value = true;
    }, 5000);

    let itemInfo = selectedPriceItem.value || {};

    let requestBody = ({
        get item() {
            if (!Object.keys(itemInfo).length) {
                return null;
            }

            let {
                currency,
                amount,
                maximumNumberOfParticipants,
            } = itemInfo || {};

            return {
                currency,
                amount,
                slots: maximumNumberOfParticipants,
            }
        },
        get page() {
            return 1;
        },
        get limit() {
            return 20;
        },
    });

    fetch(
        route('api.raffle_group.list', itemInfo?.currency),
        {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(requestBody),
        }
    )
        ?.then(response => {
            if (!response || !response.ok) {
                console.log('Error', response);
                return null;
            }

            return response?.json();
        })
        ?.then(data => {
            loadingRaffleGroupList.value = false;

            if (!data || typeof data !== 'object' || data?.success === false) {
                throw `Fail on get RaffleGroup list`;
            }

            let raffleGroupsFromResponse = dataGet(data, 'raffleGroups');

            if (!raffleGroupsFromResponse || !Array.isArray(raffleGroupsFromResponse)) {
                return;
            }

            availableRaffleGroupList.value = raffleGroupsFromResponse;

            console.log('RaffleGroups', Array.isArray(raffleGroupsFromResponse), raffleGroupsFromResponse,);
        })
        ?.catch(error => {
            loadingRaffleGroupList.value = false;
            console.error(error);
        })
        ?.finally(() => {
            loadingRaffleGroupList.value = false;
        });
}

const slotsFormat = (slotsData) => {
    if (
        !slotsData
        || (typeof slotsData !== 'object')
        || Array.isArray(slotsData)
    ) {
        return null;
    }

    let {freeSlots, slots} = slotsData || {};
    freeSlots = freeSlots-0;
    slots = slots-0;

    return [slots - freeSlots, slots].join('/');
}

const formatMoney = (value, currency) => {
    value = value -0;

    if (isNaN(value)) {
        return null;
    }

    if (!currency || !['string', 'object'].includes(typeof currency)) {
        return `${value}`;
    }

    if (typeof currency === 'object') {
        currency = currency.hasOwnProperty('code') ? currency['code'] : null;
    }

    if (!currency || typeof currency !== 'string') {
        return `${value}`;
    }

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency,
    });

    return formatter.format(value);
}
</script>

<template>
    <Head :title="pageTitle" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div
            v-if="canLogin"
            class="sm:fixed sm:top-0 sm:right-0 p-6 text-right"
            :class="'fixed top-0 z-10 bg-gray-200 dark:bg-gray-900 rounded-br-lg md:rounded-bl-lg'"
        >
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >Dashboard</Link>

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Log in</Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Register</Link>
            </template>
        </div>

        <div class="max-w-full mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <svg
                    viewBox="0 0 62 65"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-16 w-auto bg-gray-100 dark:bg-gray-900"
                >
                    <path
                        d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                        fill="#FF2D20"
                    />
                </svg>
            </div>

            <div class="mt-4 max-w-7xl mx-auto p-4">
                <div class="grid grid-cols-12 gap-1 lg:gap-2">
                    <Card
                        id="advanced-filter"
                        titleIsHtml
                        class="col-span-12 p-4 mb-4"
                    >
                        <template #headerIcon>
                            <Filter
                                class="text-red-500"
                                size="8"
                            />
                        </template>

                        <template #title>
                            <div class="grid grid-cols-6">
                                <div class="col-span-6 md:col-span-4">
                                    <h2
                                        class="mt-0 mb-2 text-md text-center font-semibold text-gray-900 dark:text-white"
                                    >Advanced filter</h2>
                                </div>

                                <div
                                    class="col-span-6 md:col-span-2 text-right mr-1 mt-1"
                                >
                                    <div class="flex items-center justify-end">
                                        <button
                                            @click="showAdvancedFilter = !showAdvancedFilter" class="bg-blue-500 text-white px-4 py-2 rounded">
                                            {{ showAdvancedFilter ? 'Hide' : 'Show' }} advanced filter
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>

                        <template #body>
                            <transition name="fade">
                                <div v-show="showAdvancedFilter">
                                    <div
                                        class="flex items-center justify-between mt-4">
                                        <p class="font-medium">Filters</p>

                                        <button
                                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md dark:bg-gray-400"
                                        >
                                            Reset Filter
                                        </button>
                                    </div>

                                    <div>
                                        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
                                            <CustomSelect
                                                class="w-full"
                                                id="filter_by_price"
                                                :emptyOption="priceOptions.emptyOption"
                                                :options="priceOptions.options"
                                                :label="priceOptions.label"
                                                @change="console.log"
                                            />

                                            <CustomSelect
                                                class="w-full"
                                                id="filter_by_prize"
                                                :emptyOption="prizeOptions.emptyOption"
                                                :options="prizeOptions.options"
                                                :label="prizeOptions.label"
                                                @change="console.log"
                                            />

                                            <CustomSelect
                                                class="w-full"
                                                id="filter_by_probability"
                                                :emptyOption="probabilityOptions.emptyOption"
                                                :options="probabilityOptions.options"
                                                :label="probabilityOptions.label"
                                                @change="console.log"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </template>
                    </Card>

                    <div
                        class="col-span-12"
                    >
                        <div class="grid grid-cols-4 gap-4 gap-y-3 justify-center">
                            <div class="col-span-4">
                                <h2 class="text-gray-100">Sort by: {{preFilter}}</h2>
                            </div>

                            <div class="col-span-4">
                                <button
                                    type="button"
                                    @click="showOrderDetail = !showOrderDetail"
                                >Show/hide sort detail</button>
                            </div>

                            <div :class="filterCardColSpan">
                                <Card
                                    titleClass="text-center"
                                    class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                                    :class="{
                                        'shadow shadow-red-400': preFilter == 'morePrize'
                                    }"
                                    @click="setPreFilter('morePrize')"
                                >
                                    <template #headerIcon>
                                        <ArrowUp
                                            class="text-red-500"
                                            size="md"
                                        />
                                        <CurrencyDollar
                                            class="text-red-500"
                                            size="lg"
                                        />
                                    </template>

                                    <template #title>
                                        Highest prizes
                                    </template>

                                    <template #body>
                                        <div
                                            class="text-justify mt-4 p-1"
                                            v-show="showOrderDetail"
                                        >
                                            <p><strong>Itens com maiores prêmios.</strong></p>
                                            <p>Normalmente esses itens com maiores pagamentos, tem grande concorrência, ou seja, tem mior quantidade de pessoas concorrendo pelo prêmio.</p>
                                            <p>Uma sugestão seria que busque itens com maiores prêmios mas que tenha também menos concorrencia assim aumentam suas chances ;-).</p>
                                        </div>
                                    </template>
                                </Card>
                            </div>

                            <div :class="filterCardColSpan">
                                <Card
                                    titleClass="text-center"
                                    class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                                    :class="{
                                        'shadow shadow-red-400': preFilter == 'highChance'
                                    }"
                                    @click="setPreFilter('highChance')"
                                >
                                    <template #headerIcon>
                                        <ArrowUp
                                            class="text-red-500"
                                            size="sm"
                                        />
                                        <PercentageFilled
                                            class="text-red-500"
                                            size="md"
                                        />
                                    </template>

                                    <template #title>
                                        High chance
                                    </template>

                                    <template #body>
                                        <div
                                            class="text-justify mt-4 p-1"
                                            v-show="showOrderDetail"
                                        >
                                            <p><strong>Maiores chances</strong></p>
                                            <p>Esses itens possuem por característica uma menor quantidade de pessoas concorrendo entre si pelo prêmio, aumentando assim suas chances de ganhar.</p>
                                            <p>Como tem menos pessoas, o prêmio tende a ser menor. Se fosse te dar uma sugestão seria que tente ver uma junção de "maior chance" e "maior prêmio".</p>
                                        </div>
                                    </template>
                                </Card>
                            </div>

                            <div :class="filterCardColSpan">
                                <Card
                                    titleClass="text-center"
                                    class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                                    :class="{
                                        'shadow shadow-red-400': preFilter == 'highChanceAndMorePrize'
                                    }"
                                    @click="setPreFilter('highChanceAndMorePrize')"
                                >
                                    <template #headerIcon>
                                        <CurrencyDollar
                                            class="text-red-500"
                                            size="md"
                                        />

                                        <MPlus
                                            class="text-red-500"
                                            size="sm"
                                        />

                                        <PercentageFilled
                                            class="text-red-500"
                                            size="md"
                                        />
                                    </template>

                                    <template #title>
                                        Highest prizes with high chances
                                    </template>

                                    <template #body>
                                        <div
                                            class="text-justify mt-4 p-1"
                                            v-show="showOrderDetail"
                                        >
                                            <p><strong>Maiores prêmios com maiores chances de ganhar</strong>.</p>
                                            <p>Aqui ordenaremos de forma a te apresentar primeiro os itens com maiores prêmios porém com menos participantes.</p>
                                            <p>Menos participantes siginica <strong>mais chances de ganhar</strong>.</p>
                                        </div>
                                    </template>
                                </Card>
                            </div>

                            <div :class="filterCardColSpan">
                                <Card
                                    titleClass="text-center"
                                    class="cursor-pointer motion-safe:hover:scale-110 relative hover:z-40"
                                    :class="{
                                        'shadow shadow-red-400': preFilter == 'lessCompetition'
                                    }"
                                    @click="setPreFilter('lessCompetition')"
                                >
                                    <template #headerIcon>
                                        <ArrowDown
                                            class="text-red-500"
                                            size="md"
                                        />
                                        <UserGroup
                                            class="text-red-500"
                                            size="lg"
                                        />
                                    </template>

                                    <template #title>
                                        Less competition
                                    </template>

                                    <template #body>
                                        <div
                                            class="text-justify mt-4 p-1"
                                            v-show="showOrderDetail"
                                        >
                                            <p><strong>Menos concorrência</strong>.</p>
                                            <p>Aqui ordenaremos de forma a te apresentar primeiro os itens com menor número de participantes.</p>
                                            <p>Menos participantes siginifica <strong>mais chances de ganhar</strong>.</p>
                                        </div>
                                    </template>
                                </Card>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 md:grid-cols-12 sm:grid-cols-12 gap-3 lg:gap-4">
                    <div class="col-span-12 mt-4 pt-4 mb-2">
                        <h2 class="text-lg text-gray-100 w-full">
                            Types and prices
                        </h2>
                    </div>

                    <template
                        v-for="(priceItem, priceItem_index) in computedPriceList"
                        :key="priceItem_index"
                    >
                        <Card
                            colSpan="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3"
                            titleClass="text-center"
                            class="shadow-md cursor-pointer motion-safe:hover:scale-[1.2] relative hover:z-40"
                            :class="{
                                'hover:shadow-gray-400 dark:hover:shadow-gray-600/50': selectedPriceItemHash !== priceItem?.hash,
                                'shadow shadow-red-400': selectedPriceItemHash === priceItem?.hash,
                            }"
                            @click="setSelectedPriceItem(priceItem)"
                            v-bind:data-for-name="'priceItem'"
                        >
                            <template #title>
                                R$ {{ priceItem.amountStr }}
                            </template>

                            <template #body>
                                <table
                                    class="w-full"
                                >
                                    <tbody>
                                        <tr class="pl-2">
                                            <th class="text-left">
                                                <CurrencyDollar
                                                    class="text-red-500"
                                                    size="md"
                                                />
                                            </th>
                                            <td class="text-right">
                                                {{ priceItem.prize }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1">
                                                <PercentageFilled
                                                    class="text-red-500"
                                                    size="5"
                                                />
                                            </th>
                                            <td class="text-right" >
                                                {{ Number(priceItem.probabilityInPercent*100).toFixed(2).replace(/\.?0+$/, '') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1">
                                                <UserGroup
                                                    class="text-red-500"
                                                    size="sm"
                                                />
                                            </th>
                                            <td class="text-right" >
                                                {{ priceItem.maximumNumberOfParticipants }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </template>
                        </Card>
                    </template>
                </div>
            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a
                            href="https://github.com/sponsors/taylorotwell"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                                />
                            </svg>
                            Sponsor
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>

    <template v-if="showSelectedItem">
        <ModalBottomDrawer
            :show="showSelectedItem"
            v-on:closing="closingHandle"
            :_showCloseButton="false"
            :collapseHandle="cartCollapseHandle"
            :collapsed="cartCollapsed"
        >
            <template v-slot:title>Payment</template>

            <div
                :class="[
                    'grid-cols-12 gap-y-3 gap-x-4 place-content-stretch',
                    {
                        grid: !cartCollapsed,
                        hidden: cartCollapsed,
                    }
                ]"
            >
                <div class="col-span-2" v-if="false">
                    <template
                        v-if="selectedPriceItem"
                    >
                        <div class="w-full">
                            <h2 class="ml-4 inline-flex items-center text-base text-gray-500 dark:text-gray-400">Selected item</h2>
                        </div>

                        <Card
                            titleClass="text-center"
                            class="mx-4 my-2"
                        >
                            <template #title>
                                R$ {{ selectedPriceItem?.amountStr }}
                            </template>

                            <template #body>
                                <table
                                    class="w-full"
                                >
                                    <tbody>
                                        <tr class="pl-2">
                                            <th class="text-left">
                                                <CurrencyDollar
                                                    class="text-red-500"
                                                    size="md"
                                                />
                                            </th>
                                            <td class="text-right">
                                                {{ selectedPriceItem?.prize }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1">
                                                <PercentageFilled
                                                    class="text-red-500"
                                                    size="5"
                                                />
                                            </th>
                                            <td class="text-right" >
                                                {{ Number(selectedPriceItem.probabilityInPercent*100).toFixed(2).replace(/\.?0+$/, '') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="pl-1">
                                                <UserGroup
                                                    class="text-red-500"
                                                    size="sm"
                                                />
                                            </th>
                                            <td class="text-right" >
                                                {{ selectedPriceItem?.maximumNumberOfParticipants }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </template>
                        </Card>
                    </template>
                </div>

                <div class="col-span-2">
                    <div
                        v-if="selectedPriceItem"
                        class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full"
                    >
                        <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">Selected item</p>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <pre v-if="false">{{ selectedPriceItem }}</pre>
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-600 dark:text-gray-100">Places</dt>
                                        <dd class="text-semibold font-medium text-gray-900 dark:text-gray-100">{{ selectedPriceItem?.maximumNumberOfParticipants }}</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-600 dark:text-gray-100">Probability of winning</dt>
                                        <dd class="text-semibold font-medium text-gray-900 dark:text-gray-100">{{ Number(selectedPriceItem.probabilityInPercent*100).toFixed(2).replace(/\.?0+$/, '') }}%</dd>
                                    </dl>

                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-lg font-normal text-yellow-500 dark:text-yellow-600">Prize</dt>
                                        <dd class="text-lg font-semibold text-yellow-500 dark:text-yellow-600">{{ selectedPriceItem?.prize_fmt }}</dd>
                                    </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-xl font-bold text-gray-50 dark:text-gray-50">Price</dt>
                                    <dd class="text-xl font-bold text-green-600">{{ selectedPriceItem?.amountStr_fmt }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-5">
                    <div class="flex mb-3">
                        <div class="flex items-center me-4">
                            <input
                                id="random_group"
                                type="radio"
                                value="random_group"
                                name="group_selection_mode"
                                v-model="groupSelectionMode"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            >
                            <label
                                for="random_group"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >
                                Random group
                            </label>
                        </div>

                        <div class="flex items-center me-4">
                            <input
                                id="select_a_group"
                                type="radio"
                                value="selected_group"
                                name="group_selection_mode"
                                v-model="groupSelectionMode"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                            >
                            <label
                                for="select_a_group"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                            >
                                Select a group
                            </label>
                        </div>
                    </div>

                    <div
                        class="w-full"
                    >
                        <div
                            class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between mb-2"
                        >
                            <div>
                                <div class="w-full p-0">
                                    <p
                                        class="mb-3 italic text-xs text-gray-500 dark:text-gray-400"
                                    >
                                        If no group is selected or if the selected group exceeds the limit, a random group will be assigned.
                                        Know more <a href="#" class="text-blue-600 underline font-medium dark:text-blue-500 hover:no-underline">here</a>.
                                    </p>
                                </div>

                                <div v-show="groupSelectionMode === 'selected_group'">
                                    <pre v-if="false">{{ selectedGroup?.uid }}</pre>

                                    <div class="flex gap-x-2">
                                        <h5 v-if="selectedGroup">Selected group: <span class="mr-2 text-white">{{ selectedGroup?.uid }}</span>
                                        <span class="bg-gray-300 dark:bg-white px-2 py-0 text-center rounded-full select-none">i</span></h5>
                                    </div>
                                </div>
                            </div>

                            <div
                                v-show="groupSelectionMode === 'selected_group'"
                                class="w-full flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-end p-0 gap-x-3"
                            >
                                <button type="button" class="btn-primary-md rounded-lg" v-on:click="refreshRaffleGroupList">Refresh</button>
                                <label for="group-table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input type="text" id="group-table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for group">
                                </div>
                            </div>
                        </div>

                        <div
                            v-show="groupSelectionMode === 'selected_group'"
                            class="w-full overflow-y-auto --h-80 mb-2 rounded-md border-[0.05rem] border-gray-500"
                            style="max-height: calc(var(--custom-height) - 15.5rem);"
                        >
                            <div class="relative shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded">
                                    <thead
                                        :class="['sticky top-0 text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-950 dark:text-gray-400']"
                                    >
                                        <tr class="">
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <div></div>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Group UID
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Slots
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Currency
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Price
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        :class="[
                                            'rounded',
                                            'w-full',
                                            'overflow-y-auto',
                                            //'h-72',
                                            'h-full',
                                            'bg-white',
                                            'dark:bg-gray-800',
                                            'dark:highlight-white/5',
                                            'shadow-lg',
                                            'ring-0',
                                            'ring-black/5',
                                            // 'flex',
                                            // 'flex-col',
                                            // 'divide-y dark:divide-slate-200/5',
                                        ]"
                                    >
                                        <template
                                            v-for="(raffleGroup, dataItemIndex) in availableRaffleGroupList"
                                            :key="dataItemIndex"
                                        >
                                            <tr
                                                :class="[
                                                    // 'bg-white dark:bg-gray-800',
                                                    'border-b dark:border-gray-700',
                                                    'h-8',
                                                    {
                                                        'hover:bg-gray-50 dark:hover:bg-gray-900': selectedGroup?.uid !== raffleGroup?.uid,
                                                        'bg-gray-200': selectedGroup?.uid === raffleGroup?.uid,
                                                        'dark:bg-gray-500': selectedGroup?.uid === raffleGroup?.uid,
                                                    }
                                                ]"
                                            >
                                                <td class="w-4 px-0 py-0">
                                                    <div class="flex items-center px-4 py-0">
                                                        <div class="inline-flex items-center gap-x-1 text-center ">
                                                            <span v-if="raffleGroup.premium" title="Premium">
                                                                <svg class="size-4 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5M8.16 4.1a.178.178 0 0 0-.32 0l-.634 1.285a.18.18 0 0 1-.134.098l-1.42.206a.178.178 0 0 0-.098.303L6.58 6.993c.042.041.061.1.051.158L6.39 8.565a.178.178 0 0 0 .258.187l1.27-.668a.18.18 0 0 1 .165 0l1.27.668a.178.178 0 0 0 .257-.187L9.368 7.15a.18.18 0 0 1 .05-.158l1.028-1.001a.178.178 0 0 0-.098-.303l-1.42-.206a.18.18 0 0 1-.134-.098z"/>
                                                                </svg>
                                                            </span>

                                                            <span v-if="!raffleGroup.owner">
                                                                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                                                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855q-.215.403-.395.872c.705.157 1.472.257 2.282.287zM4.249 3.539q.214-.577.481-1.078a7 7 0 0 1 .597-.933A7 7 0 0 0 3.051 3.05q.544.277 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9 9 0 0 1-1.565-.667A6.96 6.96 0 0 0 1.018 7.5zm1.4-2.741a12.3 12.3 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332M8.5 5.09V7.5h2.99a12.3 12.3 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.6 13.6 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696q.18.469.395.872c.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a7 7 0 0 1-.598-.933 9 9 0 0 1-.481-1.079 8.4 8.4 0 0 0-1.198.49 7 7 0 0 0 2.276 1.522zm-1.383-2.964A13.4 13.4 0 0 1 3.508 8.5h-2.49a6.96 6.96 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667m6.728 2.964a7 7 0 0 0 2.275-1.521 8.4 8.4 0 0 0-1.197-.49 9 9 0 0 1-.481 1.078 7 7 0 0 1-.597.933M8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855q.216-.403.395-.872A12.6 12.6 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.96 6.96 0 0 0 14.982 8.5h-2.49a13.4 13.4 0 0 1-.437 3.008M14.982 7.5a6.96 6.96 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461q.266.502.482 1.078a8.4 8.4 0 0 0 1.196-.49 7 7 0 0 0-2.275-1.52c.218.283.418.597.597.932m-.488 1.343a8 8 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z"/>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-0 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ raffleGroup.uid }}
                                                </td>
                                                <td class="px-6 py-0">
                                                    {{ slotsFormat(raffleGroup?.slots) }}
                                                </td>
                                                <td class="px-6 py-0">
                                                    {{ raffleGroup?.currency?.code || raffleGroup?.currency || '' }}
                                                </td>
                                                <td class="px-6 py-0">
                                                    {{ formatMoney(raffleGroup?.price, raffleGroup?.currency) }}
                                                </td>
                                                <td class="px-6 py-0 inline-flex gap-x-1">
                                                    <button
                                                        type="button"
                                                        :disabled="selectedGroup?.uid === raffleGroup?.uid"
                                                        v-on:click="selectGroup(raffleGroup)"
                                                        class="font-medium text-blue-600 dark:text-blue-400 hover:underline"
                                                    >Select</button>
                                                    <span v-if="!raffleGroup.password_required" title="NoPass">
                                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2M3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1z"/>
                                                        </svg>
                                                    </span>
                                                    <span v-else title="Pass code required">
                                                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                                                        </svg>
                                                    </span>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                    <tfoot class="sticky bottom-0 text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                                        <tr>
                                            <td colspan="100%" class="w-full px-8 py-1">
                                                <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between __pt-4" aria-label="Table navigation">
                                                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                                                    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                                        <li>
                                                            <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                                                        </li>
                                                        <li>
                                                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div
                                tabindex="-1"
                                class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex bg-[#000000ea]"
                                aria-modal="true"
                                role="dialog"
                                v-show="showGroupRequestPassModal"
                            >
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Protected Group
                                            </h3>
                                            <button
                                                type="button"
                                                v-on:click="cancelGroupRequestPass"
                                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            >
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"></path>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5">
                                            <div class="space-y-4" action="#">
                                                <div class="text-sm font-semibold text-orange-400 dark:text-orange-300">
                                                    <h6>
                                                        This group is protected.
                                                    </h6>
                                                    <h6>
                                                        To select this, please put the pass code.
                                                    </h6>
                                                </div>

                                                <div>
                                                    <label
                                                        for="group_passcode"
                                                        :class="[
                                                            'block mb-2 text-sm font-medium',
                                                            {
                                                                'text-red-700 dark:text-red-500': groupRequestPassModalError,
                                                                'text-gray-900 dark:text-white': !groupRequestPassModalError,
                                                            }
                                                        ]"
                                                    >Pass code</label>
                                                    <input
                                                        type="password"
                                                        id="group_passcode"
                                                        placeholder="Group pass code"
                                                        v-model="selectedGroupProtectedPass"
                                                        :class="[
                                                            'text-sm border block w-full p-2.5 rounded-lg',
                                                            'placeholder:italic',
                                                            {'bg-red-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500': groupRequestPassModalError,
                                                            'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white': !groupRequestPassModalError,
                                                            }
                                                        ]"
                                                        required=""
                                                    >

                                                    <p v-if="groupRequestPassModalError" class="mt-2 text-sm text-red-600 dark:text-red-500">
                                                        <span class="font-medium">Error!</span> {{ groupRequestPassModalError }}
                                                    </p>
                                                </div>

                                                <div class="flex gap-x-3 aligin-center justify-between">
                                                    <button
                                                        v-on:click="cancelGroupRequestPass"
                                                        type="button"
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                                    >Cancel</button>
                                                    <button
                                                        v-on:click="confirmGroupRequestPass"
                                                        type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                    >Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                        <div class="w-full">
                            <h2 class="ml-4 inline-flex items-center text-base text-gray-500 dark:text-gray-400">Select a wallet</h2>
                        </div>

                        <div class="w-full mb-3 px-5 pt-2">
                            <CustomizableButton
                                @click="refreshWalletList"
                                v-bind:disabled="!showRefreshWalletListButton"
                            >
                                Refresh
                                <template v-slot:right>
                                    <svg
                                        class="w-3.5 h-3.5 ms-2"
                                        :class="{
                                            'animate-spin': loadingWalletList,
                                        }"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg" id="mdi-refresh" viewBox="0 0 24 24"
                                    >
                                        <path d="M17.65,6.35C16.2,4.9 14.21,4 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20C15.73,20 18.84,17.45 19.73,14H17.65C16.83,16.33 14.61,18 12,18A6,6 0 0,1 6,12A6,6 0 0,1 12,6C13.66,6 15.14,6.69 16.22,7.78L13,11H20V4L17.65,6.35Z"></path>
                                    </svg>
                                </template>
                            </CustomizableButton>
                        </div>

                        <fieldset class="mx-4 my-2">
                            <legend class="sr-only">Wallets</legend>

                            <template
                                v-for="(walletData, walletIndex) in walletsForCurrency"
                                :key="walletIndex"
                            >
                                <div class="flex items-center mb-4">
                                    <input
                                        :id="dataGet(walletData, 'uuid')"
                                        :data-currency-code="dataGet(walletData, 'currency.code')"
                                        type="radio"
                                        name="countries"
                                        value="USA"
                                        class="w-4 h-4 border-gray-300 focus:ring-0 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                                        checked
                                    >
                                    <label
                                        :for="dataGet(walletData, 'uuid')"
                                        :data-currency-code="dataGet(walletData, 'currency.code')"
                                        class="block ms-2  text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >
                                        {{ dataGet(walletData, 'title') }}
                                        {{ dataGet(walletData, 'currency.code') ? sprintf('(%s)', dataGet(walletData, 'currency.code')) : '' }}
                                    </label>
                                </div>
                            </template>


                            <!--
                            <div class="flex items-center">
                                <input id="option-disabled" type="radio" name="countries" value="China" class="w-4 h-4 border-gray-200 focus:ring-0 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600" disabled>
                                <label for="option-disabled" class="block ms-2 text-sm font-medium text-gray-300 dark:text-gray-700">
                                China (disabled)
                                </label>
                            </div>
                            -->
                        </fieldset>
                    </div>

                </div>

                <div class="col-span-3">
                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                        <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">{{ selectedPriceItem?.prize_fmt }}</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                    <dd class="text-base font-medium text-green-600">-$0.00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">-</dd>
                                </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">{{ selectedPriceItem?.prize_fmt }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <template
                v-slot:footer
                v-if="!cartCollapsed"
            >
                <div class="flex justify-between pt-2">
                    <button
                        type="button"
                        @click="cancelSelectedItem"
                        class="btn-muted rounded-md"
                    >Cancel</button>

                    <CustomizableButton>
                        Take my place
                        <template v-slot:right>
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"></path>
                            </svg>
                        </template>
                    </CustomizableButton>
                </div>

                <!-- <BasicTooltip></BasicTooltip> -->
            </template>
        </ModalBottomDrawer>
    </template>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
