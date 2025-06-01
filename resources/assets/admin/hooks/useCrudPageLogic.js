import { useState } from 'react';
import {errorHandler} from "../components/utils/toastHandler.js";

export function useCrudPageLogic({ useQuery, useDeleteMutation }) {
    const [size, setSize] = useState(30);
    const [page, setPage] = useState(1);
    const [limit, setLimit] = useState(30);
    const [sort, setSort] = useState('-id');
    const [openDialog, setOpenDialog] = useState(false);
    const [itemToDelete, setItemToDelete] = useState(null);

    const { data: response, isLoading } = useQuery({ page, limit, sort });
    const [deleteItem] = useDeleteMutation();

    const data = response?.data || [];
    const meta = response?.meta || {};

    const handleChange = (event) => {
        setLimit(event.target.value);
        setSize(event.target.value);
        setPage(1);
    };

    const handleOpenDialog = (item) => {
        setItemToDelete(item);
        setOpenDialog(true);
    };

    const handleCloseDialog = () => {
        setOpenDialog(false);
        setItemToDelete(null);
    };

    const handleDelete = async () => {
        try {
            await deleteItem(itemToDelete.id).unwrap();
            setOpenDialog(false);
            setItemToDelete(null);
        } catch (err) {
            errorHandler(err.data.message);
            setOpenDialog(false);
            setItemToDelete(null);
        }
    };

    return {
        size,
        page,
        limit,
        sort,
        openDialog,
        itemToDelete,
        data,
        isLoading,
        handleChange,
        handleOpenDialog,
        handleCloseDialog,
        handleDelete,
        setSort,
        setPage,
        setLimit,
        meta
    };
}
