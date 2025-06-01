import {
    Table,
    TableBody,
    TableCell,
    TableHeader,
    TableRow,
} from "../../ui/table";

import Badge from "../../ui/badge/Badge.jsx";
import {DropdownItem} from "../../ui/dropdown/DropdownItem.jsx";
import {Link, NavLink, useLocation} from "react-router-dom";
import PaginationSelector from "../../generics/PaginationSelector.jsx";
import React, {useState} from "react";
import SearchInput from "../../generics/SeatchInput.jsx";
import PagePagination from "../../generics/PagePagination.jsx";
import PaginationInfo from "../../generics/PaginationInfo.jsx";
import {handleSort} from "../../utils/handleSort.js";

const getNestedValue = (obj, path) => {
    return path.split('.').reduce((acc, key) => acc?.[key], obj);
};

export default function BasicTable({
                                       buttonTitle,
                                       gridHeaderRow,
                                       data,
                                       setCreatePath,
                                       setEditPath,
                                       handleDelete,
                                       sort = '',
                                       setSort,
                                       setPage,
                                       page,
                                       size,
                                       handleChange,
                                       search,
                                       meta
                                   }) {

    const location = useLocation();


    return (
        <>
            <DropdownItem
                tag="a"
                to={`${setCreatePath}`} state={{from: location}}
                baseClassName="inline-flex"
                className="flex items-center bg-brand-500 text-white shadow-theme-xs disabled:bg-brand-300 gap-3 px-3 py-2 font-medium rounded-lg text-theme-sm dark:hover:text-gray-300">
                {buttonTitle}
            </DropdownItem>

            <div
                className="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-white/[0.05] dark:bg-white/[0.03]">
                <div className="max-w-full overflow-x-auto">

                    <div
                        className="flex flex-col gap-2 px-4 py-4 border border-b-0 border-gray-100 dark:border-white/[0.05] rounded-t-xl sm:flex-row sm:items-center sm:justify-between">
                        <PaginationSelector size={size} handleChange={handleChange}/>
                        {search && <SearchInput/>}
                    </div>

                    <Table>
                        <TableHeader className="border-b border-gray-100 dark:border-white/[0.05]">
                            <TableRow>
                                {gridHeaderRow.map((header, index) => (
                                    <TableCell
                                        isHeader
                                        className="px-5 py-3 font-medium text-gray-500 text-start text-theme-xs border border-gray-100 dark:text-gray-400 dark:border-white/[0.05]"
                                        key={index}
                                    >
                                        <div className="flex items-center justify-between cursor-pointer">
                                            <b>{header.label}</b>
                                            {header.sortable && (
                                                <button
                                                    className="flex flex-col gap-0.5"
                                                    onClick={() => header.sortable && handleSort(header.name, sort, setSort)}
                                                >
                                                    <svg className="text-gray-300 dark:text-gray-700  text-brand-500"
                                                         width="8" height="5" viewBox="0 0 8 5" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.40962 0.585167C4.21057 0.300808 3.78943 0.300807 3.59038 0.585166L1.05071 4.21327C0.81874 4.54466 1.05582 5 1.46033 5H6.53967C6.94418 5 7.18126 4.54466 6.94929 4.21327L4.40962 0.585167Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                    <svg className="text-gray-300 dark:text-gray-700  " width="8"
                                                         height="5"
                                                         viewBox="0 0 8 5" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M4.40962 4.41483C4.21057 4.69919 3.78943 4.69919 3.59038 4.41483L1.05071 0.786732C0.81874 0.455343 1.05582 0 1.46033 0H6.53967C6.94418 0 7.18126 0.455342 6.94929 0.786731L4.40962 4.41483Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </button>
                                            )}
                                        </div>
                                    </TableCell>
                                ))}
                                <TableCell
                                    isHeader
                                    className="px-5 py-3 font-medium text-gray-500 text-start text-theme-xs border border-gray-100 dark:text-gray-400 dark:border-white/[0.05]"
                                >
                                    <b>Actions</b>
                                </TableCell>
                            </TableRow>
                        </TableHeader>

                        <TableBody className="divide-y divide-gray-100 dark:divide-white/[0.05]">

                            {data ? data.map((row, rowIndex) => (
                                <TableRow key={row.id}>
                                    {gridHeaderRow.map((header, cellIndex) => (
                                        <TableCell
                                            key={cellIndex}
                                            className="px-4 py-3 text-gray-500 text-start text-theme-sm border border-gray-100 dark:text-gray-400 dark:border-white/[0.05]"
                                        >
                                            {header.badge ? (
                                                <Badge size="sm" color={header.badgeColor || 'primary'}>
                                                    {getNestedValue(row, header.name)}
                                                </Badge>
                                            ) : (
                                                getNestedValue(row, header.name)
                                            )}
                                        </TableCell>
                                    ))}

                                    <TableCell
                                        className="px-4 py-3 text-gray-500 text-start text-theme-sm border border-gray-100 dark:text-gray-400 dark:border-white/[0.05]"
                                    >
                                        <div className="flex items-center w-full gap-2">
                                            <Link
                                                to={`${setEditPath}/${row.id}/edit`} state={{from: location}}
                                                className="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90">
                                                <svg width="1em" height="1em" viewBox="0 0 21 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg" className="size-5">
                                                    <path fillRule="evenodd" clipRule="evenodd"
                                                          d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206ZM14.9697 4.59272C15.2626 4.29982 15.7375 4.29982 16.0304 4.59272L17.0027 5.56499C17.2956 5.85788 17.2956 6.33276 17.0027 6.62565L16.1043 7.52402L14.0714 5.49109L14.9697 4.59272ZM13.0107 6.55175L6.66806 12.8944C6.56526 12.9972 6.49455 13.1277 6.46454 13.2699L5.96704 15.6283L8.32547 15.1308C8.46772 15.1008 8.59819 15.0301 8.70099 14.9273L15.0436 8.58468L13.0107 6.55175Z"
                                                          fill="currentColor"></path>
                                                </svg>
                                            </Link>
                                            <button
                                                className="text-gray-500 hover:text-error-500 dark:text-gray-400 dark:hover:text-error-500"
                                                onClick={() => handleDelete(row)}
                                            >
                                                <svg width="1em" height="1em" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg" className="size-5">
                                                    <path fillRule="evenodd" clipRule="evenodd"
                                                          d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z"
                                                          fill="currentColor"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </TableCell>
                                </TableRow>
                            )) : []}
                        </TableBody>
                    </Table>

                    <div
                        className="border border-t-0 rounded-b-xl border-gray-100 py-4 pl-[18px] pr-4 dark:border-white/[0.05]">
                        <div className="flex flex-col xl:flex-row xl:items-center xl:justify-between">
                            <PaginationInfo data={data} meta={meta}/>
                            <PagePagination page={page} setPage={setPage} meta={meta}/>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
