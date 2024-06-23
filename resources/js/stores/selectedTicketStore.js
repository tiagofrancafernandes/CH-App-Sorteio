import { ref } from 'vue'
import { defineStore } from 'pinia'
import { useStorage } from '@vueuse/core'

export const useSelectedTicket = defineStore('selectedTicket', () => {
    const selectedTicketBuildQuery = useStorage('selectedTicketBuildQuery', ref(null));
    const sortTicketsBy = useStorage('sortTicketsBy', ref(null));
    const selectedTicketCurrency = useStorage('selectedTicketCurrency', ref(null));

    function removeSelectedTicketBuildQuery() {
        selectedTicketBuildQuery.value = null;
    }

    function removeSortTicketsBy() {
        sortTicketsBy.value = null;
    }

    function setSortTicketsBy(sortBy) {
        sortTicketsBy.value = sortBy;
    }

    function setSelectedTicketBuildQuery(ticketBuildQuery) {
        selectedTicketBuildQuery.value = ticketBuildQuery;
    }

    function setSelectedTicketCurrency(ticketCurrency) {
        selectedTicketCurrency.value = ticketCurrency;
    }

    function removeSelectedTicketCurrency() {
        selectedTicketCurrency.value = null;
    }

    function setSelectedTicket(
        ticketBuildQuery,
        ticketCurrency,
    ) {
        setSelectedTicketBuildQuery(ticketBuildQuery);
        setSelectedTicketCurrency(ticketCurrency);
    }

    function clearTicketAllSelections() {
        removeSelectedTicketBuildQuery();
        removeSelectedTicketCurrency();
    }

    return {
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
    };
})
