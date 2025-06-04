import React from "react";
import BasicTable from "../tables/BasicTables/BasicTable.jsx";
import {useCrudPageLogic} from "../../hooks/useCrudPageLogic.js";
import {Loading} from "../loadingBar/Loading.jsx";
import DeleteConfirmDialog from "../generics/DeleteConfirmDialog.jsx";

export default function CrudPage({
                                     buttonTitle,
                                     createPath,
                                     editPath,
                                     gridHeaderRow = [],
                                     useQuery,
                                     useDeleteMutation,
                                     isFilter = false,
                                 }) {

    const {
        size,
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
        page,
        setPage,
        meta
    } = useCrudPageLogic({useQuery, useDeleteMutation});

    if (isLoading) {
        return (
            <div
                className="absolute inset-0 z-50 flex items-center justify-center bg-white/60 dark:bg-gray-900/60 rounded-3xl">
                <Loading/>
            </div>
        )
    }

    const isEmptyData = !data || (Array.isArray(data) && data.length === 0) || (typeof data === 'object' && Object.keys(data).length === 0);

    return (
        <>
            {isEmptyData ? (
                <div className="text-lg font-medium text-gray-800 dark:text-white/90">Data not found</div>
            ) : (
                <>

                    <BasicTable
                        buttonTitle={`Create ${buttonTitle.toLowerCase()}`}
                        setCreatePath={createPath}
                        setEditPath={editPath}
                        gridHeaderRow={gridHeaderRow}
                        data={data}
                        handleDelete={handleOpenDialog}
                        sort={sort}
                        setSort={setSort}
                        setPage={setPage}
                        page={page}
                        size={size}
                        handleChange={handleChange}
                        search={true}
                        meta={meta}
                        isFilter={isFilter}
                    />

                    <DeleteConfirmDialog
                        openDialog={openDialog}
                        title={buttonTitle}
                        handleDelete={handleDelete}
                        handleCloseDialog={handleCloseDialog}
                        itemToDelete={itemToDelete}
                    />
                </>
            )}
        </>
    );
}
